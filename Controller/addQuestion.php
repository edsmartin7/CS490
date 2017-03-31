<?php

   error_reporting(E_ALL);

   $frontURL = "https://web.njit.edu/~em244/CS490/View/teacherMain.php";
   $backURL = "https://web.njit.edu/~em244/CS490/Model/createQuestion.php";
   $category = $_POST['category'];
   $difficulty = $_POST['difficulty'];
   $question = $_POST['question'];

   $ch = curl_init($backURL);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
   $result = curl_exec($ch);
   curl_close($ch);
   echo $result;
  
?>

