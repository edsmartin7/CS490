<?php

   $student = $_POST['studentName'];
   $exam = $_POST['testName'];
   $grade = (int)$_POST['grade'];
   $grievances = $_POST['grievance']; 

   print_r($_POST);

   /*
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  graded_student_exams (student, exam, grade, grievances)
             VALUES ('$student', '$exam', '$grade', '$grievances')";
      
   $result = $db->query($query); 
   //$row = $result->fetch_assoc();

   if($result){ ///if($row){
      echo "GRADE ADDED";
   }else{
      echo "ERROR IN GRADE SUBMIT QUERY";
   }
   */ 
?>
