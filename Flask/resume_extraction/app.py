import numpy as np
from flask import Flask, request, jsonify, render_template
from werkzeug.utils import secure_filename
import pickle
from pdfminer.converter import TextConverter
from pdfminer.pdfinterp import PDFPageInterpreter
from pdfminer.pdfinterp import PDFResourceManager
from pdfminer.layout import LAParams
from pdfminer.pdfpage import PDFPage
from flask_cors import CORS
import io
import nltk
nltk.download('punkt')
nltk.download('averaged_perceptron_tagger')
import re
nltk.download('stopwords')
from nltk.corpus import stopwords

from PIL import Image 
import pytesseract 
import sys
import os
# import cv2
import glob
import spacy
import re
from spacy.matcher import Matcher
import en_core_web_sm
import pandas as pd
from nltk.stem import WordNetLemmatizer


pytesseract.pytesseract.tesseract_cmd ='C://Program Files//Tesseract-OCR//tesseract.exe'

app = Flask(__name__)
CORS(app)

app.config['UPLOAD_FOLDER']="resume"
#model = pickle.load(open('model.pkl', 'rb'))

def extract_text_from_pdf(pdf_path):
    with open(pdf_path, 'rb') as fh:
        # iterate over all pages of PDF document
        for page in PDFPage.get_pages(fh, caching=True, check_extractable=True):
            # creating a resoure manager
            resource_manager = PDFResourceManager()
            
            # create a file handle
            fake_file_handle = io.StringIO()
            
            # creating a text converter object
            converter = TextConverter(
                                resource_manager, 
                                fake_file_handle, 
                                codec='utf-8', 
                                laparams=LAParams()
                        )

            # creating a page interpreter
            page_interpreter = PDFPageInterpreter(
                                resource_manager, 
                                converter
                            )

            # process current page
            page_interpreter.process_page(page)
            
            # extract text
            text = fake_file_handle.getvalue()
            yield text

            # close open handles
            converter.close()
            fake_file_handle.close()


# def extract_text_from_jpg(file_path):
#     img = cv2.imread(file_path)
#     result = pytesseract.image_to_string(img)
#     return result

import docx2txt

def extract_text_from_doc(doc_path):
    temp = docx2txt.process(doc_path)
    text = [line.replace('\t', ' ') for line in temp.split('\n') if line]
    return ' '.join(text)

def readFile(fileName):
    extension = fileName.split(".")[-1]
    if extension == "pdf":  
        try:
            text=''
            for page in extract_text_from_pdf(fileName):
                text += ' ' + page
            return text
        except:
            return ''
            pass
    elif extension == 'docx':
        try:
            return extract_text_from_doc(fileName)
        except:
            return ''
            pass
    # elif extension == 'jpg':
    #     try:
    #         return extract_text_from_jpg(fileName)
    #     except:
    #         return ''
    #         pass
    else:
        print('Unsupported format')
        return '', ''

def extract_name(resume_text):
    nlp = en_core_web_sm.load()
    matcher = Matcher(nlp.vocab)
    nameHits=[]
    nlp_text = nlp(resume_text)
    
    # First name and Last name are always Proper Nouns
    pattern = [{'POS': 'PROPN'}, {'POS': 'PROPN'}]
    pattern1 = [{'POS': 'PROPN'}]
    pattern2 = [{'POS': 'PROPN'}, {'POS': 'PROPN'},{'POS': 'PROPN'}]
    
    matcher.add('NAME', [pattern])
    
    
    #matcher.add('NAME1', [pattern1])
    #matcher.add('NAME2', [pattern2])
    
    matches = matcher(nlp_text)
    #print(matches)
    
    for match_id, start, end in matches:
        nameHits.append(nlp_text[start:end])
        span = nlp_text[start:end]
        return span.text

def extract_mobile_number(inputString):
        number = None
        try:
            pattern = re.compile(r'([+(]?\d+[)\-]?[ \t\r\f\v]*[(]?\d{2,}[()\-]?[ \t\r\f\v]*\d{2,}[()\-]?[ \t\r\f\v]*\d*[ \t\r\f\v]*\d*[ \t\r\f\v]*)')
                # Understanding the above regex
                # +91 or (91) -> [+(]? \d+ -?
                # Metacharacters have to be escaped with \ outside of character classes; inside only hyphen has to be escaped
                # hyphen has to be escaped inside the character class if you're not incidication a range
                # General number formats are 123 456 7890 or 12345 67890 or 1234567890 or 123-456-7890, hence 3 or more digits
                # Amendment to above - some also have (0000) 00 00 00 kind of format
                # \s* is any whitespace character - careful, use [ \t\r\f\v]* instead since newlines are trouble
            match = pattern.findall(inputString)
            # match = [re.sub(r'\s', '', el) for el in match]
                # Get rid of random whitespaces - helps with getting rid of 6 digits or fewer (e.g. pin codes) strings
            # substitute the characters we don't want just for the purpose of checking
            match = [re.sub(r'[,.]', '', el) for el in match if len(re.sub(r'[()\-.,\s+]', '', el))>6]
                # Taking care of years, eg. 2001-2004 etc.
            match = [re.sub(r'\D$', '', el).strip() for el in match]
                # $ matches end of string. This takes care of random trailing non-digit characters. \D is non-digit characters
            match = [el for el in match if len(re.sub(r'\D','',el)) <= 15]
                # Remove number strings that are greater than 15 digits
            try:
                for el in list(match):
                    # Create a copy of the list since you're iterating over it
                    if len(el.split('-')) > 3: continue # Year format YYYY-MM-DD
                    for x in el.split("-"):
                        try:
                            # Error catching is necessary because of possibility of stray non-number characters
                            # if int(re.sub(r'\D', '', x.strip())) in range(1900, 2100):
                            if x.strip()[-4:].isdigit():
                                if int(x.strip()[-4:]) in range(1900, 2100):
                                    # Don't combine the two if statements to avoid a type conversion error
                                    match.remove(el)
                        except:
                            pass
            except:
                pass
            number = match
        except:
            pass

        #infoDict['phone'] = number
        return number

def extract_email(email):
    email = re.findall("([^@|\s]+@[^@]+\.[^@|\s]+)", email)
    if email:
        try:
            return email[0].split()[0].strip(';')
        except IndexError:
            return None

def extract_skills(resume_text,cleaned_text):
    nlp = en_core_web_sm.load()
    matcher = Matcher(nlp.vocab)
    noun_chunks = []
    doc = nlp(cleaned_text)
    for chunk in doc.noun_chunks:
        noun_chunks.append(chunk.text)
    
    nlp_text = nlp(resume_text)

    # removing stop words and implementing word tokenization
    tokens = [token.text for token in nlp_text if not token.is_stop]
    
    # reading the csv file
    data = pd.read_csv("final_skills.csv") 
    
    # extract values
    skills = list(data.Skills.values)
    #skills = total_skillset
    
    skillset = []
    
    # check for one-grams (example: python)
    for token in tokens:
        if token.lower() in skills:
            skillset.append(token)
    
    # check for bi-grams and tri-grams (example: machine learning)
    for token in noun_chunks:
        token = token.lower().strip()
        if token in skills:
            skillset.append(token)
    
    return [i.capitalize() for i in set([i.lower() for i in skillset])]

def extract_education(resume_text):
    nlp = en_core_web_sm.load()
    matcher = Matcher(nlp.vocab)
    STOPWORDS = set(stopwords.words('english'))
     # Education Degrees
    EDUCATION = [
            'BE', 'BS','BCA','MCA','MBA','BA','MA', 
            'ME','MS', 'BMS','BSC','MSC','PHD','B-TECH','10th','12th','HSC','SSC',
            'BTECH','MTECH', 'BBA','BCOM','MCOM','MMS','MHRM','B TECH',
            'BACHELOR OF TECHNOLOGY','PGDM','BARCH'
        ]
    YEAR = r'(((20|19)(\d{2})))'
    
    nlp_text = nlp(resume_text)

    # Sentence Tokenizer
    nlp_text = [sent.string.strip() for sent in nlp_text.sents]

    edu = {}
    # Extract education degree
    for index, text in enumerate(nlp_text):
        for tex in text.split():
            # Replace all special symbols
            tex = re.sub(r'[?|$|.|!|,|-]', r'', tex)
            if tex.upper() in EDUCATION and tex not in STOPWORDS:
                edu[tex] = text + nlp_text[index]

    # Extract year
    education = []
    for key in edu.keys():
        education.append(key)
    return education

def qualification_major(resume_text):
    nlp = en_core_web_sm.load()
    matcher = Matcher(nlp.vocab)
    noun_chunks = []
    doc = nlp(resume_text)
    for chunk in doc.noun_chunks:
        noun_chunks.append(chunk.text)
    
    nlp_text = nlp(resume_text)

    # removing stop words and implementing word tokenization
    tokens = [token.text for token in nlp_text if not token.is_stop]
    
    # reading the csv file
    data = pd.read_csv("grad-students.csv") 
    
    # extract values
    qualifications = list(data.Major.values)
    
    qual = []
    
    # check for one-grams (example: python)
    for token in tokens:
        if token.upper() in qualifications:
            qual.append(token)
    
    # check for bi-grams and tri-grams (example: machine learning)
    for token in noun_chunks:
        token = token.strip()
        if token.upper() in qualifications:
            qual.append(token)
    
    return [i.capitalize() for i in set([i.lower() for i in qual])]


def string_found(string1, string2):
    if re.search(r"\b" + re.escape(string1) + r"\b", string2):
        return True
    return False


COMPETENCIES = {
    'teamwork': ['supervised','facilitated','planned','plan','served','serve','project lead','managing','managed','lead ',
                'project team','team','conducted','worked','gathered','organized','mentored','assist','review','help','involve',
                'share','support','coordinate','cooperate','contributed'],
    'communication': ['addressed','collaborated','conveyed','enlivened','instructed','performed','presented','spoke','trained',
                      'author','communicate','define','influence','negotiated','outline','proposed','persuaded','edit',
                    'interviewed','summarize','translate','write','wrote','project plan','business case','proposal','writeup'],
    'analytical': ['process improvement','competitive analysis','aligned','strategive planning','cost savings','researched ',
                    'identified','created','led','measure','program','quantify','forecasr','estimate','analyzed','survey',
                   'reduced','cut cost','conserved','budget','balanced','allocate','adjust','lauched','hired','spedup',
                    'speedup','ran','run','enchanced','developed'],
    'result_driven': ['cut','decrease','eliminate','increase','lower','maximize','rasie','reduce','accelerate','accomplish',
                        'advance','boost','change','improve','saved','save','solve','solved','upgrade','fix','fixed','correct',
                    'achieve'],
    'leadership': ['advise','coach','guide','influence','inspire','instruct','teach','authorized','chair','control','establish',
                    'execute','hire','multi-task','oversee','navigate','prioritize','approve','administer','preside','enforce',
                    'delegate','coordinate','streamlined','produce','review','supervise','terminate',
        'found',
        'set up',
        'spearhead',
        'originate',
        'innovate',
        'implement',
        'design',
        'launch',
        'pioneer',
        'institute'
    ]
}

def extract_competencies(text):
    '''
    Helper function to extract competencies from resume text
    :param resume_text: Plain resume text
    :return: dictionary of competencies
    '''
    #experience_text = ' '.join(experience_list)
    competency_dict = {}

    for competency in COMPETENCIES.keys():
        for item in COMPETENCIES[competency]:
            if string_found(item, text):
                if competency not in competency_dict.keys():
                    competency_dict[competency] = [item]
                else:
                    competency_dict[competency].append(item)
    
    return competency_dict

def extract_experience(resume_text):
    '''
    Helper function to extract experience from resume text
    :param resume_text: Plain resume text
    :return: list of experience
    '''
    wordnet_lemmatizer = WordNetLemmatizer()
    stop_words = set(stopwords.words('english'))

    # word tokenization 
    word_tokens = nltk.word_tokenize(resume_text)

    # remove stop words and lemmatize  
    filtered_sentence = [w for w in word_tokens if not w in stop_words and wordnet_lemmatizer.lemmatize(w) not in stop_words] 
    sent = nltk.pos_tag(filtered_sentence)

    # parse regex
    cp = nltk.RegexpParser('P: {<NNP>+}')
    cs = cp.parse(sent)
    
    # for i in cs.subtrees(filter=lambda x: x.label() == 'P'):
    #     print(i)
    
    test = []
    
    for vp in list(cs.subtrees(filter=lambda x: x.label()=='P')):
        test.append(" ".join([i[0] for i in vp.leaves() if len(vp.leaves()) >= 2]))

    # Search the word 'experience' in the chunk and then print out the text after it
    x = [x[x.lower().index('experience') + 10:] for i, x in enumerate(test) if x and 'experience' in x.lower()]
    return x


def extract_linkedin(text):
    index=cleaned_text.find('https://www.linkedin.com/in')
    #print(index)
    sub=cleaned_text[index:index+28]
    
    text_modified = cleaned_text[index+28:]
    index_last = text_modified.find('/')
    #print(text_modified)
    
    return cleaned_text[index:index+28+index_last+1]

def preprocessing(text):
    lines = [el.strip() for el in text.split("\n") if len(el) > 0]
    cleaned_text = ' '.join(lines)
    cleaned_text = cleaned_text.lower()
    
    #cleaned_text = cleaned_text.replace("+91","")

    return cleaned_text


@app.route('/')
def home():
    return render_template('index.html')

# @app.route('/uploader', methods = ['GET', 'POST'])
# def upload_file():
#    if request.method == 'POST':
#       f = request.files['file']
#       f.save(secure_filename(f.filename))
#       return 'file uploaded successfully'

@app.route('/resume_api',methods=['POST'])
def predict_api():

    f = request.files['file']
    f.save(os.path.join(app.config['UPLOAD_FOLDER'], secure_filename(f.filename)))

    CandidatesInfo = pd.DataFrame() 
    nlp = en_core_web_sm.load()
    matcher = Matcher(nlp.vocab)
    
    RESUME_SECTIONS = [
                    'achievements',
                    'experience',
                    'education',
                    'interests',
                    'projects',
                    'publications',
                    'skills',
                ]
    
    
    
    
    path=os.path.join(app.config['UPLOAD_FOLDER'], secure_filename(f.filename))
    print(path)
    text = readFile(path)
    cleaned_text = preprocessing(text)
    print("cleaned_text")
    print(cleaned_text)
    candidate_name = extract_name(cleaned_text)
    
    finalphoneno=''
    candidate_phoneno = extract_mobile_number(cleaned_text)
    if candidate_phoneno:
        for num in candidate_phoneno:
            num = re.sub('[^+0-9]+', '', num)
            if len(num)==10 or len(num)==12 or len(num)==13:
                finalphoneno = num
                break
            else:
                finalphoneno = ''

    #print(candidate_phoneno)

    candidate_email = extract_email(cleaned_text)
    #print(candidate_email)

    candidate_skillset = extract_skills(text,cleaned_text)
    #print(candidate_skillset)

    candidate_education = extract_education(text)

    candidate_tags = qualification_major(text)

    candidate_experience = extract_experience(text)
    candidate_exp = ",".join(candidate_experience)
    experience = re.sub('[^A-Za-z0-9]+', ' ', candidate_exp)

    candidate_competencies = extract_competencies(text)

    if candidate_competencies:
        for key,val in candidate_competencies.items():
            candidate_competencies[key] = ",".join(val)

    CandidatesInfo = CandidatesInfo.append({'Name': candidate_name,
                                'Phone No': finalphoneno,
                                'Email': candidate_email,
                                'Skillset': ",".join(candidate_skillset),
                                'Education' : ",".join(candidate_education),
                                'Qualification Tags': ",".join(candidate_tags),
                                'Experience':experience,
                                'Competencies':candidate_competencies},ignore_index=True)

    info = CandidatesInfo.to_dict('records')

    return jsonify({'Candidate Details': info})


@app.route('/predict',methods=['POST'])
def predict():

    if request.method == 'POST':
      f = request.files['file']
      f.save(os.path.join(app.config['UPLOAD_FOLDER'], secure_filename(f.filename)))

    #int_features = [int(x) for x in request.form.values()]
    #final_features = [np.array(int_features)]
    #prediction = model.predict(final_features)

    #output = round(prediction[0], 2)
    CandidatesInfo = pd.DataFrame() 
    nlp = en_core_web_sm.load()
    matcher = Matcher(nlp.vocab)
    
    RESUME_SECTIONS = [
                    'achievements',
                    'experience',
                    'education',
                    'interests',
                    'projects',
                    'publications',
                    'skills',
                ]
    
    
    
    #print(f.filename)
    #try:
    path=os.path.join(app.config['UPLOAD_FOLDER'], secure_filename(f.filename))
    #print(path)
    text = readFile(path)
    #print(text)
    cleaned_text = preprocessing(text)
    candidate_name = extract_name(cleaned_text)
    
    finalphoneno=''
    candidate_phoneno = extract_mobile_number(cleaned_text)
    if candidate_phoneno:
        for num in candidate_phoneno:
            num = re.sub('[^+0-9]+', '', num)
            if len(num)==10 or len(num)==12 or len(num)==13:
                finalphoneno = num
                break
            else:
                finalphoneno = ''

    #print(candidate_phoneno)

    candidate_email = extract_email(cleaned_text)
    #print(candidate_email)

    candidate_skillset = extract_skills(text,cleaned_text)
    #print(candidate_skillset)

    candidate_education = extract_education(text)

    candidate_tags = qualification_major(text)

    candidate_experience = extract_experience(text)
    candidate_exp = ",".join(candidate_experience)
    experience = re.sub('[^A-Za-z0-9]+', ' ', candidate_exp)

    candidate_competencies = extract_competencies(text)

    if candidate_competencies:
        for key,val in candidate_competencies.items():
            candidate_competencies[key] = ",".join(val)

    CandidatesInfo = CandidatesInfo.append({'Name': candidate_name,
                                'Phone No': finalphoneno,
                                'Email': candidate_email,
                                'Skillset': ",".join(candidate_skillset),
                                'Education' : ",".join(candidate_education),
                                'Qualification': ",".join(candidate_tags),
                                'Experience':experience,
                                'Competencies':candidate_competencies},ignore_index=True)

    print(CandidatesInfo)

    return render_template('index.html', prediction_text='Candidates Name : {}, Candidate Phone no : {}, Candidate Email : {}, Candidate Skillset : {}, Candidate Education : {}, Candidate Qualification Tags: {}, , Candidate Experience: {}'.format(CandidatesInfo['Name'][0],
        CandidatesInfo['Phone No'][0],CandidatesInfo['Email'][0],CandidatesInfo['Skillset'][0],CandidatesInfo['Education'][0],CandidatesInfo['Qualification'][0],CandidatesInfo['Experience'][0]))

    #except:
    #    return render_template('index.html', prediction_text='Not possible')


    

@app.route('/results',methods=['POST'])
def results():

    data = request.get_json(force=True)
    prediction = model.predict([np.array(list(data.values()))])

    output = prediction[0]
    return jsonify(output)

if __name__ == "__main__":
    app.run(debug=True)