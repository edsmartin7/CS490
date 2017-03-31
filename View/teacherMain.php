<!DOCTYPE html>
<html>
   <head>
      <title>Hello Professor</title>
       <link rel="stylesheet" type="text/css" href="teacherstyle.css">
   </head>
   <body>
      <script src="teacherscript.js"></script>
      <div class="wrapper">
         <div id="qbox">
            <p>Create a new question</p>
	    <button type="button" onclick="showDiv()">Create Question</button>
	    <p>Create an exam</p>
	    <button type="button" onclick="showExamEntry()">Create Exam</button>
         </div>
         <div id="abox" style="display:none;">
            <form method="post" action="teacherMain.php">
               <table>
	          <tr>
		     <td>Question Type</td>
		     <td><input type="text" name="category" class="textInput"></td>
		  </tr>
	          <tr>
	             <td>Difficulty</td>
		     <td><input type="text" name="difficulty" class="textInput"></td>
	          </tr>
	          <tr>
	             <td>Question</td>
		     <td><input type="text" name="question" class="textInput"></td>
	          </tr>
		  <tr>
		     <td></td>
		     <td><input type="submit" name="add_button" value="Add Your Question"></td>
		  <tr>
	       </table>
	    </form>
         </div>
	 <div id="exambox" style="display:none;">
            <form method="post" action="teacherMain.php">
               <table>
                  <tr>
                     <td>Number of Questions</td>
		     <td><input type="text" name="examLength" class="textInput"></td>
		  </tr>
		  <tr>
                     <td>Name new exam</td>
		     <td><input type="text" name="examName" class="textInput"</td>
		  </tr>
		  <tr>
                     <tr></td>
		     <td><input type="submit" name="enterexam" value="Add your Exam"></td>
	          </tr>
	       </table>
	    </form>
	 </div>
      </div>
      <?php
         //include 'teacherFunctions.php';
	 //echo createQuestion(); 
         //send question
         $category=$_POST['category'];
         $difficulty=$_POST['difficulty'];
         $question=$_POST['question'];

         if(isset($_POST['category'], $_POST['difficulty'])){
            $jsonData = array('category'=>$category, 'difficulty'=>$difficulty,
            'question'=>$question);
            $url="https://web.njit.edu/~em244/CS490/Controller/addQuestion.php";
            $ch = curl_init($url);
            //$jsonDataEncoded = json_encode($jsonData);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); //
            $result = curl_exec($ch);
            curl_close($ch); 
            echo $result; //
         }

	 if(isset($_POST['examName'])){
            $jsonData = array('examName'=>$examName);
            $url="https://web.njit.edu/~em244/CS490/Controller/createExam.php";
            $ch = curl_init($url);
            //$jsonDataEncoded = json_encode($jsonData);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0); //
            $result = curl_exec($ch);
            curl_close($ch); 
            echo $result; //
         
	 }
      ?>
   </body>
</html>
