from flask import Flask, request, jsonify, render_template
from werkzeug.utils import secure_filename
import tensorflow as tf
from tensorflow.keras.models import load_model

import numpy as np # linear algebra
import pandas as pd # data processing, CSV file I/O (e.g. pd.read_csv)
import os # to use operating system dependent functionality
import librosa # to extract speech features
import wave # read and write WAV files
import matplotlib.pyplot as plt # to generate the visualizations

# MLP Classifier
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score

# LSTM Classifier
import keras
from keras.utils import to_categorical
from keras.models import Sequential
from keras.layers import *
from keras.optimizers import rmsprop

import pydub
from pydub import AudioSegment
import math

app = Flask(__name__)
app.config['UPLOAD_FOLDER']='C://Users//juyee//Envs//sih2020//Audio//resume'

new_model = tf.keras.models.load_model('model/model_LSTM.h5')
dict = {0 : 'neutral', 1 : 'calm', 2 : 'happy', 3 : 'sad', 4 : 'angry', 5 : 'fearful', 6 : 'disgust', 7 : 'surprised'}
pydub.AudioSegment.converter = r'C:/Users/juyee/Downloads/ffmpeg-20200730-134a48a-win64-static/ffmpeg-20200730-134a48a-win64-static/bin'
new_model.summary()


class SplitWavAudioMubin():
    def __init__(self, folder, newfolder,filename):
        self.folder = folder
        self.filename = filename
        self.filepath = folder + '//' + filename
        self.newfolder = newfolder
        self.audio = AudioSegment.from_wav(self.filepath)
    
    def get_duration(self):
        return self.audio.duration_seconds
    
    def single_split(self, from_min, to_min, split_filename):
        t1 = from_min * 1000
        t2 = to_min * 1000
        split_audio = self.audio[t1:t2]
        split_audio.export(self.newfolder + '//' + split_filename, format="wav")
        
    def multiple_split(self, min_per_split):
        total_mins = math.ceil(self.get_duration())
        print(total_mins)
        for i in range(0, total_mins, min_per_split):
            split_fn = str(i) + '_' + self.filename
            self.single_split(i, i+min_per_split, split_fn)
            print(str(i) + ' Done')
            if i == total_mins - min_per_split:
                print('All splited successfully')


def extract_mfcc(wav_file_name):
    #This function extracts mfcc features and obtain the mean of each dimension
    #Input : path_to_wav_file
    #Output: mfcc_features'''
    y, sr = librosa.load(wav_file_name,duration=3
                                  ,offset=0.5)
    mfccs = np.mean(librosa.feature.mfcc(y=y, sr=sr, n_mfcc=40).T,axis=0)
    
    return mfccs

def freq_persona(my_list): 
    # Creating an empty dictionary  
    count_add = 0
    freq = {} 
    A1, A2 = [], []
    for item in my_list: 
        if (item in freq): 
            freq[item] += 1
        else: 
            freq[item] = 1
    
    for emo_key, emo_count in freq.items():
      #print("% d : % d"%(emo_key, emo_count))
      A1.append(emo_key)
      A2.append(emo_count)
      #print(A1, ":" ,A2)
    d_tog = {'Emotion':A1, 'Count':A2}
    df_emo = pd.DataFrame(d_tog)
    return df_emo

def emo_to_ocean(emo_data):
  emotions = {}
  for index, row in emo_data.iterrows():
    if(row['Emotion'] == 'angry'):
      #print("\nCandidate has following Dominant Big 5 Personality Traits:")
      emotions["Negative Openess"]=row['Percentage']
      emotions["Negative Agreeableness"]=row['Percentage']
      emotions["Positive Neuroticism"]=row['Percentage']
      #print("\n> Negative Openess: ", row['Percentage'],"%")
      #print("> Negative Agreeableness: ", row['Percentage'],"%")
      #print("> Positive Neuroticism: ", row['Percentage'],"%")
      
    elif(row['Emotion'] == 'disgust'):
      #print("\nCandidate has following Dominant Big 5 Personality Traits:")
      #print("\n> Negative Conscientiousness: ", row['Percentage'],"%")
      #print("> Negative Extraversion: ", row['Percentage'],"%")
      #print("> Positive Neuroticism: ", row['Percentage'],"%")
      emotions["Negative Conscientiousness"]=row['Percentage']
      emotions["Negative Extraversion"]=row['Percentage']
      emotions["Positive Neuroticism"]=row['Percentage']
      
    elif(row['Emotion'] == 'fear'):
      #print("\nCandidate has following Dominant Big 5 Personality Traits:")
      #print("\n> Negative Conscientiousness: ", row['Percentage'],"%")
      #print("> Negative Extraversion: ", row['Percentage'],"%")
      #print("> Positive Neuroticism: ", row['Percentage'],"%")
      emotions["Negative Conscientiousness"]=row['Percentage']
      emotions["Negative Extraversion"]=row['Percentage']
      emotions["Positive Neuroticism"]=row['Percentage']
      
    elif(row['Emotion'] == 'happy'):
      #print("\nCandidate has following Dominant Big 5 Personality Traits:")
      #print("\n> Positive Extraversion: ", row['Percentage'],"%")
      #print("> Negative Neuroticism: ", row['Percentage'],"%")
      emotions["Positive Extraversion"]=row['Percentage']
      emotions["Negative Neuroticism"]=row['Percentage']
      
    elif(row['Emotion'] == 'sad'):
      #print("\nCandidate has following Dominant Big 5 Personality Traits:")
      #print("\n> Positive Neuroticism: ", row['Percentage'],"%")
      emotions["Positive Neuroticism"]=row['Percentage']
      
    elif(row['Emotion'] == 'surprise'):
      print("\nNo mentionable Big 5 personality trait !! Candidate was found surprised during their interview")
      
    elif(row['Emotion'] == 'neutral' or row['Emotion'] == 'calm'):
      #print("\nCandidate has following Dominant Big 5 Personality Traits:")
      #print("\n> Negative Neuroticism: ",row['Percentage'],"%")
      emotions["Negative Neuroticism"]=row['Percentage']

      return emotions

@app.route('/')
def home():
    return render_template('upload.html')

@app.route('/voice_predict',methods=['POST'])
def voice_ocean():
  f = request.files['file']

  f.save(os.path.join(app.config['UPLOAD_FOLDER'], secure_filename(f.filename)))
  folder = 'C://Users//juyee//Envs//sih2020/Audio//resume'
  newfolder = "C://Users//juyee//Envs//sih2020//Audio//audi"
  filename =f.filename
  split_wav = SplitWavAudioMubin(folder, newfolder, filename)
  split_wav.multiple_split(min_per_split=3)
  data = [] 
  for dirname, _, filenames in os.walk('./audi/'):
    for filename in filenames:
      wav_file_name = os.path.join(dirname, filename)
      data.append(extract_mfcc(wav_file_name)) # extract MFCC features/file

  print("Finish Loading the Dataset")
  data1 = np.asarray(data)
  
  pred = new_model.predict(np.expand_dims(data1,-1))
  preds=pred.argmax(axis=1)
  print(preds)
  preds = preds[1:-1]
  new = np.array([dict[x] for x in preds])
  emoti_data = freq_persona(new)
  emoti_data = emoti_data[emoti_data['Count'].notna()]
  emoti_data = emoti_data[emoti_data['Emotion'].notna()]
  emoti_data['Percentage'] = (emoti_data['Count'] / emoti_data['Count'].sum()) * 100

  dominant_emo = emoti_data[emoti_data['Percentage'] == emoti_data['Percentage'].max()]
  emo_traits = emo_to_ocean(dominant_emo)

  for i in emo_traits.keys():
    value=i

  return render_template('upload.html',  prediction_text='Your Personality: {}'.format(value))
	

if __name__ == "__main__":
    app.run(debug=True)