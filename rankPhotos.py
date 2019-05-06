import tensorflow as tf
from tensorflow import keras
import modelLoad
import normalizePictures
import numpy as np





def rankData(inputfilepath):
    #runs ML model against the dataset of photos
    inputImageArray = normalizePictures.normalizepicture(inputfilepath)
    predictions = modelLoad.rankingModel.predict(inputImageArray)
    
    ranking = np.argmax(predictions[0])



    return ranking

print(rankData('/20170909_MuSc/1q/20170909_MizzouSouthCarolina_EC_454.JPG'))
print('finisned')
