<?php
   session_start();   
?>

<?php
 
   //WORKS
   //print_r($_POST['answers']);
   $QandA = array($_POST['answers']);
   print_r($QandA[0]);
   echo "<br>";
   foreach(array_keys($QandA[0]) as $value){ //reset($QandA[0]) for values
      echo "$value <br>";
   }
   $size = count(array_keys($QandA[0]));
  
   //Get test question
   //create array of questions and send
   $jsonData = array();
   $x=0;

   $_SESSION = 'EDDIE';
 
   $jsonData['test'] = $_SESSION;
   foreach(array_keys($QandA[0]) as $value){
      $jsonData['answers'][$x] = $value;
      $x++;
   }
   print_r($jsonData);
   echo "<br>";
   
   
   //$string = http_build_query($jsonData);
   $url = "https://web.njit.edu/~em244/CS490/Model/getExamTestCases.php";
   $ch = curl_init($url);
   //$jsonDataEncoded = json_encode($jsonData);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $testcases = curl_exec($ch);
   curl_close($ch);
   
   echo $testcases;
   //for($questions in $QandA){
   //}
   
?>
