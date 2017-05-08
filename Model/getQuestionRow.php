<?php

   //Give middle/controller all a single question's information for grading
   $question = $_POST['question'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
  
   $query = "SELECT * FROM z_testquestions
             WHERE question='$question'";
   $result = $db->query($query); 
   $row = $result->fetch_assoc();
  
   $tests = "SELECT testcase, testanswer
             FROM z_testcases
	     WHERE question='$question'";
   $testresult = $db->query($tests);

   $row['tests'] = array();
   $x=0;
   while($testrow = $testresult->fetch_assoc()){
      $row['tests'][$x] = $testrow;
      $x++;
   }

   if($row){
      echo json_encode($row);
   }else{
      echo "NOT ABLE TO RETURN ALL THE QUESTIONS\n";
   }
   
?>
