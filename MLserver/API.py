from flask import Flask, g, request
from flask_restful import Resource,  Api, reqparse
import rankPhotos
import markdown
import os
import shelve

app = Flask(__name__)
app.config['DEBUG'] = True

@app.route('/', methods = ['POST', 'GET'])
def home():
    filepath = ''

    if 'filepath' in request.form:
        print('filepath is found')
        filepath = str(request.form.get('filepath'))
        print(filepath)
        return str(rankPhotos.rankData(filepath))
        print('finished api call')
    else:
        print('no filepath')
        return "bad filepath"


app.run()