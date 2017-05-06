<?php
   include 'showerrors.php';
   session_start();
   include 'studentSession.php';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CS490 Student Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="studentscript.js"></script>
    <ul>
      <li><a class="active" href="student_home.php">Home</a></li>
      <li style="float:right"><a href="logout.php">LogOut</a></li>
    </ul>
  </head>

  <?php

     //MID URL - get Test Names so student can TAKE it
     //$url = "https://web.njit.edu/~or32/xr/receivealltests.php";
     $url = "http://afsaccess2.njit.edu/~or32/xr/receivealltests.php";
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $tests = curl_exec($ch);
     curl_close($ch);

  ?>

  <body>
    <center>
      <font color="white" size="6" face="verdana">Welcome <?php echo ucfirst($_SESSION['s_ucid']) ?> </font><br><br>
      <!-- <h1>Welcome <?php echo ucfirst($_SESSION['s_ucid']) ?> </h1> -->

      <div id="wrapper">
        <div id="topbox">
          <button type="button" class="btn btn-hover btn-block btn-primary" onclick="showTestDiv();">Take a Test</button>
          <br>
        </div>
      </div>

      <div id="availableTests" style="display:none;"> 
        <form method="post" action="student_take_test.php"> 
          <?php
             if (!empty(json_decode($tests))) {
                echo "<font color='white' size='3' face='verdana'>List of Tests:</font>";
                foreach(json_decode($tests) as $test){
                   echo "<p><input type='radio' name='testList[]' value='$test' required><font color=white>$test</font></p>";
                } 
                $_SESSION['myNewTest'] = $test;  
          ?>
          <input type="submit" class="btn btn-hover btn-block btn-green-primary" name="selectedExam" value="Start Testing">
          <br>
          <?php
             }else{ 
                $_SESSION['message'] = "There are NO Test(s) available yet";
                echo "<div id='red_msg'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);        
             }
          ?>    
        </form>
      </div>

      <?php

         $jsonData = array('studentName' => $_SESSION['s_ucid']);
         //get Test Names that student ALREADY TOOK
         $url = "https://web.njit.edu/~or32/xr/receiveexamsstudenttook.php";
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $result = curl_exec($ch);
         curl_close($ch);
         $studentOldTests = json_decode($result, 1); 

      ?>
      <div id="wrapper">
        <div id="topbox"><br><br>
          <font color="white" size="3" face="verdana">Show Tests I Took:</font><br>
          <button type="button" class="btn btn-hover btn-block btn-primary" onclick="showOldTestDiv()">See current grades</button>  
          <br>
        </div>
      </div>

      <div id="showOldTestDiv" style="display:none;">
        <form method="post" action="/~ka279/cs490/final/student_see_old_test_and_grade.php"> 
          <?php
             if (!empty($studentOldTests)) {
                echo "<font color='white' size='3' face='verdana'>List of Tests:</font>";
                foreach( $studentOldTests["examName"] as $oldtest){
                   echo "<p><input type='radio' name='oldTestList[]' value='$oldtest' required><font color=DarkBlue>$oldtest</font></p>";
                } 
                $_SESSION['myOldTest'] = $oldtest;  
          ?>
          <input type="submit" class="btn btn-hover btn-block btn-orange-primary" name="selectedOldExam" value="View Grade for this Test">
          <br>
          <?php
             }else{ 
                $_SESSION['message'] = "Your Test(s) have not been Graded yet";
                echo "<div id='red_msg'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);        
             }
          ?>       
        </form>
      </div><br>

    </center> 
  </body>
</html>
