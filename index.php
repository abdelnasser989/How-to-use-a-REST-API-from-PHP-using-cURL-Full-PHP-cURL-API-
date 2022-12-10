<?php

//  $ch = require 'init_curl.php';  //// in cause we use require curl insted of lot off codes  //////

    

 $headers = [

    "User-Agent: Example REST API Client",
    "Authorization: token ????????"
 ];
 

 $ch = curl_init("https://api.github.com/user/repos");
//  $ch = curl_init();      /////// في حاله استخدام الرابط في curl_url //////


 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//  curl_setopt($ch,  CURLOPT_URL, "https://api.github.com/user/repos");

 $response =  curl_exec($ch);

 curl_close($ch);

 $data = json_decode($response, true);

//   foreach($data as $repositry){

//     echo $repositry['full_name'], " ",
//          $repositry['name'], " ",
//          $repositry['description'], "<br>";

//   }

//     github api password   ?????????

    ?>

    <!DOCTYPE html>

    <html> 
     <head>
        <meta Charset='UTF-8'>
        <title>
            Example REST API Client
        </title>
        <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">

     </head>
     <body> 
        <main>

     <h1>Repostrive</h1>
     <table>
        <thead>
            <tr>
                <th>name</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $repositry) { ?>
            <tr>
                <td>
                <a href="show.php?full_name=<?php echo $repositry["full_name"]; 
                ?>">
                <?php echo $repositry['name']; ?>
                </a>
                </td>
                
                <td><?php echo (htmlspecialchars($repositry['description']))?></td>
            </tr>

            <?php  } ?>
        </tbody>
            </main>
        
     </table>


     <a href='new.php'>Create Repostry</a>


     </body>   
    </html>
