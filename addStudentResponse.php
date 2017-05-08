<?php

   //Get a student's response

   $student = $_POST['student'];
   $exam = $_POST['exam'];
   $response = $_POST['answers'];
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
  
   $query = "INSERT INTO  student_response (student, exam, response)
             VALUES ('$student', '$exam', '$response')";
   $result = $db->query($query); 

   if($result){
      echo "STUDENT ANSWER ADDED \n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE STUDENT'S POINTS\n";
   }
   
?>
