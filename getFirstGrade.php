<?php

   //Returns all the Students taken tests
   $studentName = $_POST['studentName'];
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM graded_student_exams
             WHERE student='$studentName'"; 
      
   $result = $db->query($query); 
   $all = $result->fetch_assoc();
   /* 
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }
   */

   if($all){
      echo json_encode($all);
      echo "\n";
   }else{
      echo "UNABLE TO RETURN FIRST ROW\n";
   }
   
?>
