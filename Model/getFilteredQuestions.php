<?php

   //$category = $_POST['category'];
   //echo "<br> BACKEND <br>";
   //echo $_POST;
   //print_r($_POST);
   $category = $_GET['category']; 
   

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   if($category == "all"){
      $query = "SELECT * FROM questions";
   }else{
      $query = "SELECT * FROM questions
                WHERE category='$category'";
   }

   $result = $db->query($query); 
  
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }
   
   /*
   $send = array();
   $x=0;
   for($x=0; $x<count($all['question']); $x++){
      $send[$all['question'][$x]] = $all['category'][$x];
   }
   */
   
   if($all){
      echo json_encode($all['question']);
      //echo json_encode($send);
      //echo json_encode($all);
      //echo "\n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }
    
?>
