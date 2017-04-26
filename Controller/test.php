<?php

   function printer(){
      echo "HELLO WORLD\n";
      $points = 0;
      return $points;
   }

   if(printer() != 0){
      echo "DONE\n";
   }else{
      echo "NOPE\n";
   }

?>

