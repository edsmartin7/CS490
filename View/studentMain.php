<?php

   error_reporting(E_ALL);

   $url = "http://web.njit.edu/~em244/Temp/Controller/control.php";
   //$jsonData = true; //if form submitted
   $ch= curl_init($url);
   curl_setopt($ch, CURLOPT_POST, true);
   //curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch);
   echo $result; 

?>

