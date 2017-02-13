<?php

   $username = $_POST['ucid'];
   $password = $_POST['pass'];
  
   if(isset($_POST['ucid'],$_POST['pass'])){
      require_once('config.php');
      extract(dbConfig());
      $db = new mysqli($host, $user, $pw, $sqldb);
      //$username = $db->real_escape_string($_POST['username']);
      //$password = (int)$_POST['password'];
      $query = "SELECT * FROM afslogin 
                WHERE username='$username'
		AND password='$password'";

      $result = $db->query($query); //insert data into database
  
      $row = $result->fetch_assoc();
   
      if($row){
         echo "<br>VALID PROJECT ID\n";
      }else{
         echo "<br>INVALID PROJECT ID\n";
      }
   }
  
?>

