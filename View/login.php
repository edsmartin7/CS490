
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Login to Start</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
   <div id="entry">
      <form method="post" action="login.php">
         <table>
            <tr>
	       <td>UCID: </td>
	       <td><input type="text" name="username" class="textInput"></td>
	    </tr>
	    <tr>
	       <td>PassWord:  </td>
	       <td><input type="password" name="password" class="textInput"></td>
	    </tr>
	    <tr>
	       <td></td>
	       <td><input type="submit" name="login_button" value="Login"></td>
	    </tr>
         </table>
      </form>
   <?php
 
      session_start();
      $username=$_POST['username'];
      $password=$_POST['password'];
     
      if(isset($_POST['username'], $_POST['password'])){
         $jsonData = array('username'=>$username, 'password'=>$password);
         //$string = http_build_query($jsonData);
         $url = "https://web.njit.edu/~em244/CS490/Controller/login.php";
         $ch = curl_init($url);
         //$jsonDataEncoded = json_encode($jsonData);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   
         $result = curl_exec($ch);
         curl_close($ch);
      
         //echo "\n";
         //echo $result;
         if($result == 1){
            //session_destroy();//dont destroy until logout???
	    header("Location:  https://web.njit.edu/~em244/CS490/View/studentMain.html");
	    exit;
         }else{
            //session_destroy();//
            header("Location:  https://web.njit.edu/~em244/CS490/View/teacherMain.php");
         }
      }
   ?>
   </div>
   </body>
</html>




