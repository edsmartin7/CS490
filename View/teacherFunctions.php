<?php
   //send question
   function createQuestion(){
   $category=$_POST['category'];
   $difficulty=$_POST['difficulty'];
   $question=$_POST['question'];

   $jsonData = array('category'=>$category, 'difficulty'=>$difficulty,
   'question'=>$question);
   $url="http://web.njit.edu/~em244/CS490/Controller/login.php";
   $ch = curl_init($url);
   //$jsonDataEncoded = json_encode($jsonData);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $result = curl_exec($ch);
   curl_close($ch);

   }

   //create exam (send number of questions in exam)
   function createExam(){
       

   }

?>
