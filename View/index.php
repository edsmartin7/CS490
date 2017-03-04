
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Kenny's Section</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
   <div id="entry">
      <form method="post" action="index.php">
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
      $ucid=$_POST['username'];
      $_SESSION["username"] = $_POST['username'];
      $pass=$_POST['password'];
      $_SESSION["password"] = $_POST['password'];
      

      $jsonData = array('username'=>$ucid, 'password'=>$pass);
      $string = http_build_query($jsonData);
      $url = "https://web.njit.edu/~em244/Temp/Controller/";
   
      $ch = curl_init($url);
      //$jsonDataEncoded = json_encode($jsonData);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   
      $result = curl_exec($ch);
      curl_close($ch);
      echo "BREAKING \n";
      echo $result;

   ?>
   </div>
   </body>
</html>




