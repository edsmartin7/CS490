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

   //should be assoc arrays?
   $one = "1,2,3 | 4,5,6 | 7,8,9";
   $two = "12 | 34 | 56";
   $three = array('tests' => array("123", "456", "789"));
   $four = array('tests' => "1,2,3|4,5,6|7,8,9", 'answers'=>"987|654|321");
   //$splitTests = explode("|", $one);
   //$splitTests = array_map('trim', $splitTests);
   //print_r($splitTests);
   //foreach($three['tests'] as $value)
   //   echo "$value \n";
   foreach($four as $index) // => $test)
      echo $index;//$five[$test] = $four[$index];
   print_r($five);

   /*
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  testquestions (difficulty, category, question,
   returnType, methodName, argName, argType, prof)
             VALUES ('$difficulty', '$category', '$question', '$returnType', '$methodName',
	     '$argumentName', '$argumentType', '$prof')";
      
   $result = $db->query($query); 

      //for loop
      $tests = "INSERT INTO testcases (question, testcase, testanswer)
                VALUES ('$question', '$testCase', '$testAnswer')";
      $testresults = $db->query($tests);

   if($result){ 
      echo "QUESTION ADDED";
   }else{
      echo "ERROR IN QUERY";
   }
   */ 
?>
