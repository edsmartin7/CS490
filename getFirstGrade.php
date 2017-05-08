<?php

   //Returns all the Students taken tests
   $studentName = $_POST['studentName'];
   $exam = $_POST['exam'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM graded_student_exams
             WHERE student='$studentName'
	     AND exam='$exam'"; 
      
   $result = $db->query($query); 
   $all = $result->fetch_assoc();

   if($all){
      echo json_encode($all);
      echo "\n";
   }else{
      echo "UNABLE TO RETURN FIRST ROW\n";
   }
   
?>
