<?php

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM questions";
      
   $result = $db->query($query); 
  
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }

   if($all){
      echo json_encode($all['question']);
      echo "\n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }

?>
