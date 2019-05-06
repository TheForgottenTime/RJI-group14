from PIL import Image
from io import BytesIO
import requests
import numpy



picHostUrl = 'http://rji.augurlabs.io'
size_output = (240,240)


def normalizepicture(filepath):
    image = webscraper(filepath)
    image = resizeImage(image)
    
    outputArray = numpy.array(image.getdata()).reshape(image.size[0], image.size[1], 3)
    grayscaleArray = numpy.zeros((240,240,1))
    for x in range(240):
        for y in range(240):
            grayscaleArray[x][y] = (outputArray[x][y][0]+outputArray[x][y][1]+outputArray[x][y][2])/3

    print(outputArray.shape)
    print(grayscaleArray.shape)
    outputArray = numpy.concatenate((outputArray, grayscaleArray), axis = 2)
    print(outputArray.shape)


    return outputArray



def webscraper(picturefilepath):

    url = picHostUrl+picturefilepath

    response = requests.get(url, stream = True)
    
    image = Image.open(BytesIO(response.content))
    return image

def resizeImage(image):
    outputImage = image.resize(size_output)
    #outputImage.show()
    return outputImage


#normalizepicture('/20170909_MuSc/1q/20170909_MizzouSouthCarolina_EC_454.JPG')