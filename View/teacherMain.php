<!DOCTYPE html>
<html>
   <head>
      <title>Hello Professor</title>
       <link rel="stylesheet" type="text/css" href="teacher.css">
   </head>
   <body>
      <div class="wrapper">
         <div id="qbox">
            <p>Create a new question</p>
	    <p>Create an exam</p>
         </div>
         <div id="abox">
            <form method="post" action="teacherMain.php">
               <table>
	          <tr>
	             <td>Difficulty</td>
		     <td><input type="text" name="difficulty"
		  class="textInput"></td>
	          </tr>
	          <tr>
	             <td>Question</td>
		     <td><input type="text" name="question"
		  class="textInput"></td>
	          </tr>
	       </table>
	    </form>
         </div>
      </div>
      <?php

      ?>
   </body>
</html>
