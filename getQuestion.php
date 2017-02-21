<?php

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM questions";
      
   $result = $db->query($query); 
   $row = $result->fetch_assoc();
   
   if($row){
      echo "TEST CREATED";
   }else{
      echo "NOT SUFFICIENT QUESTIONS IN DATABASE";
   }

?>
