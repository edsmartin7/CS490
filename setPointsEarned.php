<?php

   //Get a student's points info

   $student = $_POST['student'];
   $exam = $_POST['exam'];
   $points = $_POST['points'];
   
   require_once('config.php');
   extract(dbConfig());
   $db = new mysqli($host, $user, $pw, $sqldb);
 
   $check = "SELECT * FROM points_earned
             WHERE student='$student' AND exam='$exam'";
   $checkresult = $db->query($check);
   $row = $checkresult->fetch_assoc();

   if($row == ""){
      $query = "INSERT INTO points_earned (student, exam, points)
                VALUES ('$student', '$exam', '$points')";
   }else{
      $query = "UPDATE points_earned
                SET points='$points'
                WHERE student='$student' AND exam='$exam'";
   }

   $result = $db->query($query); 

   if($result){
      echo "POINTS ADDED \n";
   }else{
      echo "NOT ABLE TO RETURN ALL THE STUDENT'S POINTS\n";
   }
    
?>
