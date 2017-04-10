<?php

   //Creates an exam
   //Add questions for with the key, exam, to a database

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
						
   for($x=1; $x<count($_POST); $x++){
      //only have to store the question id's then pull from question db table 
      $insertion = "INSERT INTO exams (examName, question)
                    VALUES ('$_POST[0]', '$_POST[$x]')";
      $created = $db->query($insertion);
   }

   if($created)
      $message = "EXAM INSERTED\n";
   else
      $message = "FAILED TO STORE EXAM\n";

   echo "<script type='text'javascript'>alert('$message');</script>";
   
?>
