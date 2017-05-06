<?php
   include 'showerrors.php';
   session_start();
   include 'profSession.php';
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CS490 Prof get Student Test Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <ul>
      <li><a class="active" href="prof_home.php">Home</a></li>
      <li style="float:right"><a href="logout.php">LogOut</a></li>
    </ul>
  </head>
  <body>

    <center>
      <h1>Welcome <?php echo ucfirst($_SESSION['p_ucid']) ?> </h1> 
      <?php
         $student = $_GET['student'];  
         $_POST['sn'] = $student;
         $_SESSION['studentName'] = $student;
      ?>
      <h2><?php echo $student; ?> POV</h2>
    </center> 

    <?php

       $jsonData = array('studentName' => $_POST['sn']);
    
       //$url = "https://web.njit.edu/~or32/xr/receivetakentests.php";
       //$url = "https://web.njit.edu/~em244/CS490/getTakenTests.php"; //works with eddies
       $url = "http://afsaccess2.njit.edu/~or32/xr/receivetakentests.php";
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($ch);
       curl_close($ch);
       $testz = json_decode($result, 1);
       
    ?>
    <script type="text/javascript">
       function showStudentTestDiv(){
          document.getElementById('studentTestDivSpace').style.display = "block";
       } 
    </script>

  <center>
    <br>
    <div id="wrapper">
      <div id="topbox">
        <button type="button" class="btn btn-hover btn-block btn-primary" onclick="showStudentTestDiv()">Show Tests</button>
      </div>

      <div id="studentTestDivSpace" style="display:none;">
        <form method="post" action="prof_post_results_next3a_publish_test_score.php"> 
          <!-- <h3>List of Tests which <?php echo $student ?> took</h3> -->
          <?php

             if (!empty($testz["exam"])) {
                echo "<font color='white' size='5' face='verdana'>List of Tests $student took:</font>";
                foreach($testz["exam"] as $testNamez){
                   echo "<p><input type='radio' name='testNameList[]' value='$testNamez'><font color=DarkBlue>$testNamez</font></p>";
             }
        
          ?>
          <input type="submit" class="btn btn-hover btn-block btn-orange-primary" name="selectedStudentTest" value="Publish Student Test">
          <br>
          <?php
              }else{ 
                 $_SESSION['message'] = "There are NO Test(s) this student has taken";
                 echo "<div id='red_msg'>".$_SESSION['message']."</div>";
                 unset($_SESSION['message']);        
              }
          ?>   
        </form>
      </div>
      
   </center>
  </body>
</html>
