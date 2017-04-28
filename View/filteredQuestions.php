<?php

   //results filtered by category (str)
   //$category = $_GET['category'];
   $category = $_GET['q'];
   
   //GET request
   $url="https://web.njit.edu/~em244/CS490/Model/getFilteredQuestions.php?category=$category";
   $ch = curl_init($url);
   //curl_setopt($ch, CURLOPT_POST, true);
   //curl_setopt($ch, CURLOPT_POSTFIELDS, $category);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);
   /*
   echo "<form method='post' action='teacherMain.php'>";
      foreach (json_decode($response) as $question ){
         echo "<input type='checkbox' name='questionList[]'
            value='$question'> $question <br>";
      }
   //echo "<br>
   //<input type='submit' value='Add Filtered to Exam'> 
   //</form>";
   echo "<br>
   <button onClick='addTestQuestions()'>Don't press this</button>
   </form>";
   */
   foreach(json_decode($response) as $question){
      echo "<input type='checkbox' name='questionList[]'
         value='$question'> $question <br>";
   }
   echo "<br>
   <button onClick='addTestQuestions(questionList[])'>Add Questions</button>";

?>
