<?php

   $exam = $_POST['exam'];
   

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM exams
             WHERE examName = '$exam'";
      
   $result = $db->query($query); 
   //$row = $result->fetch_assoc(); 
   
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }
   
 
   //print_r($all['question']);

   if($all){
      echo json_encode($all['question']);
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }

?>
