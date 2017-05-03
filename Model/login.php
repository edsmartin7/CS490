<?php

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
         //$results = array(1, $row['student']);
	 //echo json_encode($row); //encode reuslts?
	 echo $row['student'];
      }else{
         echo "NO ACCOUNT FOUND";
      }

   }
   
?>

