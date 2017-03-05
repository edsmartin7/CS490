<?php

   $difficulty = $_POST['difficulty'];
   $category = $_POST['category'];
   $question = $_POST['question'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  questions (difficulty, category, question)
             VALUES ('$difficulty', '$category', '$question')";
      
   $result = $db->query($query); 
   //$row = $result->fetch_assoc();
   
   if($result){ ///if($row){
      echo "QUESTION ADDED";
   }else{
      echo "ERROR IN QUERY";
   }

?>
