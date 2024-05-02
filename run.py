import sys
import base64
import tensorflow as tf
from tensorflow.keras.preprocessing import image
from PIL import Image
import numpy as np
import matplotlib.pyplot as plt
import io
import json
import os

# Load the Keras model
model = tf.keras.models.load_model('keras_model.h5')
data=sys.argv[1] #get image data as json


data_dict = json.loads(data)
base64string = data_dict['uniquenumber']

temp_file_path = f"{base64string}.txt"
with open(temp_file_path, "r") as file:
    data_received = file.read()

# Process the data as needed
#print("Received data:", data_received)

image_data = base64.b64decode(data_received)

# Convert binary data to an image using PIL
img = Image.open(io.BytesIO(image_data))
img = img.resize((224, 224))  # Resize to match the model's input size (adjust as needed)
img = img.convert('RGB')
img_array = image.img_to_array(img)
img_array = np.expand_dims(img_array, axis=0)  # Add batch dimension
img_array /= 255.0  # Normalize pixel values (adjust if your model expects different scaling)

# Make a prediction
prediction = model.predict(img_array)

# Define a threshold (e.g., 0.5) to decide the class
threshold = 0.5

# Check if the model predicts "sign" or "other" based on the threshold
if prediction[0, 0] >= threshold:
    predicted_class = "sign"
    msg = "Signature detected"
else:
    predicted_class = "other"
    msg = "It appears that no signature is detected in this image. Are you sure you want to continue with this image?"



result = {'status':'success','imagetype': predicted_class,'message': msg}
print(json.dumps(result))


if os.path.exists(temp_file_path):
    # Delete the file
    os.remove(temp_file_path)
    

