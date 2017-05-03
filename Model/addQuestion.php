<?php

   //Add a question to the question bank

   $difficulty = (int)$_POST['difficulty']; //(int)$_POST['diff'];
   $category = $_POST['category']; //$_POST['cat'];
   $question = $_POST['question'];  //$_POST['quest'];
   //$returnType = $_POST['returnType'];
   //$methodName = $_POST['methodName'];
   //$argumentName = $_POST['argName'];
   //$argumentType = $_POST['argType'];
   //$testCase = $_POST['testCase'];
   //$testAnswer = $_POST['tcAns'];
   //$prof = "eddie"; //$_POST['prof'];
  
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   $query = "INSERT INTO  z_questions (difficulty)
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
