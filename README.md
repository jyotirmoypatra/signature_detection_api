# Signature Detection README

This README provides instructions on how to run `signature_detect.php` and generate JSON data containing a base64 image and a unique number for signature verification.

## Requirements

- PHP installed on your system
- Web server environment (e.g., Apache, Nginx) for running PHP scripts
- Basic understanding of PHP and web server configurations
- Python installed on your system (for executing `run.py`)

## Files Included

- `signature_detect.php`: PHP script for signature detection.
- `keras_model.h5`: Pre-trained Keras model for signature detection.
- `run.py`: Python script for additional processing (if needed).

## Instructions

1. **Download the Files**: Obtain the necessary files including `signature_detect.php`, `keras_model.h5`, and `run.py`.

2. **Setup Web Server**: Ensure your web server environment is set up and running. Place all the files (`signature_detect.php`, `keras_model.h5`, and `run.py`) in the appropriate directory accessible by your server.

3. **Run the Script**:To run the script and generate the JSON data, follow these steps:

    call the api-> Use a tool or write a script to call the `signature_detect.php` API endpoint. Send the POST request with the data in raw JSON format.

   {
       "sign": "<base64_image_data>",
       "uniquenumber": "<unique_text>"
   }
