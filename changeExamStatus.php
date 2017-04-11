<?php

   //Change exam status to taken/viewable

   $studentName = $_POST['studentName'];
   $examName = $_POST['examName'];
   //$studentName = 'oscar';
   //$examName = 'Test01';
   //$flag=1;
   //if taken

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "UPDATE taken_tests
             SET taken=1
             WHERE (examName='$examName' AND student='$studentName')"; 
      
   $result = $db->query($query); 
   if($result){
      echo "EXAM WAS UPDATED";
      echo "\n";
   }else{
      echo "NOT ABLE TO FIND ANY TAKEN TESTS FOR THIS STUDENT\n";
   }

?>
