<?php

   //Filter questions

   $category = $_GET['category'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   if($category == "all"){
      $query = "SELECT * FROM testquestions";
   }else{
      $query = "SELECT * FROM testquestions
                WHERE category='$category'";
   }
   $result = $db->query($query); 
  
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }
   
   if($all){
      echo json_encode($all['question']); //
      echo "\n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }
    
?>
