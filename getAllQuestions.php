<?php

   //Returns all questions to Teacher's view to add to create a new exam

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM testquestions";
      
   $result = $db->query($query); 
  
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }

   if($all){
      echo json_encode($all['question']);
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }

?>
