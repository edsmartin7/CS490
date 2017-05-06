<?php


   echo "BACKEND \n";
   $note = print_r($_POST);

   $compile = fopen("Answer.java", "w");
   fwrite($compile, $note);


?>
