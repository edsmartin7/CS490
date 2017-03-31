<?php

   //$examName = $_POST['examName'];
   $examName = "Bob";
   //$examLength = $_POST['examLength']
   $examLength = 5;

   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
   $query = "SELECT * FROM questions
             ORDER BY RAND() LIMIT '$examLength'";
      
   $result = $db->query($query); 
   //$row = $result->fetch_assoc();
   
   while($row = $result->fetch_assoc()){
      foreach($row as $key=>$value){
         if(!isset($all[$key])) $all[$key] = array();
	    $all[$key][] = $value;
      }
   }
  
   if($all){
      echo json_encode($all);
      echo "\n ";
   }else{
      echo "UNABLE TO CREATE EXAM\n";
   }

   //only have to store the question id's then pull from question db table 
   $insertion = "INSERT INTO exams (   ) //examID, questionID's, 
                 VALUES (   )";

   $created = $db->query($insertion);
   if($created)
      echo "EXAM INSERTED\n";
   else
      echo "FAILED TO STORE EXAM\n";

?>
