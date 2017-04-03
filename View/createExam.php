<!DOCTYPE html>
<html>
   <head>
      <title>Create an Exam (temporary)</title>
     <!-- <link rel="stylesheet" type="text/css" href="all.css"> -->
     <script src="createExamFunctions.js"></script>
   </head>
   <body>
      <?php
         //return all questions in database
	 //get request
         $url = "https://web.njit.edu/~em244/CS490/Model/getAllQuestions.php";
	 $ch = curl_init($url);
	 curl_setopt($ch, CURLOPT_POST, true);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $result = curl_exec($ch);
	 curl_close($ch);
      ?>
      <div>
         <p>Name your exam</p>
	 <form method="post" action="/~em244/CS490/View/sendTest.php">
	    <br>
	    <input type="text" name="examName" class="textInput">
	    <br>
            <p>Select questions for exam</p>
	    <?php
	       foreach (json_decode($result) as $question ){
                  echo "<input type='checkbox' name='questionList[]'
		  value='$question'> $question <br>";
	       }
	    ?>
	    <br>
            <input type="submit" value="Create Exam"> 
	 </form>
      </div>
   </body>
</html>
