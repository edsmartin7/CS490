<?php

   $examName = $POST['exam'];
   $examName = 
   //$examName = 'JavaLavaTest';

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "DELETE FROM exams
             WHERE examName='$examName'";
      
   $result = $db->query($query); 

   if($result){ ///if($row){
      echo "EXAM DELETED";
   }else{
      echo "ERROR IN QUERY";
   }
   
?>
