<?php


$ch = require 'init_curl.php';  //// in cause we use require curl insted of lot off codes  //////

curl_setopt($ch,  CURLOPT_URL, "https://api.github.com/repos/{$_POST['full_name']}");

// THREE WAYS TO SEND REQUEST BY USING REQUSET METHOD ALONG WITH THE DATA FROM THE FORM ///////

// curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");  

 $response =  curl_exec($ch);



$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

curl_close($ch);

$data = json_decode($response, true);


// var_dump($data);



if($status_code !== 204) {

    echo "Unexpected status code: $status_code";

    var_dump($data);
    exit;
}

?>

 <?php require "header.html" ?>

<h1>Delete Repostry</h1>

<p>Repostry Deleted Successfully

<a href="index.php">index</a>


</p>


<?php require "footer.html" ?>

