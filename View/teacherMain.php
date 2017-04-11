<!DOCTYPE html>
<html>
   <head>
      <title>Hello Professor</title>
       <link rel="stylesheet" type="text/css" href="teacherstyle.css">
   </head>
   <body>
      <script src="teacherscript.js"></script>
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

      <div class="wrapper">
         <div id="qbox">
            <p>Create a new question</p>
	    <button onclick="showDiv()">Create Question</button>
	    <p>Create an exam</p>
	    <button onclick="showExamEntry()">Create Exam</button>
         </div>
         <div id="abox" style="display:none;">
            <form method="post" action="addQuestion.php">
               <p>Question Type</p>
               <input type="text" name="category" class="textInput">
               <p>Difficulty</p>
               <input type="text" name="difficulty" class="textInput">
               <p>Question</p>
               <input type="text" name="question" class="textInput">
	       <br>
               <p>Add test cases</p>
	       <div id="tests">
                  <input type="text" name="testCase[]" class="textInput" placeholder="Test Cases">
                  <input type="text" name="testAnswer[]" class="textInput" placeholder="Test Solutions">
               </div>
               <input type="submit" name="add_button" value="Add Your Question">
            </form>
	    <button onclick="addTests()">Add More Tests</button>
         </div>

	 <div id="exambox" style="display:none;">
            <div id='left'>
               <p>Name your Exam</p>
	       <form method="post" action="/~em244/CS490/View/sendTest.php">
               <br>
               <input type="text" name"examName" class="textInput">
	       <br>
	       <!-- show selected questions -->
	    </div>
	    <div id='right'>
	       <p>Name your exam</p>
	       <form method="post" action="teacherMain.php">
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
                  <input type="submit" value="Add Question to Exam"> 
	       </form>
            </div>
         </div>

      </div>
   </body>
</html>
