import tensorflow as tf
from tensorflow import keras
import modelLoad
import normalizePictures
import numpy as np





def rankData(inputfilepath):
    #runs ML model against the dataset of photos
    print('started rank photos')
    rankingModel = modelLoad.loadranking()
    print('ranking model loaded')
    inputImageArray = normalizePictures.normalizepicture(inputfilepath)
    print('image normalized')
    predictions = rankingModel.predict(inputImageArray)
    print('ml model has run')
    ranking = np.argmax(predictions[0])
    print('got predition')
    print(type(ranking))
    print(ranking.item())
    print(type(ranking.item()))

    return ranking.item()


