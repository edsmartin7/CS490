<?php

   //Get a student's points info

   $student = $_POST['student'];
   $exam =  $_POST['exam'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
  
   $query = "SELECT * FROM student_response
             WHERE student='$student'
	     AND exam='$exam'";

   $result = $db->query($query); 
  
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key]))
            $all[$key] = array();
         $all[$key][] = $value;
      }
   }
   
   if($all){
      echo json_encode($all['response']);
   }else{
      echo "NOT ABLE TO RETURN ALL THE STUDENT'S POINTS\n";
   }
   
?>
