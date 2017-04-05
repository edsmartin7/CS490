<?php

   //redirect to test page
   $selectedExam = $_POST['selectedExam'];
  
   if($selectedExam){ 
      header("Location: https://web.njit.edu/~em244/CS490/View/testPage.php?exam=$selectedExam");
      exit;
   }else{
      echo "Unable to Load test";
   }



   
   

?>


