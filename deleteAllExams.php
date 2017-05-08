<?php

   //Not for final
   //Functional:  Delete an exam (tables) from the database

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);

   $query = "DELETE FROM exams";
   $result = $db->query($query); 

   $queryTwo = "DELETE FROM graded_student_exams";
   $resultTwo = $db->query($queryTwo);

   $queryThree = "DELETE FROM taken_tests";
   $resultThree = $db->query($queryThree);

   $queryFour = "DELETE FROM points_earned";
   $resultFour = $db->query($queryFour);

   if($result){
      echo "EXAM DELETED \n";
   }else{
      echo "ERROR IN QUERY \n";
   }
   
?>
