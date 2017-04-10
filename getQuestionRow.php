<?php

   //Give middle/controller all a single question's information for grading

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);

   $question = $_POST['question'];
   $query = "SELECT * FROM testquestions
             WHERE question='$question'";
   $result = $db->query($query); 
   $row = $result->fetch_assoc();
  
   $tests = "SELECT testcase, testanswer
             FROM testcases
	     WHERE question='$question'";

   $testresult = $db->query($tests);
   $testrow = $testresult->fetch_assoc();

   $row['tests'] = $testrow;

   if($row){
      echo json_encode($row);
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }
   
?>
