<?php

   $prof = $_POST['prof'];

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "DELETE FROM testquestions 
             WHERE prof='$prof'";
      
   $result = $db->query($query); 

   if($result){ ///if($row){
      echo "QUESTION DELETED";
   }else{
      echo "ERROR IN QUERY";
   }
   
?>
