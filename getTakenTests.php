<?php

   //Returns all of a Student's taken tests

   $studentName = $_POST['studentName'];
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT exam FROM graded_student_exams
             WHERE student='$studentName'"; //parens?
      
   $result = $db->query($query); 
   
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }
   
   if($all){
      echo json_encode($all);
   }else{
      echo "NOT ABLE TO FIND ANY TAKEN TESTS FOR THIS STUDENT\n";
   }
   
?>
