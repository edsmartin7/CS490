<?php

   error_reporting(E_ALL);

   $backURL = "https://web.njit.edu/~em244/CS490/Model/login.php";
   $username = $_POST['username'];
   $password = $_POST['password'];

   $ch2 = curl_init($backURL);
   curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch2, CURLOPT_POST, true);
   curl_setopt($ch2, CURLOPT_POSTFIELDS, $_POST);
   $result = curl_exec($ch2);
   curl_close($ch2);
   echo $result;

?>

