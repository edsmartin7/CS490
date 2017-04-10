<?php

   //Add a question to the question bank

   $difficulty = (int)$_POST['diff'];
   $category = $_POST['cat'];
   $question = $_POST['quest'];
   $returnType = $_POST['returnType'];
   $methodName = $_POST['methodName'];
   $argumentName = $_POST['argName'];
   $argumentType = $_POST['argType'];
   $testCase = $_POST['testCase'];
   $testAnswer = $_POST['tcAns'];
   $prof = $_POST['prof'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  testquestions (difficulty, category, question,
   returnType, methodName, argName, argType, prof)
             VALUES ('$difficulty', '$category', '$question', '$returnType', '$methodName',
	     '$argumentName', '$argumentType', '$prof')";
      
   $result = $db->query($query); 
   
   $tests = "INSERT INTO testcases (question, testcase, testanswer)
             VALUES ('$question', '$testCase', '$testAnswer')";
   $testresults = $db->query($tests);
   
   if($result){ 
      echo "QUESTION ADDED";
   }else{
      echo "ERROR IN QUERY";
   }
   
?>
