<?php

   $difficulty = $_POST['difficulty'];
   $question = $_POST['password'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  questions (difficulty, question)
             VALUES ('$difficulty', '$question')";
      
   $result = $db->query($query); 
   $row = $result->fetch_assoc();
   
   if($row){
      echo "TEST CREATED";
   }else{
      echo "NOT SUFFICIENT QUESTIONS IN DATABASE";
   }

?>
