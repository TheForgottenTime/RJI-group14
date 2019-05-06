import tensorflow as tf
from tensorflow import keras

rankingModel = keras.models.load_model('models/base/baseRankingModel.h5')
deleteModel = keras.models.load_model('models/base/baseDeleteModel.h5')
categoryModel = keras.models.load_model('models/base/categoryModel.h5')

def saveAllBase():
    rankingModel.save('models/base/baseRankingModel.h5')
    deleteModel.save('models/base/baseDeleteModel.h5')
    categoryModel.save('models/base/categoryModel.h5')
    return 0