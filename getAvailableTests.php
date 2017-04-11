<?php

   //Display all the tests a student can take

   $student = $_POST['studentName'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT DISTINCT (examName)
             FROM taken_tests
	     WHERE student='$student' AND taken=1";
      
   $result = $db->query($query); 
  
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }

   if($all){
      echo json_encode($all);
      echo "\n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE EXAMS\n";
   }

?>
