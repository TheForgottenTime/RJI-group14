import requests
import shutil
from PIL import Image
from io import BytesIO

#this file was made to test out the implementation of the image downloading service

url = 'http://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'

response = requests.get(url, stream = True)


print(response.raw)

i = Image.open(BytesIO(response.content))

i.show()