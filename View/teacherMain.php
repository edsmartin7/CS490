<!DOCTYPE html>
<html>
   <head>
      <title>Hello Professor</title>
       <link rel="stylesheet" type="text/css" href="teacherstyle.css">
   </head>
   <body>
      <script src="teacherscript.js"></script>
      <?php
      ?>
      <div class="wrapper">
         <div id="qbox">
            <p>Create a new question</p>
	    <button type="button" onclick="showDiv()">Create Question</button>
	    <p>Create an exam</p>
	    <button type="button">Create Exam</button>
         </div>
         <div id="abox" style="display:none;">
            <form method="post" action="teacherMain.php">
               <table>
	          <tr>
		     <td>Question Type</td>
		     <td><input type="text" name="questiontype"></td>
		  </tr>
	          <tr>
	             <td>Difficulty</td>
		     <td><input type="text" name="difficulty"></td>
	          </tr>
	          <tr>
	             <td>Question</td>
		     <td><input type="text" name="question"
		  class="textInput"></td>
	          </tr>
		  <tr>
		     <td>Test Case 1</td>
		     <td><input type="text" name="testcase1" ></td>
		  </tr>
		  <tr>
		     <td>Test Case 2</td>
		     <td><input type="text" name="testcase2" ></td>
		  </tr>
		  <tr>
		     <td></td>
		     <td><input type="submit" name="submitquestion" value="Add Your Question"></td>
		  <tr>
	       </table>
	    </form>
         </div>
      </div>
   </body>
</html>
