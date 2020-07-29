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
stop = stopwords.words('english')
import pyemd
from pyemd import emd
from gensim.similarities import WmdSimilarity

import string
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

from surprise import Dataset
from surprise import Reader
reader = Reader(rating_scale=(1, 5))

from surprise import KNNWithMeans
from surprise import KNNBasic

import heapq
from collections import defaultdict
from operator import itemgetter
import glob

pdf_files = glob.glob(r"./Learning Test Profiles/*.csv")
# To use item-based cosine similarity
sim_options = {
    "name": "msd",
    "user_based": False,  # Compute  similarities between items
}
model = KNNWithMeans(sim_options=sim_options)

generic_courses = [(704732,5),(147908,5),(1128560,4),(523312,4),(986742,4),(527834,4),(1104858,5),
                   (472592,4),(555952,5),(375594,4),(429952,4),(1048496,5),(1246208,4),(1163894,5),(602702,4),
                   (679992,4),(1092766,5),(326338,4),(956102,4),(1216554,5)]

generic_basic_courses = [(69414,5),(657710,4),(1211960,5),(756914,5),(380970,5)]

courses = pd.read_csv(r"./udemy_courses.csv")
courses['title'] = courses['course_title']
courses['course_title'] = courses['course_title'].apply(lambda x:' '.join(x.lower() for x in x.split()))
courses['course_title']= courses['course_title'].apply(lambda x: ' '.join(x for x in x.split() if x not in string.punctuation))
courses['course_title']= courses['course_title'].str.replace('[^\w\s]','')
courses['course_title']= courses['course_title'].apply(lambda x: ' '.join(x for x in x.split() if  not x.isdigit()))
courses['course_title'] = courses['course_title'].apply(lambda x:' '.join(x for x in x.split() if not x in stop))
#pdf_files = glob.glob("C:\\Users\\juyee\\Desktop\\Web scraping\\Test Profiles\\*.csv")

app = Flask(__name__)

def recommendgenericcourses():
    return(generic_basic_courses,generic_courses)

def get_title_from_index(index):
    return courses[courses.index == index]["title"].values[0]

def checkBasic(index):
    if courses[courses.index == index]["level"].values[0] == "Beginner Level" or courses[courses.index == index]["level"].values[0] == "All Levels":
        return True
    else:
        return False
    
    
def checkAdvance(index):
    if courses[courses.index == index]["level"].values[0] == "Intermediate Level" or courses[courses.index == index]["level"].values[0] == "Expert Level" or courses[courses.index == index]["level"].values[0] == "All Levels":
        return True
    else:
        return False

def get_id_from_index(index):
    return courses[courses.index == index]["course_id"].values[0]

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
        #print(x)
        if str(x[1]).lower() == 'advance':
              advance.append(x[0])
        elif str(x[1]).lower() == 'intermediate':
              intermediate.append(x[0])    
        elif str(x[1]).lower() == 'basic':
                basic.append(x[0])
        else:
                no_badge.append(x[0])
    advanced_badge = []
    advanced_badge = advance+intermediate 
    return basic,advanced_badge

def recommendbasiccourses(my_skills):
    only_roles=courses["course_title"]
    #my_skills="html,css,javascript,jquery"
    #if len(my_skills)==0:
    #    return empty_basic_courses
        
    for bskills in my_skills:
        bskills=pd.Series(bskills)
        only_roles=bskills.append(only_roles ,ignore_index=True)
        cv = CountVectorizer()
        count_matrix = cv.fit_transform(only_roles)
        cosine_sim = cosine_similarity(count_matrix)

        matches=cosine_sim[0:1]
        matches=matches[:,1:]

        list_matches=matches[0]
        obj1 = enumerate(list_matches) 
        obj1 = (list(obj1))
        sorted_obj1 = sorted(obj1,key=lambda x:x[1],reverse=True)

        i=0
        list_roles =[]
        #print(sorted_obj1)
        course_list=[]
        for element in sorted_obj1:
                if(checkBasic(element[0])) and (element[1]*5)>2:
                    course_list.append((get_id_from_index(element[0]),element[1]*5))
                    #print(get_title_from_index(element[0]))

                i=i+1
                if i>5:
                    break
        return course_list

def recommendadvancecourses(my_skills):
    only_roles=courses["course_title"]
    
    
    for askills in my_skills:
        askills=pd.Series(askills)
        #print(my_skills)
        only_roles=askills.append(only_roles ,ignore_index=True)
        #print(only_roles)
        cv = CountVectorizer()
        count_matrix = cv.fit_transform(only_roles)
        #print(count_matrix)
        cosine_sim = cosine_similarity(count_matrix)

        matches=cosine_sim[0:1]
        matches=matches[:,1:]

        list_matches=matches[0]
        obj1 = enumerate(list_matches) 
        obj1 = (list(obj1))
        sorted_obj1 = sorted(obj1,key=lambda x:x[1],reverse=True)

        i=0
        list_roles =[]
        course_list = []
        for element in sorted_obj1:
                if(checkAdvance(element[0])) and (element[1]*5)>2:
                    course_list.append((get_id_from_index(element[0]),element[1]*5))
                    #print(get_title_from_index(element[0]))

                i=i+1
                if i>5:
                    break
        return course_list

    

def getTopNCourses(testSubject,coursesdata):
    
    data = Dataset.load_from_df(coursesdata[["userid", "courseid", "score"]], reader)
    trainSet = data.build_full_trainset()
    model.fit(trainSet)
    k=7
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
            topNlist.append([candidateID,ratingSum])
            #print(candidateID, getCandidateName(candidateID), ratingSum)
            pos += 1
            if (pos > 6):
                break
    return topNlist


@app.route('/')
def home():
    return render_template('index.html')

    
@app.route('/course_api',methods=['POST'])
def predict_api():
    
    input_company = {'name': request.json['name'],'skills':request.json['skills']}

    cand_name = input_company["name"]
    cand_skills = input_company["skills"]
    coursesdata = pd.read_csv("Learning Test Profiles\\coursesdata.csv")
    users = pd.read_csv("Learning Test Profiles\\users.csv")

    #cand_name = "Maya"
    #cand_skills = "python-advance,graohql-intermediate,chatbot-intermediate,bootstrap-intermediate,finance-intermediate,angularjs-basic"
    uniqueid = uuid.uuid4()
    while uniqueid in users["id"]:
        uniqueid = uuid.uuid4()

        
    users = users.append({"id":uniqueid,"User":cand_name,"Skills":cand_skills},
                                ignore_index=True)

    if len(cand_skills)!=0:
        badges_list = str_to_list(cand_skills)
        basic_skills,advanced_skills = badge_preference(badges_list)
        if(len(basic_skills)==0):
            total_recommendations = recommendadvancecourses(advanced_skills)
        elif(len(advanced_skills)==0):
            total_recommendations = recommendbasiccourses(basic_skills)
        else:
            basic_recommendations = recommendbasiccourses(basic_skills)
            advanced_recommendations = recommendadvancecourses(advanced_skills)
            total_recommendations = basic_recommendations+advanced_recommendations
    else:
        basic_recommendations,advanced_recommendations = recommendgenericcourses()    
        total_recommendations = basic_recommendations+advanced_recommendations

    for j in range(0,len(total_recommendations)):
            cid = total_recommendations[j][0]
            score = total_recommendations[j][1]
            coursesdata = coursesdata.append({"userid":uniqueid,"courseid":cid,"score":score},
                                                                    ignore_index=True)

    topNlist = getTopNCourses(uniqueid,coursesdata)
    for t in topNlist:
        cid = t[0]
        score = t[1]
        coursesdata = coursesdata.append({"userid":uniqueid,"courseid":cid,"score":score},
                                                    ignore_index=True)
        
    total_reco = total_recommendations+topNlist

    course_recommendations = pd.DataFrame()

    for course in total_reco:
        courseid = course[0]
        course_recommendations = course_recommendations.append(courses[courses["course_id"]==courseid])
        
    course_recommendations = course_recommendations.drop(columns=["course_title"])
    coursesdata.to_csv("Learning Test Profiles\\coursesdata.csv",index=False)
    users.to_csv("Learning Test Profiles\\users.csv",index=False)

    course_reco = course_recommendations.to_dict('records')

    return jsonify({'recommended_courses' : course_reco})
    


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
    app.run(host="0.0.0.0", debug=True)