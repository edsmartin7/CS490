<?php
/*
receivealltasks.php
Return list of all questions/tasks.
Created By: Oscar Rodriguez
*/

$backURL = "http://afsaccess2.njit.edu/~em244/CS490/getAllQuestions.php";
$ch = curl_init($backURL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
echo $result;

?>