import tensorflow as tf
from tensorflow import keras


def loadranking():

    return keras.models.load_model('models/base/baseRankingModel.h5')

def loaddelete():

    return keras.models.load_model('models/base/baseDeleteModel.h5')

def loadcategory():

    return keras.models.load_model('models/base/categoryModel.h5')

"""
def saveAllBase():
    rankingModel.save('models/base/baseRankingModel.h5')
    deleteModel.save('models/base/baseDeleteModel.h5')
    categoryModel.save('models/base/categoryModel.h5')
    return 0

"""