<?php

    $ch = require 'init_curl.php';  //// in cause we use require curl insted of lot off codes  //////

    curl_setopt($ch,  CURLOPT_URL, "https://api.github.com/user/repos");



    // THREE WAYS TO SEND REQUEST BY USING REQUSET METHOD ALONG WITH THE DATA FROM THE FORM ///////


    // curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));      //////  BEST WAY TO SEND REQUEST BY USING POST METHOD /////
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  


     $status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    $response =  curl_exec($ch);

    curl_close($ch);

    $data = json_decode($response, true);


    // var_dump($data);

    
    if ($status_code === 422){

        echo 'invalid date';

        print_r($data["errors"]);
        exit;
    }

    // if($status_code ! == 201) {

    //     echo "Unexpected status code: $status_code";

    //     var_dump($data);
    //     exit;
    // }

?>

 <?php require "header.html" ?>

  <h1>New Repostry</h1>

  <p>Repostry Created Successfully

   <a href="show.php?full_name=<?php echo $data["full_name"] ?>">Show</a>

  </p>


  <?php require "footer.html" ?>