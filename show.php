<?php

$full_name = $_GET["full_name"];


 
$headers = [

    "User-Agent: Example REST API Client",
    "Authorization: token ?????????"
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

                <h1>Repostry</h1>

                  <dl>
                     <dt>Name</dt>
                     <dd><?php echo $data["name"] ?></dd>
                     <dt>Description</dt>
                     <dd><?php echo $data["description"]?></dd>
                  </dl>


                  <a href="edit.php?full_name=<?php echo $data["full_name"]?>">Edit</a>

                     <form method="post" action="delete.php">

                     <input type="hidden"  name="full_name" value="<?php echo $data["full_name"]?>" >
                     <button>Delete</button>
                     </form> 
             </main>
             </body>
             </html>