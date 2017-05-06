<?php
   include 'showerrors.php';
   session_start();
   include 'profSession.php';
?>
<html lang="en">
  <head>
    <title>CS490 Prof Publish Student Test Score Redirecting</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <ul>
      <li><a class="active" href="prof_home.php">Home</a></li>
      <li style="float:right"><a href="logout.php">LogOut</a></li>
    </ul>	
    <center>
      <h1>Welcome <?php echo ucfirst($_SESSION['p_ucid']) ?> </h1>
      <h1>Thank You for grading <?php echo ucfirst($_SESSION['studentName']) ?> </h1>
    </center>
    <?php
       $selectedStudentTest = $_POST['testNameList'][0];
    ?>
    <?php
      
       $jsonData = array(
          'studentName' => $_SESSION['studentName'],
          'examName' => $selectedStudentTest
	  //'flag' => 1
       );

       //$url = "https://web.njit.edu/~or32/xr/changeviewflag.php";
       //$url = "https://web.njit.edu/~em244/CS490/changeExamStatus.php";
       $url = "http://afsaccess2.njit.edu/~or32/xr/changeviewflag.php";
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($ch);
       curl_close($ch);
       $resultz = json_decode($result, 1);
      
       $studentName="em244"; //doesnt work
       $urlTWO = "https://web.njit.edu/~em244/CS490/getFirstGrade.php";
       $chTWO = curl_init($urlTWO);
       curl_setopt($chTWO, CURLOPT_POST, true);
       curl_setopt($chTWO, CURLOPT_POSTFIELDS, $studentName);
       curl_setopt($chTWO, CURLOPT_RETURNTRANSFER, true);
       $resultTWO = curl_exec($chTWO);
       curl_close($chTWO);
       $resultTWO = json_decode($resultTWO, 1);
       echo "hiiiiii <br>";
       print_r($resultTWO['grievances']);
       
    ?>
  </head>
  
  <body>
    <div class ="master">
      <div class="col">
        <?php
           $i=1;
           $t_questions = array ("q1", "q2", "q3", "q4");
           foreach ($t_questions as $tq){
              echo "<font color='white' size='3' face='verdana'>Question $i</font>" . "<br>";
              //echo $tq . "<br>";
        ?>
        <textarea type="text" readonly class="question" name="q" rows="7" cols="36" style="resize:none;" ><?php echo $tq; ?></textarea>
        <br><br>
        <?php 
              $i=$i+1;
           }
        ?>  
      </div>

      <div class="col">
        <?php
           $sn = ucfirst($_SESSION['studentName']);
           $sAns = array("answer1", "answer2", "answer3", "answer4");
           foreach ($sAns as $sa) {
              echo "<font color='white' size='3' face='verdana'>$sn's Answer </font>" . "<br>";
        ?>
        <textarea type="text" readonly class="answer" name="a" rows="7" cols="36" style="resize:none;" ><?php echo $sa; ?></textarea>
        <br><br>
        <?php
           } 
        ?>
      </div>

      <div class="col">
        <?php
           $feedback = array("good", "bad", "compiling errors", "works");
              foreach ($feedback as $f) {
              echo "<font color='white' size='3' face='verdana'>Feedback</font>" . "<br>";
        ?>
        <textarea type="text" class="f" rows="7" cols="36" style="resize:none;" ><?php echo $f; ?></textarea>
        <br><br>
        <?php
           }
        ?>
      </div>

      <div class="col">
        <?php
           echo "<font color='white' size='3' face='verdana'>Earned</font>" . "<br>" . "<br>" . "<br>" . "<br>" . "<br>" . "<br>";
           $oldTest = array(
              'points' => '66', '20', '50', '5',
              'us' => 'United States'
           );
           $points = array("10", "20", "50", "500");
           foreach ($points as $pts){ 
    
        ?>
        <input type="number" min="0" class="p" style="width: 60px" value="<?php echo $pts; ?>" maxlength="2" size="1">
        <br><br><br><br><br><br><br><br>
        <?php
           }
        ?>
      </div>  
    </div>  

  </body>
</html>
