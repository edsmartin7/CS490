<?php
/*
midlogin.php
Check login credintials.
Created By: Oscar Rodriguez
*/

$backURL = "http://afsaccess3.njit.edu/~em244/CS490/login.php";
$ch = curl_init($backURL);
$marr =array('ucid' => $_POST['ucid'], 'pass' => $_POST['pass']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $marr);
$result = curl_exec($ch);
curl_close($ch);
echo $result;

?>
