<?php

//Add a question to the database

   $difficulty = $_POST['difficulty'];
   $question = $_POST['question'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  questions (difficulty, question)
             VALUES ('$difficulty', '$question')";
      
   $result = $db->query($query); 
   //$row = $result->fetch_assoc();
   
   if($result){ ///if($row){
      echo "QUESTION ADDED";
   }else{
      echo "ERROR IN QUERY";
   }

?>
