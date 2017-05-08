<?php

   //Creates an exam

   $exam = $_POST['examName'];
   $questionArray = $_POST['submitList'];
   $pointsArray = $_POST['pointsAssigned'];
  
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   
   for($x=0; $x<count($questionArray); $x++){
      $insertion = "INSERT INTO z_exams (exam, question, points)
                    VALUES ('$exam', '$questionArray[$x]', '$pointsArray[$x]')";
      $created = $db->query($insertion);   
   }
   
   if($created)
      echo 1;
   else
      echo 0;
    
?>
