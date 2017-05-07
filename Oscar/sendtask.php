<?php

$backURL = "http://afsaccess3.njit.edu/~em244/CS490/addQuestion.php";
$ch = curl_init($backURL);
/*
$marr =array('category' => $_POST['cat'], 
		'difficulty' => $_POST['diff'], 
		'question' => $_POST['quest'],
		'returntype' => $_POST['returntype'],
		'methodName' => $_POST['methodName'],
		'argName' => $_POST['argName'],
		'argType' => $_POST['argType'],
		'testCase' => $_POST['testCase'],
		'tcAns' => $_POST['tcAns'],
		);
*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
$result = curl_exec($ch);
curl_close($ch);

?>