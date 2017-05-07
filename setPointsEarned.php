<?php

   //Get a student's points info

   //$student = $_POST['student'];
   //$exam = $_POST['exam'];
   //$points = $_POST['points'];

   //$question = $_POST['question'];
  
   //echo "BACKEND \n";
   $note = print_r($_POST);
   $compile = fopen("AAAAAA.txt", "w");
   fwrite($compile, $note);
   /*
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
  
   $query = "INSERT INTO  points_earned (student, exam, points)
             VALUES ('$student', '$exam', '$points'";
   $result = $db->query($query); 

   $query = "INSERT INTO student_response (student, exam_name, points)
             VALUES ('$student', '$exam', '$points', ";

   if($result){
      echo "POINTS ADDED \n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE STUDENT'S POINTS\n";
   }
   */
?>
