
<?php

   //Filtering
   //for the left side of screen when creating exam
   //adding questions to create exam
   //coped from sendTest.php


   function sendQuestions(){
     /* 
      print_r($_POST);
      echo "<br><br>";
      echo $_POST['examName'];
      echo "<br><br>";
      foreach($_POST['questionList'] as $value){
         echo $value;
         echo "<br>";
      }
      */

      $jsonData[0] = $_POST['examName'];
      $x = 1;
      foreach($_POST['questionList'] as $value){
         $jsonData[$x] = $value;
	 $x++;
      } 

      $url = "https://web.njit.edu/~em244/CS490/Model/createExam.php";
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);

      echo $response;
      /*
      if($response){
         header("https://web.njit.edu/~em244/CS490/View/teacherMain.php");
	 exit;
      }else{
         echo "There was an error <br>";
	 echo $response;
      }
      */

   }
   sendQuestions();
   
?>
