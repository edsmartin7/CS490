<?php

$username = $_POST['username'];
$password = $_POST['password'];
echo $username;
echo $password;
/*
   //if(isset($_POST['ucid'],$_POST['pass'])){
      $cb = new Mysqli('sql2.njit.edu', 'em244', 'nji7yjhw', 'em244');
      $username = $db->real_escape_string($_POST['username']); //
      $password = (int)$_POST['password'];
      echo $username;//
      echo $password;//
      //$query = "INSERT INTO data SET mydata='$name, $age'";
      $query = "SELECT * FROM afslogin 
                WHERE username='$username'
		AND password='$password'";
      $db->query($query); //insert data into database
      $result = conn->query($query);//or db? //($sql);

      if(!$row = $result->fetch_assoc()){
         echo "Your username or password is incorrect";
      }else{
         echo "You are logged in";
      }
   //}
  */
   /*
   $name = $_POST['name'];
   $age = $_POST['age'];
   echo $name;
   echo $age;
   */
?>

