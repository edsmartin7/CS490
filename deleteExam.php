<?php

   //Delete an exam from the database

   $examName = $_POST['exam'];
  
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "DELETE FROM exams
             WHERE examName='$examName'";
      
   $result = $db->query($query); 
   
   if($result){
      echo "EXAM DELETED \n";
   }else{
      echo "ERROR IN QUERY \n";
   }
   
?>
