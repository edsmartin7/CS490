<?php

   //Returns each question's points for a given test

   $exam = $_POST['exam'];
   //$exam = "Real";

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT (points) FROM exams
             WHERE examName='$exam'"; 
      
   $result = $db->query($query); 
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) 
	    $all[$key] = array();
	 $all[$key][] = $value;
      }
   }

   if($all){
      echo json_encode($all['points']);
      echo "\n";
   }else{
      echo "UNABLE TO RETURN FIND GRADED EXAM \n";
   }
   
?>
