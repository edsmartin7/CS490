<?php

   if (isset($_SESSION['p_ucid'])) {
      //echo "You have successfully logged in Prof!"; 
   }else {
      //redirects to kfront page ...if not logged in
      header("location: kfront.php");
   }
	
?>
