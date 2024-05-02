<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json;');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

$login = json_decode(file_get_contents("php://input"), true);



    $data = $login['sign'];
    $uniquenumber = $login['uniquenumber'];

 $signatureBase64String = str_replace("\n", "", $data);
if ($signatureBase64String != '') {
        // Remove any characters that are not part of the base64 set
    // echo $signatureBase64String;
    
    $filename = $uniquenumber . '.txt';
    $file = fopen($filename, 'w');

    if ($file) {
        // Write the string to the file
        fwrite($file, $signatureBase64String);

        // Close the file
        fclose($file);

        
    } else{

    }
  
 
    $acc = json_encode(['uniquenumber' => $uniquenumber],true);

  
    $output = shell_exec("python3 t3.py '$acc'  2>&1");
    if ($output === null) {
      
        echo json_encode(['status' => 'error', 'msessage' => 'Error! It appears that no signature is detected in this image. Are you sure you want to continue with this image?']);
    } else {
       
      // echo "Python script output: " . $output;
       

        //Process the output and extract the JSON result
        preg_match('/\{.*\}/s', $output, $matches);
        $jsonResult = $matches[0] ?? null;

        if ($jsonResult !== null) {
            // JSON result was successfully extracted
            echo $jsonResult;
        } else {
            // Handle the case where the JSON result couldn't be extracted
            echo json_encode(['status' => 'error', 'message' => 'Error! It appears that no signature is detected in this image. Are you sure you want to continue with this image?']);
        }
        }

} 
?>