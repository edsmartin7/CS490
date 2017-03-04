<?php

   $username = $_POST['username'];
   $password = $_POST['password'];

   
   if(isset($_POST['username'],$_POST['password'])){
      require_once('config.php');
      extract(dbConfig());
      $db = new mysqli($host, $user, $pw, $sqldb);
      $query = "SELECT * FROM logins 
                WHERE username='$username'
		AND password='$password'";
      
      $result = $db->query($query); 
      $row = $result->fetch_assoc();

      
      if((int)$row['student'] == 1){
        echo "<br> STUDENt ACCOUNT \n" . $row['student'];
      }else{
         echo "<br> TEACHER ACCOUNT \n";
      }

      //return
      //echo json_encode($return_arr);
   }
   
?>

