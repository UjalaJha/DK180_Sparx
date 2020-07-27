import numpy as np
from flask import Flask, request, jsonify, render_template
from werkzeug.utils import secure_filename
import pickle
import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity

import io
import nltk
nltk.download('punkt')
nltk.download('averaged_perceptron_tagger')
import re
nltk.download('stopwords')
from nltk.corpus import stopwords
import pyemd
from pyemd import emd
from gensim.similarities import WmdSimilarity


import sys
import os
import glob
import re
import bs4
import numpy
import pandas
import re
import requests
import datetime

model = pickle.load(open("job_recommender.pkl","rb"))

roles_df = pd.read_csv("C:\\Users\\juyee\\Desktop\\Web scraping\\data_final_final.csv")
roles_df = roles_df.replace(np.nan, '', regex=True)

roles_df['TOOLS'] = roles_df['TOOLS'].map(lambda x: x.strip("[]'."))
roles_df['TOOLS'] = roles_df['TOOLS'].map(lambda x: x.replace("'",""))
roles_df['TOOLS'] = roles_df['TOOLS'].map(lambda x: x.replace(", ",","))

app = Flask(__name__)
app.config['UPLOAD_FOLDER']='C://Users//juyee//Envs//sih2020//resume'

def get_title_from_index(index):
    return roles_df[roles_df.index == index]["JOB PROFILE"].values[0]

def str_to_list(badge_str):
    badge_list = badge_str.split(',')
    return badge_list 

def badge_preference(badge_list):
    advance = []
    basic = []
    intermediate = []
    no_badge = []
    for badge in badge_list:
        x = badge.split('-')
        if str(x[1]).lower() == 'advance':
            advance.append(x[0])
        elif str(x[1]).lower() == 'intermediate':
            intermediate.append(x[0])    
        #elif str(x[1]).lower() == 'basic':
         #  basic.append(x[0])
        else:
            no_badge.append(x[0])
    pref_badge = []
    pref_badge = advance + intermediate 
    return pref_badge

def transform(input,sign, quote = False):
    syntax = input.replace(" ", sign)
    if quote == True:
        syntax = ''.join(['"', syntax, '"'])
    return(syntax)

def getting_pages(jobprofile):
    input_job = jobprofile
    input_quote = False # add quotation marks("") to your input_job
    input_city = "" # leave empty if input_city is not specified
    input_state = "India"
    sign = "+"
    BASE_URL_indeed = 'https://www.indeed.co.in'
    
    if not input_city: # if (input_city is "")
        url_indeed_list = [ BASE_URL_indeed, '/jobs?q=', transform(input_job, sign, input_quote),
                    '&l=', input_state]
        url_indeed = ''.join(url_indeed_list)
    else: # input_city is not ""
        url_indeed_list = [ BASE_URL_indeed, '/jobs?q=', transform(input_job, sign, input_quote),
                    '&l=', transform(input_city, sign), '%2C+', input_state]
        url_indeed = ''.join(url_indeed_list)
        
    rawcode_indeed = requests.get(url_indeed)
    
    soup_indeed = bs4.BeautifulSoup(rawcode_indeed.text, "lxml")
    
    try:
        num_total_ind = soup_indeed.find(id = 'searchCountPages').contents[0].split()
        num_total_ind.remove('1')
        num_total_ind.remove('Page')
        num_total_indeed = ' '.join(num_total_ind)
        num_total_indeed = re.sub("[^0-9]","", num_total_indeed) # remove non-numeric characters in the string
        num_total_indeed = int(num_total_indeed)
        
        num_pages_indeed = int(numpy.ceil(num_total_indeed/10.0))
        return(num_pages_indeed,url_indeed)
    except:
        return(0,0)

def indeed_web_scraping(num_pages_indeed,url_indeed):
    
    job_df_indeed = pandas.DataFrame()
    for i in range(1, num_pages_indeed+1):
        # generate the URL
        url = ''.join([url_indeed, '&start=', str(i*10)])
        #print(url)
        # get the HTML code from the URL
        rawcode = requests.get(url)
        soup = bs4.BeautifulSoup(rawcode.text, "lxml")

        # pick out all the "div" with "class="job-row"
        divs = soup.findAll("div")
        job_divs = [jp for jp in divs if not jp.get('class') is None
                    and 'row' in jp.get('class')]
            
        for job in job_divs:
            # job id
            id = job.get('data-jk', None)
            #print(id)
            # job link related to job id
            link = url + '&vjk=' + id
            # job title
            title = job.find('a', attrs={'data-tn-element': 'jobTitle'}).attrs['title']
            # job company
            company = job.find('span', {'class': 'company'}).text.strip()
            # job location
            location = job.find('div', {'class': 'recJobLoc'}).attrs['data-rc-loc']

            date_posted = job.find('span', {'class': 'date'}).text.strip()

            summary = job.find('div', {'class': 'summary'}).text.strip()


            job_df_indeed = job_df_indeed.append({'job_title': title,
                                            'job_id': id,
                                            'job_company': company,
                                            'from':'Indeed',
                                            'job_location':location,
                                            'posted_date' :date_posted,
                                            'job_summary':summary,
                                            'job_link':link},ignore_index=True)
        return job_df_indeed



@app.route('/')
def home():
    return render_template('index.html')

# @app.route('/uploader', methods = ['GET', 'POST'])
# def upload_file():
#    if request.method == 'POST':
#       f = request.files['file']
#       f.save(secure_filename(f.filename))
#       return 'file uploaded successfully'
    
@app.route('/api',methods=['POST'])
def predict_api():
    input_skills = {'skills' : request.json['skills']}

    actual_skills = input_skills['skills']
    badges_list = str_to_list(actual_skills)
    badges_only_skills = badge_preference(badges_list)
    #badges_only_skills = input_skills.split(",")
    print(badges_only_skills)
    
    only_roles=roles_df["TOOLS"]
    only_roles = pd.DataFrame(only_roles)

    roles = []
    for i in only_roles["TOOLS"]:
        #print(i)
        temp=[]
        for j in i:
            temp = i.split(',')
        roles.append(temp)

    ds_sentences = pd.Series(roles, name='roles')

    rows = []
    for i in range(1,len(ds_sentences)):
        row = [i,model.wmdistance(ds_sentences.iloc[0], ds_sentences.iloc[i])]
        rows.append(row)
        
    dist=pd.DataFrame(rows,columns=["Sentence","distance"])

    dist = dist.sort_values(by=["distance"],ascending=True)

    job_profile_list=[]
    rows = []
    #badges_only_skills = ['python','r','machine learning','artificial intelligence','business analytics','data science','html','css','javascript','sql','rdbms']
    for i in range(0,len(ds_sentences)):
        row = [i,model.wmdistance(badges_only_skills, ds_sentences.iloc[i])]
        rows.append(row)
        
    dist=pd.DataFrame(rows,columns=["Sentence","distance"])
    dist = dist.sort_values(by=["distance"],ascending=True)
        
    i=0
    list_roles =[]
    for element in dist['Sentence']:
        job_profile_list.append(get_title_from_index(element))
        #print(get_title_from_index(element))
        i=i+1
        if i>11:
            break

    output_profiles = job_profile_list

    result=pd.DataFrame()
    for t in range(0, 11):
        input_job = output_profiles[t]
        num_pages_indeed,url_indeed = getting_pages(input_job)
        if num_pages_indeed==0:
            continue
        else:
            #final_profiles.append(input_job)
            job_df_indeed = indeed_web_scraping(num_pages_indeed,url_indeed)
        
            result = result.append(job_df_indeed,ignore_index=True)

    final = result.to_dict('records')

    return jsonify({'job profiles' : output_profiles,'jobs':final})
    #return render_template('index.html', prediction_text='Suitable Job profiles for you are: {}'.format(job_profiles))


@app.route('/predict',methods=['POST'])
def predict():

    if request.method == 'POST':
        input_skills = request.form['skills']

    badges_list = str_to_list(input_skills)
    badges_only_skills = badge_preference(badges_list)
    #badges_only_skills = input_skills.split(",")
    print(badges_only_skills)
    
    only_roles=roles_df["TOOLS"]
    only_roles = pd.DataFrame(only_roles)

    roles = []
    for i in only_roles["TOOLS"]:
        #print(i)
        temp=[]
        for j in i:
            temp = i.split(',')
        roles.append(temp)

    ds_sentences = pd.Series(roles, name='roles')

    rows = []
    for i in range(1,len(ds_sentences)):
        row = [i,model.wmdistance(ds_sentences.iloc[0], ds_sentences.iloc[i])]
        rows.append(row)
        
    dist=pd.DataFrame(rows,columns=["Sentence","distance"])

    dist = dist.sort_values(by=["distance"],ascending=True)

    job_profile_list=[]
    rows = []
    #badges_only_skills = ['python','r','machine learning','artificial intelligence','business analytics','data science','html','css','javascript','sql','rdbms']
    for i in range(0,len(ds_sentences)):
        row = [i,model.wmdistance(badges_only_skills, ds_sentences.iloc[i])]
        rows.append(row)
        
    dist=pd.DataFrame(rows,columns=["Sentence","distance"])
    dist = dist.sort_values(by=["distance"],ascending=True)
        
    i=0
    list_roles =[]
    for element in dist['Sentence']:
        job_profile_list.append(get_title_from_index(element))
        #print(get_title_from_index(element))
        i=i+1
        if i>11:
            break

    output_profiles = job_profile_list
    #Getting indeed jobs
    #final_profiles = []
    result=pd.DataFrame()
    for t in range(0, 11):
        input_job = output_profiles[t]
        num_pages_indeed,url_indeed = getting_pages(input_job)
        if num_pages_indeed==0:
            continue
        else:
            #final_profiles.append(input_job)
            job_df_indeed = indeed_web_scraping(num_pages_indeed,url_indeed)
        
            result = result.append(job_df_indeed,ignore_index=True)

    job_profiles = ",\n".join(job_profile_list)

    return render_template('index.html', data=result,tables=[result.to_html(classes='data')], titles=result.columns.values, prediction_text='Suitable Job profiles for you are: {}'.format(job_profiles))
    #return jsonify(job_profiles)
    

@app.route('/results',methods=['POST'])
def results():

    data = request.get_json(force=True)
    prediction = model.predict([np.array(list(data.values()))])

    output = prediction[0]
    return jsonify(output)



if __name__ == "__main__":
    app.run(debug=True)