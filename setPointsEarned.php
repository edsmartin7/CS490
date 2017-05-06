<?php

   //Get a student's points info

   $student = $_POST['student'];
   $exam = $_POST['exam'];
   $points = $_POST['points'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
  
   $query = "INSERT INTO  points_earned (student, exam, points)
             VALUES ('$student', '$exam', '$points'";
   $result = $db->query($query); 
   
   if($result){
      echo "POINTS ADDED \n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE STUDENT'S POINTS\n";
   }
   
?>
