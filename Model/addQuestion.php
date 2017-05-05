<?php

   //Add a question to the question bank

   $difficulty = (int)$_POST['difficulty']; 
   $category = $_POST['category']; 
   $question = $_POST['question'];  
  
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   $query = "INSERT INTO  z_questions (difficulty, category, question)
             VALUES ('$difficulty', '$category', '$question')";
      
   $result = $db->query($query); 
   
   for($x=0; $x<count($_POST['testCase']); $x++){
      $testCase = $_POST['testCase'][$x];
      $testAnswer = $_POST['testAnswer'][$x];
      $tests = "INSERT INTO z_testcases (question, testcase, testanswer)
                VALUES ('$question', '$testCase', '$testAnswer')";
      $testresults = $db->query($tests);
   }

   if($result){ 
      echo 1;  //"QUESTION ADDED";
   }else{
      echo 0;  //"ERROR IN QUERY";
   }
   
?>
