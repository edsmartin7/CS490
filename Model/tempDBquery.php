<?php

 
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   /*
   $query = "SELECT * FROM logins 
             WHERE username='$username'
             AND password='$password'";
   */
   
   $query = "SELECT * FROM afslogin";
   $result = $db->query($query);
   $row = $result->fetch_assoc();
   echo $row;
   foreach($row as &$item){
      echo $item;
   }
   


?>

