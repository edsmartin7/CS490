<?php

   echo "DATABASE RESPONSE";
   print_r($_POST);
   foreach($_POST['studentAnsInput'] as $value){
      echo "$value <br>";
   }
   /*
   print_r($_POST);
   $results = ($_POST);


   if($results){
      echo "I got yo shit oscar <br>";
      echo $results;
   }else{
      echo "There was an error in getting the info \n";
   }
   */
?>
