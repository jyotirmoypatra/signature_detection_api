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

3. **Run the Script**: Access the `signature_detect.php` script through a web browser or command line using PHP. Follow the appropriate method based on your server setup.

   - Through Web Browser: Open your web browser and navigate to the URL where `signature_detect.php` is located. For example, if the script is in your local web server directory, you might access it at `http://localhost/signature_detect.php`.

   - Through Command Line: Navigate to the directory where `signature_detect.php` is located using the terminal or command prompt. Execute the script using the following command:
     ```
     php signature_detect.php
     ```

4. **Provide Inputs**: Follow the prompts or provide inputs as required by the script. You may need to provide the base64 image data and a unique text for signature verification.

5. **JSON Output**: The script will generate a JSON object containing the base64 image data and the unique number. The JSON structure will be as follows:

   ```json
   {
       "sign": "<base64_image_data>",
       "uniquenumber": "<unique_text>"
   }
