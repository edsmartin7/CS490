<?php
/*Posts
 *sName
 *testName
 *[0][1] are Student Answers
 */
include 'jhandle.php';

$studentanswers = array();
$alldata = array();

foreach($_POST as $data){
	array_push($alldata, $data);
}
for($i = 2; $i < count($alldata); $i++){
	array_push($studentanswers, $alldata[$i]);
}

$examData = array();
$taskarr = array();
$taskinfoarr = array();
if(!empty($alldata)){
	//Get Task List
	$examData = array('exam'=> $alldata[1]);
	$backURL = "http://afsaccess2.njit.edu/~em244/CS490/getTestQuestions.php";
	$ch = curl_init($backURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $examData);
	$taskarr = json_decode(curl_exec($ch), 1);
	curl_close($ch);
	
	//Get Task Data
	foreach($taskarr as $minortask){
		$questionData = array("question"=> $minortask);
		
		$backURL = "http://afsaccess2.njit.edu/~em244/CS490/getQuestionRow.php";
		$ch = curl_init($backURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $questionData);
		$result = json_decode(curl_exec($ch), 1);
		curl_close($ch);
		array_push($taskinfoarr, $result);
	}
}

$bonusinfo = array();
$studentarr = array();
$totalgrade = 0;
$fstudent = new Student();

$questionData = array('studentName' => $alldata[0],
                      'testName' => $alldata[1],
		      );

for ($i = 0; $i < count($taskinfoarr); $i++){
	$fstudent->input_answer($studentanswers[$i]);
	$fstudent->task = new Task();
	$fstudent->task->assimilate($taskinfoarr[$i]);	
	jhandle::gradetask($fstudent);
	$totalgrade += $fstudent->grade;
	array_push($studentarr, $fstudent->grievance);

        $questionData['question'] = $taskinfoarr[$i];
	$questionData['response'] = $studentanswers[$i];
	$questionData['points'] = $fstudent->grade;

        $gradeURL = "https://web.njit.edu/~em244/CS490/setPointsEarned.php";
	$gradeCurl = curl_init($gradeURL);
	curl_setopt($gradeCurl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($gradeCurl, CURLOPT_POST, true);
	curl_setopt($gradeCurl, CURLOPT_POSTFIELDS, $questionData);
	$success = curl_exec($gradeCurl);
	curl_close($gradeCurl);
}
$jsonData = array();
if (count($studentanswers) != 0){
	$totalgrade = $totalgrade / count($studentanswers);

	$jsonData = array(	'studentName' => $alldata[0],
						'testName' => $alldata[1],
						'grade' => $totalgrade,
						'grievance' => json_encode($studentarr)		
	);
}

$backURL = "http://afsaccess3.njit.edu/~em244/CS490/addGrade.php";
$ch = curl_init($backURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
$result = curl_exec($ch);
curl_close($ch);

/*
print('<pre>');
print_r($fstudent);
print('</pre>');
*/
?>
