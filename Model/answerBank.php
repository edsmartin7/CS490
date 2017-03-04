<?php

   //Save one studne'ts answers answers after taking test
   //clear table after returning results

   $questionID
   $answer

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "INSERT INTO  answers (questionID, answer)
             VALUES ('$questionID', '$answer')";
      
   $result = $db->query($query); 
   

?>
