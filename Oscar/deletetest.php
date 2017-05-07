<?php
/*
deletetest.php
Delete one test/exam from the database.
Created By: Oscar Rodriguez
*/

print_r($_POST);

$backURL = "http://afsaccess2.njit.edu/~em244/CS490/deleteExam.php";
$ch = curl_init($backURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
$result = curl_exec($ch);
curl_close($ch);


?>