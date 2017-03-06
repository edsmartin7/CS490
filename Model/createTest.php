<?php

   $numberOfQuestions = $_Post['numberOfQuestions']
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM questions
             ORDER BY rand() limit 5";
      
   $result = $db->query($query); 
   //$row = $result->fetch_assoc();
   
   while($row  = $result->fetch_assoc()){
      $json[] = $row;
   }
   //echo json_encode($json);
   if($row){
      echo "TEST CREATED";
   }else{
      echo "NOT SUFFICIENT QUESTIONS IN DATABASE";
   }

?>
