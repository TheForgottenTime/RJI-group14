import tensorflow as tf
from tensorflow import keras



#base model for generating image rankings
baseRankingModel = keras.Sequential([
    keras.layers.Flatten(),
    keras.layers.Dense(200, activation=tf.nn.relu),
    keras.layers.Dense(1000, activation=tf.nn.softmax)
])





baseRankingModel.compile(optimizer = 'adam', loss = 'sparse_categorical_crossentropy', metrics=['accuracy'])
baseRankingModel.save('models/base/baseRankingModel.h5')




#base model for generating keep/delete values
baseDeleteModel = keras.Sequential([
    keras.layers.Flatten(),
    keras.layers.Dense(200, activation=tf.nn.relu),
    keras.layers.Dense(2, activation=tf.nn.softmax)
])

baseDeleteModel.compile(optimizer = 'adam', loss = 'binary_crossentropy', metrics=['accuracy'])
baseDeleteModel.save('models/base/baseDeleteModel.h5')


#model for generating categories
categoryModel = keras.Sequential([
    keras.layers.Flatten(),
    keras.layers.Dense(200, activation=tf.nn.relu),
    keras.layers.Dense(20, activation=tf.nn.softmax)
])


categoryModel.compile(optimizer = 'adam', loss = 'sparse_categorical_crossentropy', metrics=['accuracy'])



categoryModel.save('models/base/categoryModel.h5')

