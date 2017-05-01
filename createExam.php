<?php

   //Creates an exam
   //Add questions for with the key, exam, to a database

   $examName = $_POST['examName'];
   $questions = $_POST['questions'];
   $points = $_POST['points'];
   //$prof = $_POST['prof'] ;  
  
   $questionArray = array_map('trim', explode("|", $questions));
   $pointsArray = array_map('trim', explode(",", $points));

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);

   for($x=0; $x<count($questionArray); $x++){
      $addexam = "INSERT INTO exams (examName, question, points)
                    VALUES ('$examName', '$questionArray[$x]', '$pointsArray[$x]' )";
      $examadded = $db->query($addexam);
   }
   

   if($examadded)
      $message = "EXAM INSERTED\n";
   else
      $message = "FAILED TO STORE EXAM\n";

   echo "<script type='text'javascript'>alert('$message');</script>";
   
?>
