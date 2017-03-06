<?php

   $username = $_POST['ucid'];
   $password = $_POST['pass'];
   
   if(isset($_POST['ucid'],$_POST['pass'])){
      require_once('config.php');
      extract(dbConfig());
      $db = new mysqli($host, $user, $pw, $sqldb);
      $query = "SELECT * FROM logins 
                WHERE username='$username'
		AND password='$password'";
      
      $result = $db->query($query); 
      $row = $result->fetch_assoc();

      if($row){
         $results = array(1, $row['student']);
	 //echo json_encode($results);
	 $results;
      }else{
         echo "NO ACCOUNT FOUND";
      }

      /*
      if((int)$row['student'] == 1){
        echo "<br> STUDENt ACCOUNT \n" . $row['student'];
      }else{
         echo "<br> TEACHER ACCOUNT \n";
      }
      */
   }
   
?>

