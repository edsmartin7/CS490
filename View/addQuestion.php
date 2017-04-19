<?php

   //Send a Question to the Database

   //include 'teacherFunctions.php';
   
   $category = $_POST['category'];
   $difficulty = $_POST['difficulty'];
   $question = $_POST['question'];
   $testCase = $_POST['testCase'];
   $testAnswer = $_POST['testAnswer'];
  
   if(isset($_POST['category'], $_POST['difficulty'])){
      $jsonData = array('category'=>$category, 'difficulty'=>$difficulty,
         'question'=>$question, 'testCase'=>$testCase, 'testAnswer'=>$testAnswer);
  
      $url="https://web.njit.edu/~em244/CS490/Model/addQuestion.php";
      $ch = curl_init($url);
      $jsonData = http_build_query($jsonData);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); //
      $result = curl_exec($ch);
      curl_close($ch); 
      //echo $result; 

      if($result == 1)
         header("Location:  https://web.njit.edu/~em244/CS490/View/teacherMain.php");
      else
         echo "<br> FAIL <br>";

   }
   
?>
