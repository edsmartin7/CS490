<?php

   //Creates an exam
   //Add questions for with the key, exam, to a database

   $examName = $_POST['examName'];
   $questions = $_POST['questions'];
   $points = $_POST['points'];
   
   
   print_r($questions);
   print_r($points);

   $compile = fopen("Answer.java", "w");
   fwrite($compile, $);
   fwrite($compile, $answer);

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);

   /*
   for($x=1; $x<count($_POST); $x++){
      //only have to store the question id's then pull from question db table 
      $insertion = "INSERT INTO exams (examName, question)
                    VALUES ('$_POST[0]', '$_POST[$x]')";
      $created = $db->query($insertion);
   }
   */
   /* 
   foreach($questions as $question){
      $insertion = "INSERT INTO exams (examName, question)
                    VALUES ('$examName', '$question')";
      $created = $db->query($insertion);
   }

   for($x=0; $x<count($_POST['questions']); $x++){
      $addpoints = "INSERT INTO examquestionchild (examName, question, points)
                    VALUES ('$examName', '$questions[$x]', '$points[$x]' )";
      $addresult = $db->query($addpoints);
   }
   */

   if($created)
      $message = "EXAM INSERTED\n";
   else
      $message = "FAILED TO STORE EXAM\n";

   echo "<script type='text'javascript'>alert('$message');</script>";
   
?>
