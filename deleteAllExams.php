<?php

   //Not for final
   //Functional:  Delete an exam (tables) from the database

   //$examName = $_POST['exam'];
   $examName = 'Real';

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "DELETE FROM exams
             WHERE examName='$examName'";
   $result = $db->query($query); 

   $queryTwo = "DELETE FROM graded_student_exams
                WHERE exam='$examName'";
   $resultTwo = $db->query($queryTwo);

   $queryThree = "DELETE FROM taken_tests
                  WHERE examName='$examName'";
   $resultThree = $db->query($queryThree);

   if($result){
      echo "EXAM DELETED \n";
   }else{
      echo "ERROR IN QUERY \n";
   }
   
?>
