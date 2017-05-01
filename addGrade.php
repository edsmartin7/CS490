<?php

   //Add a grade
   //Table contains student's id, title of exam, the exam grade, and all errors (as a string)

   $student = $_POST['studentName'];
   $exam = $_POST['testName'];
   $grade = (int)$_POST['grade'];
   $grievances = addslashes($_POST['grievance']);

   //Add grade
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  graded_student_exams (student, exam, grade, grievances)
             VALUES ('$student', '$exam', '$grade', '$grievances')";
      
   $result = $db->query($query); 

   //Student test submitted but not seen until logging out
   $sendToTaken = "INSERT INTO taken_tests (examName, student)
                   VALUES ('$exam', '$student')";
   $sent = $db->query($sendToTaken);

   if($result){
      echo "GRADE ADDED";
   }else{
      echo "ERROR IN GRADE SUBMIT QUERY";
   }
   
?>
