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

pdf_files = glob.glob(r"./Blog Test Profiles/*.csv")
# To use item-based cosine similarity
sim_options = {
    "name": "msd",
    "user_based": True,  # Compute  similarities between items
}
model = KNNWithMeans(sim_options=sim_options)

blogs = pd.read_csv(r"./blogs.csv")
blogs = blogs.replace(np.nan, '', regex=True)
blogs['blog_title'] = blogs['Title']
blogs['blog_title'] = blogs['blog_title'].apply(lambda x:' '.join(x.lower() for x in x.split()))
blogs['blog_title']= blogs['blog_title'].apply(lambda x: ' '.join(x for x in x.split() if x not in string.punctuation))
blogs['blog_title']= blogs['blog_title'].str.replace('[^\w\s]','')
blogs['blog_title']= blogs['blog_title'].apply(lambda x: ' '.join(x for x in x.split() if  not x.isdigit()))
blogs['blog_title'] = blogs['blog_title'].apply(lambda x:' '.join(x for x in x.split() if not x in stop))

Tag_list=['Tag_ai','Tag_android','Tag_apple','Tag_architecture','Tag_art','Tag_artificial-intelligence','Tag_big-data','Tag_bitcoin','Tag_blacklivesmatter','Tag_blockchain',
 'Tag_blog','Tag_blogging','Tag_books','Tag_branding','Tag_business','Tag_college','Tag_computer-science','Tag_creativity','Tag_cryptocurrency','Tag_culture','Tag_data',
 'Tag_data-science','Tag_data-visualization','Tag_deep-learning','Tag_design','Tag_dogs','Tag_donald-trump','Tag_economics','Tag_education','Tag_energy','Tag_entrepreneurship',
 'Tag_environment','Tag_ethereum','Tag_feminism','Tag_fiction','Tag_food','Tag_football','Tag_google','Tag_government','Tag_happiness','Tag_health','Tag_history','Tag_humor',
 'Tag_inspiration','Tag_investing','Tag_ios','Tag_javascript','Tag_jobs','Tag_journalism','Tag_leadership','Tag_life','Tag_life-lessons','Tag_love','Tag_machine-learning',
 'Tag_marketing','Tag_medium','Tag_mobile','Tag_motivation','Tag_movies','Tag_music','Tag_nba','Tag_news','Tag_nutrition','Tag_parenting','Tag_personal-development','Tag_photography',
 'Tag_poem','Tag_poetry','Tag_politics','Tag_product-design','Tag_productivity','Tag_programming','Tag_psychology','Tag_python','Tag_racism','Tag_react','Tag_relationships',
 'Tag_science','Tag_self-improvement','Tag_social-media','Tag_software-engineering','Tag_sports','Tag_startup','Tag_tech','Tag_technology','Tag_travel','Tag_trump','Tag_ux',
 'Tag_venture-capital','Tag_web-design','Tag_web-development','Tag_women','Tag_wordpress','Tag_work','Tag_writing']

app = Flask(__name__)



def get_title_from_index(index):
    return blogs[blogs.index == index]["Title"].values[0]

def getRecommendedBlogs(skills):
    only_roles=blogs["blog_title"]
    #my_skills="Interaction Design, UX, User Experience, Prototyping, Product Design"
    my_skills=pd.Series([skills])
    #print(my_skills)
    only_roles=my_skills.append(only_roles ,ignore_index=True)
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
    #print(sorted_obj1)
    blogs_list=[]
    for element in sorted_obj1:
        if(element[1]*5)>2:
            blogs_list.append((element[0],element[1]*5))
            #print(get_title_from_index(element[0]),element[1]*5)    
        i=i+1
        if i>10:
            break
    return blogs_list
    
def getTopNCourses(testSubject,blogsdata):
    
    data = Dataset.load_from_df(blogsdata[["userid", "blogid", "score"]], reader)
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
            topNlist.append([candidateID,ratingSum])
            #print(candidateID, getCandidateName(candidateID), ratingSum)
            pos += 1
            if (pos > 10):
                break
    return topNlist


@app.route('/')
def home():
    return render_template('index.html')

    
@app.route('/blog_api',methods=['POST'])
def predict_api():
    
    input_company = {'name': request.json['name'],'skills':request.json['skills']}

    cand_name = input_company["name"]
    cand_skills = input_company["skills"]
    blogsdata = pd.read_csv("Blog Test Profiles\\blogsdata.csv")
    users = pd.read_csv("Blog Test Profiles\\users.csv")

    #cand_name = "Maya"
    #cand_skills = "python,graphql,chatbot,bootstrap,finance,angularjs,machine learning,ai,rest"
    uniqueid = uuid.uuid4()
    while uniqueid in users["id"]:
        uniqueid = uuid.uuid4()
        
    users = users.append({"id":uniqueid,"User":cand_name,"Skills":cand_skills},
                                ignore_index=True)

    if len(cand_skills)!=0:
        blogs_list = getRecommendedBlogs(cand_skills)
    else:
        generic_skills="personality development,personality,behavior"
        blogs_list = getRecommendedBlogs(generic_skills)

    total_recommendations=blogs_list
    for j in range(0,len(total_recommendations)):
            cid = total_recommendations[j][0]
            score = total_recommendations[j][1]
            blogsdata = blogsdata.append({"userid":uniqueid,"blogid":cid,"score":score},
                                                                    ignore_index=True)

    topNlist = getTopNCourses(uniqueid,blogsdata)
    for t in topNlist:
        bid = t[0]
        score = t[1]
        blogsdata = blogsdata.append({"userid":uniqueid,"blogid":bid,"score":score},
                                                    ignore_index=True)
        
    total_reco = blogs_list + topNlist

    blog_recommendations = pd.DataFrame()

    for blog in total_reco:
        blogid = blog[0]
        blog_recommendations = blog_recommendations.append(blogs[blogs.index==blogid])
        
    blogsdata.to_csv("Blog Test Profiles\\blogsdata.csv",index=False)
    users.to_csv("Blog Test Profiles\\users.csv",index=False)

    blog_recommendations = blog_recommendations.drop(columns=["Image","Publication","Year","Month","Day","Reading_Time","Claps","Author_url","blog_title"])
    blog_recommendations.reset_index(drop=True,inplace=True)

    #tags=[]
    final=[]
    final_dict={}
    for b in range(len(blog_recommendations)):
        tags=[]
        for t in Tag_list:
            if blog_recommendations.loc[b][t]==1:
                tags.append(str(t))
        final_dict["Title"] = blog_recommendations.loc[b]["Title"]
        final_dict["Subtitle"] = blog_recommendations.loc[b]["Subtitle"]
        final_dict["url"] = blog_recommendations.loc[b]["url"]
        for t in Tag_list:
            if t in tags:
                final_dict[t]=str(blog_recommendations.loc[b][t])
        final.append(final_dict)

    return jsonify({'recommended_blogs' : final})
    


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