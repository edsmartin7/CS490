<!DOCTYPE html>
<html>
   <head>
      <title>Welcome Student</title>
      <!-- <link rel="stylesheet" type="text/css" href="student.css"> -->
   </head>
   <body>
      <script src="studentscript.js"></script>
      <?php
         
         //get ALLTESTS and get ALLGRADES
	 $url = "https://web.njit.edu/~em244/CS490/Model/getAllTests.php";
	 $ch = curl_init($url);
	 curl_setopt($ch, CURLOPT_POST, true);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, $DATA);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 $tests = curl_exec($ch);
         curl_close($ch);

	 $gradesUrl = "https://web.njit.edu/~em244/CS490/Model/getGradedTests.php";
	 $ch2 = curl_init($gradesUrl);
	 curl_setopt($ch2, CURLOPT_POST, true);
	 curl_setopt($ch2, CURLOPT_POSTFIELDS, $DATA);
         curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
	 $grades = curl_exec($ch2);
	 curl_close($ch2);
         
      ?>
      <div class="wrapper">

         <div id="topbox">
	    <p>Take a Test</p>
	    <button type="button" onclick="showTestDiv()">Take a Test</button>
	    <p>See Previous results</p>
	    <button type="button" onclick="showGradeDiv()">See current
	    grades</button>
	 </div>

         <div id="availableTests" style="display:none;">
	    <p>List of Tests</p>
	    <form method="post" action="/~em244/CS490/View/takeTest.php"> 
	       <?php
	          foreach(json_decode($tests) as $test){
                     echo "<input type='checkbox' name=testList[]'
	       	     value='$test'>$test <br>";
	          }
	       ?>
               <br> 
	       <input type="submit" name="start_test_button" value="Start Testing">
	    </form>
         </div>

	 <div id="gradedTests" style="display:none;">
	    <p>Click to see details</p>
            <form method="post" action="seeCurrentGrades.php">
	       <?php
	          foreach(json_decode($grades) as $grade){
		     echo "<input type='checkbox' name=gradedList[]'
		     value='$grade'>$grade <br>";
		  }
	       ?>
	       <br>
	       <input type="submit" name="see_graded_test_details" value="See
	       Graded Test Details">
	    </form>
	 <div>
      </div>
   </body>
</html>
