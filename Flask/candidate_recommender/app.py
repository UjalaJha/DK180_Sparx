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
import uuid
import math

from surprise import Dataset
from surprise import Reader
reader = Reader(rating_scale=(1, 5))

from surprise import KNNWithMeans
from surprise import KNNBasic

import heapq
from collections import defaultdict
from operator import itemgetter

# To use item-based cosine similarity
sim_options = {
    "name": "cosine",
    "user_based": True,  # Compute  similarities between items
}
model = KNNWithMeans(sim_options=sim_options)

#profiledata = pd.read_csv("C:\\Users\\juyee\\Envs\\sih2020\\candidate_recommender\\Test Profiles\\profile_data.csv")
df = pd.read_csv(r"./JVR_CandidatesInfo2.csv")
df = pd.read_csv(r"JVR_CandidatesInfo2.csv")

df = df.replace(np.nan, '', regex=True)
df = df.rename(columns={'Unnamed: 0':'ind'})

#pdf_files = glob.glob("C:\\Users\\juyee\\Desktop\\Web scraping\\Test Profiles\\*.csv")

app = Flask(__name__)

def getCandidateName(candidateid):
    name = df[df["ind"]==candidateid]["Name"]
    return " ".join(name)

def recommendcandidate(my_skills):
    my_skills=pd.Series([my_skills])
    only_roles=df["Skillset"]
    only_roles=my_skills.append(only_roles ,ignore_index=True)
    
    
    cv = CountVectorizer()
    count_matrix = cv.fit_transform(only_roles)
    cosine_sim = cosine_similarity(count_matrix)
    
    matches=cosine_sim[0:1]
    matches=matches[:,1:]
    
    dfcandidates= df.iloc[[]]
    
    
    list_matches=matches[0]
    obj1 = enumerate(list_matches) 
    obj1 = (list(obj1))
    sorted_obj1 = sorted(obj1,key=lambda x:x[1],reverse=True)
    
    i=0
    #print(sorted_obj1)
    scores = []
    for element in sorted_obj1:
            dfcandidates = pd.concat([dfcandidates, df.iloc[[element[0]]]])
            #print(df.iloc[[element[0]]])
            score = element[1]
            scores.append(score*5)
            i=i+1
            if i>4:
                break

    dfcandidates["scores"]=scores
    return dfcandidates

def getTopNCandidates(testSubject,company_role,profiledata):
    profile = profiledata[profiledata["role"]==company_role]
    profile = pd.DataFrame(profile)
    data = Dataset.load_from_df(profile[["companyid", "candidateid", "score"]], reader)
    trainSet = data.build_full_trainset()
    model.fit(trainSet)
    k=10
    simsMatrix = model.compute_similarities()
    testUserInnerID = trainSet.to_inner_uid(testSubject)
    similarityRow = simsMatrix[testUserInnerID]
    
    similarUsers = []
    for innerID, score in enumerate(similarityRow):
        if (innerID != testUserInnerID):
            similarUsers.append( (innerID, score) )

    kNeighbors = heapq.nlargest(k, similarUsers, key=lambda t: t[1])

    # Get the stuff they rated, and add up ratings for each item, weighted by user similarity
    candidates = defaultdict(float)
    for similarUser in kNeighbors:
        innerID = similarUser[0]
        userSimilarityScore = similarUser[1]
        theirRatings = trainSet.ur[innerID]
        for rating in theirRatings:
            candidates[rating[0]] += (rating[1] / 5.0) * userSimilarityScore

    # Build a dictionary of stuff the user has already seen
    watched = {}
    for itemID, rating in trainSet.ur[testUserInnerID]:
        watched[itemID] = 1

    # Get top-rated items from similar users:
    pos = 0
    topNlist = []
    for itemID, ratingSum in sorted(candidates.items(), key=itemgetter(1), reverse=True):
        if not itemID in watched:
            candidateID = trainSet.to_raw_iid(itemID)
            topNlist.append([candidateID, getCandidateName(candidateID), ratingSum])
            #print(candidateID, getCandidateName(candidateID), ratingSum)
            pos += 1
            if (pos > 4):
                break
    return topNlist


@app.route('/')
def home():
    return render_template('index.html')

    
@app.route('/candidate_api',methods=['POST'])
def predict_api():
    profiledata = pd.read_csv(".\\Test Profiles\\profile_data.csv")
    profiledata = pd.read_csv("Test Profiles\\profile_data.csv")

    input_company = {'role_title': request.json['role_title'],'company_name':request.json['company_name'],'description' : request.json['description'],
    'exp':request.json['exp'], 'loc':request.json['loc'],'salary':request.json['salary'],'skills' : request.json['skills']}

    company_name = input_company['company_name']
    company_role = input_company['role_title']
    company_skills = input_company['skills']
    company_description = input_company['description']
    company_loc = input_company['loc']
    salary = input_company['salary']
    company_exp = input_company['exp']
    path = ".\\Test Profiles\\"+company_role+".csv"
    path = "Test Profiles\\"+company_role+".csv"

    role_jobs = pd.read_csv(path)
    #role_jobs = role_jobs.replace(np.nan, '', regex=True)
    role_jobs = pd.DataFrame(role_jobs)

    #print(role_jobs)
    uniqueid = uuid.uuid4()
    #print(uniqueid)
    while uniqueid in role_jobs["unique_id"]:
        uniqueid = uuid.uuid4()
        
    role_jobs = role_jobs.append({"company":company_name,
                                  "description":company_description,
                                  "exp":company_exp,
                                  "loc":company_loc,
                                  "salary":salary,
                                  "skills":company_skills,
                                  "unique_id":uniqueid},
                                  ignore_index=True)

    i = role_jobs[role_jobs["unique_id"]==uniqueid].index
    compid = i.tolist()[0]

    dfcandidate = recommendcandidate(company_skills)
    dfcandidate.reset_index(inplace=True)
    dfcandidate = dfcandidate.rename(columns={'Unnamed: 0':'ind'})


    for j in range(0,5):
        cid = dfcandidate["ind"][j]
        score = dfcandidate["scores"][j]
        profiledata = profiledata.append({"companyid":compid,"candidateid":cid,"score":score,"role":company_role},
                                                               ignore_index=True)
        
    topNlist = getTopNCandidates(compid,company_role,profiledata)
    for t in topNlist:
        cid = t[0]
        dfcandidate = dfcandidate.append(df.loc[cid])
        score = t[2]
        profiledata = profiledata.append({"companyid":compid,"candidateid":cid,"score":score,"role":company_role},
                                                    ignore_index=True)

        
    candidate_recommendations = pd.DataFrame(dfcandidate)
    
    phonenos = []
    for phone in candidate_recommendations["Phone No"]:
        if type(phone)==float:
            no = math.trunc(phone)
            phonenos.append(str(no))
        else:
            phonenos.append("")

    candidate_recommendations=candidate_recommendations.drop(columns=['index','ind','scores','Phone No'])
    candidate_recommendations['Phone No']=phonenos


    candidate_reco = candidate_recommendations.to_dict('records')

    profiledata.to_csv(r"./Test Profiles/profile_data.csv",index=False)
    profiledata.to_csv("Test Profiles\\profile_data.csv",index=False)
    role_jobs.to_csv(path,index=False)  

    return jsonify({'recommended_candidates' : candidate_reco})
    


#@app.route('/predict',methods=['POST'])
#def predict():

    
    #return jsonify(job_profiles)
    

@app.route('/results',methods=['POST'])
def results():

    data = request.get_json(force=True)
    prediction = model.predict([np.array(list(data.values()))])

    output = prediction[0]
    return jsonify(output)



if __name__ == "__main__":
    app.run(debug=True)