<?php

   //return all unique tests
   $questions = $_POST;
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   $all = array();
   foreach($questions as $question){
         
      $query = "SELECT testcase, testanswer
                FROM testcases
	        WHERE question='$question'";
      
      $result = $db->query($query);
      $row = $result->fetch_assoc();
      $all[$question] = $row;
     
   }

   echo "<br> DATABASE <br>";
   print_r($all);
   /*
   if($all){
      echo json_encode($all);
      echo "\n";
   }else{
      echo "NOT ABLE TO RETURN SELECTED EXAM TEST CASES \n";
   }
   */
?>
