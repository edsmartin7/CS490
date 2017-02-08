
<?php

   $data = array("name"=>"eddie", "age"=>"31");
   $string = http_build_query($data);
 
   $ch = curl_init("https://web.njit.edu/~em244/CS490/");
   curl_setopt($ch, CURLOPT_POST, true); //using post
   curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //$response = curl_exec($ch);
   curl_exec($ch);
   curl_close($ch);

   /*
   //second .php page getting the info
   if(isset($_POST['name'],$_POST['age'])){
      $cb = new Mysqli('localhost', 'root', 'pw', 'dbname');
      $name = $db->real_escape_string($__POST['name']);
      $age = (int)$_POST['age'];
      $query = "INSERT INTO data SET mydata='$name, $age'";
      $db->query($query); //insert data into database
   }
   */


?>
