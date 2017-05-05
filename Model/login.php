<?php

   //Check database for login info

   $username = $_POST['username'];
   $password = $_POST['password'];
   
   if(isset($_POST['username'],$_POST['password'])){
      require_once('config.php');
      extract(dbConfig());
      $db = new mysqli($host, $user, $pw, $sqldb);
      $query = "SELECT * FROM z_logins 
                WHERE username='$username'
		AND password='$password'";
      
      $result = $db->query($query); 
      $row = $result->fetch_assoc();
       

      if($row){
	 echo $row['student'];
      }else{
         echo "NO ACCOUNT FOUND";
      }

   }
   
?>

