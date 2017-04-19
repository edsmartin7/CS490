<html>
   <head>
      <title>Get to Work</title>
      <!-- <link rel="stylesheet" type="text/css" href="test.css"> -->
      <link rel="stylesheet" type="text/css" href="student.css">
   </head>
   <body>
      <div id="currenttest">
         <?php
	    //GET all current test's questions
	    $exam = $_GET['exam']; //'testhello';
	    //$questions = array("one", "two", "three");
	    $examData = array('exam'=>$exam);

	    $url = "https://web.njit.edu/~em244/CS490/Model/getTestQuestions.php";
	    $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $examData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $questions = curl_exec($ch);
            curl_close($ch);
            
         ?>
         <p>Currently taking test:  <?php echo $exam; ?></p>
         <form method="post" action="submitTest.php/<?php echo $exam; ?>"> 
	    <br>
	    <?php
               foreach(json_decode($questions) as $question){
		     echo "<p>$question</p>
                        <textarea type='text' name='answers[".$question."]' placeholder='Enter your answer'></textarea>
			<br>
			<button onclick='clear()' >clear answer</button>
			<br>";
	       }   
	    ?>
	    <br>
            <input type="submit" value="Submit Test for Grading">
         </form>
      </div>
   </body>
</html>
