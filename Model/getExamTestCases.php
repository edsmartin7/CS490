<?php

   //return all unique tests
   $questions = $_POST;
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   
   foreach($questions as $question){
         
      $query = "SELECT testcase, testanswer
                FROM testcases
	        WHERE question='$question'";
      
      $result = $db->query($query);
      //$row = $result->fetch_assoc();
   
      while($row = $result->fetch_assoc()){
         foreach($row as $key=>$value){
            if(!isset($all[$key])) $all[$key] = array();
	       $all[$key][] = $value;
         }
      }
   }
   echo "<br> DATABASE <br>";
   print_r($all);
   /*
   if($all){
      //echo json_encode($all['examName']);
      echo "\n";
   }else{
      //echo "NOT ABLE TO RETURN ALL THE EXAMS\n";
   }
   */
?>
