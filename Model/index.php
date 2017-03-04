<?php

   $username = $_POST['username'];
   $password = $_POST['password'];

   if(isset($_POST['username'],$_POST['password'])){
      require_once('config.php');
      extract(dbConfig());
      $db = new mysqli($host, $user, $pw, $sqldb);
      //$username = $db->real_escape_string($_POST['username']); //
      //$password = (int)$_POST['password'];
      $query = "SELECT * FROM afslogin 
                WHERE username='$username'
		AND password='$password'";
      
      $result = $db->query($query); //insert data into database
      $row = $result->fetch_assoc();
   
      if($row){
         echo "VALID PROJECT ID";
      }else{
         echo "INVALID PROJECT ID";
      }
   }

?>

