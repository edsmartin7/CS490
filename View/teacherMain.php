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
          <p>Add test cases</p>
	  <div id="tests">
            <input type="text" name="testCase[]" class="textInput" placeholder="Test Cases">
            <input type="text" name="testAnswer[]" class="textInput" placeholder="Test Solution">
          </div>
          <input type="submit" name="add_button" value="Add Your Question">
        </form>
	<button onclick="addTests()">Add More Tests</button>
      </div>

      <div id="exambox" style="display:none;">
        <div id='left'>
          <p>Name your Exam</p>
	  <form method="post" action="sendTest.php">
            <br>
            <input type="text" name="examName" class="textInput"><br>
	    <p>Chosen Questions</p><br>
	    <div id='selected'>
	       <!-- ajax hopefully -->
	    </div>
            <!-- <input type="submit" value="Submit your exam"> -->
            <button type="submit" value="Submit your exam now">Submit</button><br>
            <button>Delete selected Question</button>
          </form>
        </div>
        <div id='right'>
          <p>Select questions for exam</p>
          <form>
            <select name="categories" onchange="filterQuestions(this.value)">
              <option value="">Filter:</option>
              <option value="all">ALL</option>
              <option value="basic">Basics</option>
              <option value="array">Arrays</option>
              <option value="loop">Loops</option>
              <option value="logic">Logic</option>
              <option value="math">Math</option>
            </select>
            <br>
          </form>
          <div id="list">
            <!-- fill w/ javascript -->
          </div><br>
        </div>
      </div>

    </div>
  </body>
</html>
