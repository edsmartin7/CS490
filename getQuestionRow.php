<?php

   //Give middle/controller all a single question's information for grading

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);

   $question = $_POST['question'];
   //$question = "Write a java method to find the smallest number among three numbers."; 

   $query = "SELECT * FROM testquestions
             WHERE question='$question'";
   $result = $db->query($query); 
   $row = $result->fetch_assoc();
  
   $tests = "SELECT testcase, testanswer
             FROM testcases
	     WHERE question='$question'";

   $testresult = $db->query($tests);
   //$testrow = $testresult->fetch_assoc();
   $row['tests'] = array();
   $x=0;
   while($testrow = $testresult->fetch_assoc()){
      $row['tests'][$x] = $testrow;
      $x++;
   }

   //print_r($row['tests'][0]['testcase']);

   if($row){
      //echo "<pre>";
      echo json_encode($row);
      //echo "<pre>";
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }
   
?>
