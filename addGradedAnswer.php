<?php

   //unused

   $student = $_POST['studentName'];
   $exam = $_POST['testName'];
   $question = $_POST['question'];
   $response = $_POST['response'];
   $questiongrade = (int)$_POST['questiongrade'];
   $errors = $_POST['errors'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  student_response (student, exam_name, question,
   response, question_grade, errors)
             VALUES ('$student', '$exam', '$question', '$response',
	     $questiongrade', '$errors')";
      
   $result = $db->query($query); 

   if($result){
      echo "GRADE ADDED";
   }else{
      echo "ERROR IN QUESTION GRADE SUBMIT QUERY";
   }
   
?>
