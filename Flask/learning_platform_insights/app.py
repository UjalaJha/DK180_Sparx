import numpy as np
from flask import Flask, request, jsonify, render_template
from werkzeug.utils import secure_filename
import pickle
import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity

import pandas as pd
import numpy as np
import string
import glob
from nltk.corpus import stopwords
from gensim.models import word2vec
#from textblob import Word
stop = stopwords.words('english')

app = Flask(__name__)

@app.route('/insights_api',methods=['POST'])
def learning_insights():
	total_jobs = pd.read_csv("totaljobs.csv")

	total_jobs = total_jobs.replace(np.nan, '', regex=True)
	total_jobs['skills'] = total_jobs['skills'].map(lambda x: x.replace(", ",","))
	only_roles=total_jobs["skills"]
	only_roles = pd.DataFrame(only_roles)
	only_roles.reset_index(inplace=True,drop=True)

	roles = []
	for i in only_roles["skills"]:
	    #print(i)
	    temp=[]
	    for j in i:
	        temp = i.split(',')
	    roles.append(temp)

	ds_sentences = pd.Series(roles, name='roles')

	num_features = 30    # Word vector dimensionality                      
	min_word_count = 300   # Minimum word count                        
	num_workers = 4       # Number of threads to run in parallel
	context = 10          # Context window size                                                                                    
	downsampling = 1e-3   # Downsample setting for frequent words

	# Initialize and train the model (this will take some time)
	
	#print("Training model...")
	model = word2vec.Word2Vec(ds_sentences, workers=num_workers, \
	            size=num_features, min_count = min_word_count, \
	            window = context, sample = downsampling)

	words = list(model.wv.vocab) 
	countmap = {}

	for word in words:
    #print(word)
	    count=0
	    for i in ds_sentences:
	        for j in i:
	            if j==word and j!='':
	                count+=1
	    countmap[word] = count

	sorted_dict = sorted(countmap.items(), key=lambda kv: kv[1],reverse=True)
	popular_courses = {}
	pop_courses = []
	for k in range(0,10):
		popular_courses[sorted_dict[k][0]] = sorted_dict[k][1]

	for k in range(0,12):
		pop_courses.append(sorted_dict[k][0])

	other_courses = []
	for k in range(15,25):
		other_courses.append(sorted_dict[k][0])


	competencies = ['teamwork','analytical','process improvement','competitive analysis','strategive planning','result_driven'
	    			'leadership','inspiring','instruct','teach','authorized','supervise','organized','problem solving',
	    			'self aware','self control','inspirational','strategic','creativity','work ethic','time managemenet','ethical',
	               'interpersonal','social','confidence','boldness','respect','verbal','friendly','critical thinking','persuasion','negotiation',
	               'Social Perceptiveness','competitive']

	softskills = {}

	for word in competencies:
	    #print(word)
	    count=0
	    for i in ds_sentences:
	        for j in i:
	            if j==word.lower() and j!='':
	                count+=1

	    softskills[word] = count


	soft_skills = sorted(softskills.items(), key=lambda kv: kv[1],reverse=True)
	popular_softskills={}

	for k in range(0,5):
	    popular_softskills[soft_skills[k][0]] = soft_skills[k][1]

	return jsonify({'course_frequency':popular_courses,'popular_courses' : pop_courses,'popular_softskills':popular_softskills,'other_courses':other_courses})


	




if __name__ == "__main__":
    app.run(debug=True, host='0.0.0.0',port='5010')