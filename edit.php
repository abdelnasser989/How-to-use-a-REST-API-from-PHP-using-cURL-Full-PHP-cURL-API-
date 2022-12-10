<?php

$full_name = $_GET["full_name"];


 
$headers = [

    "User-Agent: Example REST API Client",
    "Authorization: token ???"
 ];
 

 $ch = curl_init("https://api.github.com/repos/$full_name");


 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $response =  curl_exec($ch);

 curl_close($ch);

 $data = json_decode($response, true);

?>

 <!DOCTYPE html>
 <html>
    <head>
        <meta Charset='UTF-8'>
        <title>Repostry</title>
           <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.classless.min.css">

    </head>
          <body>
              <main>

                <h1>Edit Repostry</h1>
                  
                  <form method='post' action='update.php'>
                  <input type="hidden"  name="full_name" value="<?php echo $data["full_name"] ?>">
                  <label for='name'>Name</label>
                  <input type='text' name='name' id='name' value="<?php echo $data["name"] ?>">
    
                   <label for='description'>Description</label>
                   <textarea name='description' id='description'>
                   <?php echo $data["description"]?>
                   </textarea>

                   <button>Submit</button>
                   </form>

          
             </main>
             </body>
             </html>