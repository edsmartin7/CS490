<?php

   error_reporting(E_ALL);

   $frontURL = "https://web.njit.edu/~em244/Temp/View/";
   $backURL = "https://web.njit.edu/~em244/Temp/Model/";
   $url = "https://cp4.njit.edu/cp/home/login/";
   $ucid = $_POST['username'];
   $pass = $_POST['password'];
   $njicheck = false;
   $mpcheck = false;

   $rlpost="pass=".$pass."&user=".$user."&uuid=0xACA021";

   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_COOKIESESSION, true);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $rlpost);
   curl_exec($ch);

   $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);

   echo "<br>HTTP CODE: ";
   echo $httpcode;
   if($httpcode == 302){
      echo '<br>Valid NJIT UCID';
      $njcheck = true;
   }else{
      echo '<br>Invalid NJIT UCID';
   }

   $ch2 = curl_init($backURL);
   curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch2, CURLOPT_POST, true);
   curl_setopt($ch2, CURLOPT_POSTFIELDS, $_POST); //?
   $result = curl_exec($ch2);
   curl_close($ch2);
   echo $result;

   $mlst = array(
      'njcheck' => $njcheck,
      'mpcheck' => $mpcheck,
   );

   /*
   //change don't use json here
   $jsonData = array(
         'username' => $ucid, 
	 'password' => $pass);
   $string = http_build_query($jsonData);

   $url1 = "https://web.njit.edu/~em244/Temp/Model/";
   //$url2 = "https://sekur.njit.edu/info/kas.ex.php";
   //$url2 = "www.njit.edu/cp/login.php/";

   function sendPostRequest($url, $string){
      $ch = curl_init($url);
      //$jsonDataEncoded = json_encode($jsonData);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch); 
      curl_close($ch);
      //echo "Indisde the REQUEST \n";
      echo $result;
   }
   sendPostRequest($url1, $string);
   //sendPostRequest($url2, $string);
   */


?>

