from django.shortcuts import render, redirect
from django.conf import settings
from .apps import CoreConfig
import os
import cv2
import numpy as np
import pandas as pd
import time
import glob
from scipy import ndimage
from scipy.ndimage import zoom
from django.core.files.storage import FileSystemStorage

from uploads.core.models import Document
from uploads.core.forms import DocumentForm


def extract_face_features(faces, offset_coefficients=(0.075, 0.05)):
    gray = faces[0]
    detected_face = faces[1]

    new_face = []

    for det in detected_face:
        x, y, w, h = det

        horizontal_offset = np.int(np.floor(offset_coefficients[0] * w))  # delete border from image
        vertical_offset = np.int(np.floor(offset_coefficients[1] * h))
        extracted_face = gray[y + vertical_offset:y + h, x + horizontal_offset:x - horizontal_offset + w]
        new_extracted_face = zoom(extracted_face,
                                  (48 / extracted_face.shape[0], 48 / extracted_face.shape[1]))
        new_extracted_face = new_extracted_face.astype(np.float32)
        new_extracted_face /= float(new_extracted_face.max())
        new_face.append(new_extracted_face)

    return new_face


def detect_face(frame):
    cascPath = "uploads/models/haarcascade_frontalface_default.xml"
    faceCascade = cv2.CascadeClassifier(cascPath)
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    detected_faces = faceCascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=6,
                                                  minSize=(48, 48),
                                                  flags=cv2.CASCADE_SCALE_IMAGE)
    coord = []
    for x, y, w, h in detected_faces:
        if w > 100:
            sub_img = frame[y:y + h, x:x + w]
            coord.append([x, y, w, h])

    return gray, detected_faces, coord


def getFrame(vidcap, sec, count):
    vidcap.set(cv2.CAP_PROP_POS_MSEC, sec * 1000)
    hasFrames, image = vidcap.read()
    if hasFrames:
        cv2.imwrite("/VideoPredict/frames/frame" + str(count) + ".jpg", image)  # save frame as JPG file
    return hasFrames


def emotion_extract(imagen):
    for face in extract_face_features(detect_face(imagen)):
        to_predict = np.reshape(face.flatten(), (1, 48, 48, 1))
        res = CoreConfig.loaded_model.predict(to_predict)
        result_num = np.argmax(res)
        return result_num


def freq_persona(my_list):
    count_add = 0
    freq = {}
    A1, A2 = [], []
    for item in my_list:
        if (item in freq):
            freq[item] += 1
        else:
            freq[item] = 1

    for emo_key, emo_count in freq.items():
        A1.append(emo_key)
        A2.append(emo_count)
    d_tog = {'Emotion': A1, 'Count': A2}
    df_emo = pd.DataFrame(d_tog)
    return df_emo


def emo_to_ocean(emo_data):
    for index, row in emo_data.iterrows():
        if (row['Emotion'] == 0):
            emo = "Angry"
            return emo

        elif (row['Emotion'] == 1):
            emo = "Disgust"
            return emo

        elif (row['Emotion'] == 2):
            emo = "Fear"
            return emo

        elif (row['Emotion'] == 3):
            emo = "Happy"
            return emo

        elif (row['Emotion'] == 4):
            emo = "Sad"
            return emo

        elif (row['Emotion'] == 5):
            emo = "Surprise"
            return emo

        elif (row['Emotion'] == 6):
            emo = "Neutral"
            return emo


def home(request):
    documents = Document.objects.all()
    return render(request, 'core/home.html', {'documents': documents})


def video_upload(request):
    if request.method == 'POST' and request.FILES['myfile']:
        dir_name = "/VideoPredict/frames/"
        test1 = os.listdir(dir_name)
        for item in test1:
            if item.endswith(".jpg"):
                os.remove(os.path.join(dir_name, item))

        dir_name = "/VideoPredict/resume/"
        test1 = os.listdir(dir_name)
        for item in test1:
            if item.endswith(".mp4"):
                os.remove(os.path.join(dir_name, item))

        myfile = request.FILES['myfile']
        fs = FileSystemStorage()
        filename = fs.save(myfile.name, myfile)
        uploaded_file_url = fs.url(filename)
        video_path = "/VideoPredict/resume/"
        files = []
        for i in os.listdir(video_path):
            if i.endswith('.mp4'):
                files.append(i)
        for j in files:
            vidcap = cv2.VideoCapture("/VideoPredict/resume/" + j)
            sec = 0
            count = 1
            frameRate = 5
            success = getFrame(vidcap, sec, count)

            while success:
                count = count + 1
                sec = sec + frameRate
                sec = round(sec, 2)  # it will capture image every 2 second
                success = getFrame(vidcap, sec, count)
        return render(request, 'core/video_upload.html', {
            'uploaded_file_url': uploaded_file_url
        })
    return render(request, 'core/video_upload.html')


#check result of video interview
def check_result(request):
    img_path = glob.glob("/VideoPredict/frames/*.jpg")
    data = []
    for image1 in img_path:
        n = cv2.imread(image1)
        image_emo = emotion_extract(n)
        data.append(image_emo)

    emo_data = freq_persona(data)

    # setting emotional values to its respective labels
    emo_data.loc[emo_data['Emotion'] == 0, 'Emotion_Label'] = 'Angry'
    emo_data.loc[emo_data['Emotion'] == 1, 'Emotion_Label'] = 'Disgust'
    emo_data.loc[emo_data['Emotion'] == 2, 'Emotion_Label'] = 'Fear'
    emo_data.loc[emo_data['Emotion'] == 3, 'Emotion_Label'] = 'Happy'
    emo_data.loc[emo_data['Emotion'] == 4, 'Emotion_Label'] = 'Sad'
    emo_data.loc[emo_data['Emotion'] == 5, 'Emotion_Label'] = 'Surprise'
    emo_data.loc[emo_data['Emotion'] == 6, 'Emotion_Label'] = 'Neutral'

    # clean dataframe from NaN values (if required). It holds all extracted emotion parameters
    emo_data = emo_data[emo_data['Count'].notna()]
    emo_data = emo_data[emo_data['Emotion'].notna()]
    emo_data.Emotion = emo_data.Emotion.astype(int)

    emo_data['Percentage'] = (emo_data['Count'] / emo_data['Count'].sum()) * 100
    dominant_emo = emo_data[emo_data['Percentage'] == emo_data['Percentage'].max()]

    emo_disp = emo_data[['Emotion_Label','Percentage']]
    emo_disp['Percentage'] = emo_disp['Percentage'].astype(str) + '%'
    dom_emo_disp = dominant_emo[['Emotion_Label','Percentage']]
    dom_emo_disp['Percentage'] = dom_emo_disp['Percentage'].astype(str) + '%'

    emo_jso = emo_disp.to_json(orient='values')[1:-1].replace('],[', '] [')
    dom_jso = dom_emo_disp.to_json(orient='values')[1:-1].replace('],[', '] [')

    emo_result = emo_to_ocean(dominant_emo)

    return render(request, 'core/check_result.html', {
        'emo_result': emo_result,
        'emo_jso': emo_jso,
        'dom_jso':dom_jso
    })
    return render(request, 'core/check_result.html')
