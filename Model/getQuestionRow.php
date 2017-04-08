<?php

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);

   //Get a list of questions/id's
   //$exam = $_POST[''];
   $exam = "testhello";
   $questionList = "SELECT question FROM exams
             WHERE examName='$exam'";

   $result = $db->query($questionList);
   $all = array();
   while($row = $result->fetch_assoc()){
      foreach($row as $value){
	 array_push($all, $value);
      }
   }
   //print_r($all);

   //Get all info for selected test questions
   $x=0;
   $questioninfo = array();
   foreach($all as $question){
      $query = "SELECT * FROM testquestions
                WHERE prof='profx'"; //WHERE question='$question'";
      $result = $db->query($query); 
      $row = $result->fetch_assoc();
      
      $questioninfo[$x] = $row;
      $x++;
   }
   //print_r($questioninfo);

   
   if($questioninfo){
      echo json_encode($questioninfo);
      echo "\n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }
   
?>
