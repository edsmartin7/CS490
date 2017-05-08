<?php

   function sendQuestions(){
  
      $jsonData = http_build_query($_POST);
      $url = "https://web.njit.edu/~em244/CS490/Model/createExam.php";
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);
            
      if($response==1){
         header("Location:  https://web.njit.edu/~em244/CS490/View/teacherMain.php");
	 exit;
      }else{
         $message = "There was an error <br>";
	 echo "<script type='text'javascript'>alert('$message');</script>";
     }
   }

   sendQuestions();
   
?>
