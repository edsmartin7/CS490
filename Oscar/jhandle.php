<?php
/* 
jhandle.php
Java Handler
Created By: Oscar Rodriguez
*/

include 'task.php';
include 'student.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

class jhandle{
	public static function getTemplate(){
		//$floc = 'pdir/def.java';
		$floc = 'def.java';
		$jfile = fopen($floc, 'r');
		$jstr = fread($jfile, filesize($floc));
		fclose($jfile);
		return $jstr;
	}
	
	public static function prepJava($ans, $prep, $testnum){
		$jtemplate = self::getTemplate();
		$jans = "";
		$meth= "";
		$args = "";
		
		$meth = substr($ans, strpos($ans, $prep->returntype), strpos($ans, '(') - strpos($ans, $prep->returntype));
		$meth = substr($meth, strpos($meth, ' '));
		$meth = trim($meth);

		$count = 0;
		foreach ($prep->argtypes as $type){
			$args .= $prep->tinput[$testnum][$count]. ',';
			$count += 1;
		}
		$args = rtrim($args, ',');
		
		$meth = 'System.out.print(' . $meth . '(' . $args . '))' . ';';
		$jans = substr_replace($jtemplate, $meth, 54, 0);
		$jans = substr_replace($jans, $ans, 55 + strlen($meth), 0);

		return $jans;
	}

	public static function compileJava($ans){
		//$floc = 'pdir/o.java';
		$floc = 'o.java';
		$jfile = fopen($floc, 'w');
		fwrite($jfile, $ans);
		fclose($jfile);
		exec('javac '.$floc.' 2>&1', $err);
		return $err;
	}
	
	public static function runJava(){
		$output = 0;
		//exec('java -cp pdir o', $output);
		exec('java -cp o', $output);
		return $output;
	}
	
		
		
	public static function  gradeTask($student){
		$score = 0;
		$grieve = array();
		$sans = '';
		$serr = '';
		$sout = 0;
		
		$numtests = $student->task->numtests;
		$count = 0;
		$perfect = 0;
		
		while($count < $numtests){
			$sans = self::prepJava($student->answer, $student->task, $count);
			$serr = self::compileJava($sans);
			$sout = 0;
			
			if(empty($serr)){
				$sout = self::runJava();
				if ($sout[0] == $student->task->toutput[$count]){
					array_push($grieve, "Correct Output: " .$sout[0]);
					$perfect += 1;
				}
				else{
					array_push($grieve, "Wrong Output: " .$sout[0]);
				}						
			}
			else{
				$sout = array('ERROR');
				array_push($grieve, $serr);
			}

			
			$count += 1;
		}
		if ($numtests != 0)
			$score = 100 * ($perfect / $numtests);
		
		if(empty($student->answer)){
			$score = 0;
		}
		
		if($score < 0){
			$score = 0;
		}
		
		
		$student->grievance = $grieve;
		$student->grade = $score;
		self::bonusCheck($student);
		
	}
	public static function bonusCheck($student){
		$bonus = array();
		$ans = $student->answer;
		$cat = $student->task->category;
		$meth = substr($ans, strpos($ans, $student->task->returntype), strpos($ans, '(') - strpos($ans, $student->task->returntype));
		$meth = substr($meth, strpos($meth, ' '));
		$meth = trim($meth);
		
		$args = array();		
		$temp = ''; 
		
		if(!empty($student->task->methodname)){
			if($student->task->methodname == $meth){
				array_push($bonus, 'Method name match');
			}
			else{
				array_push($bonus, 'Method name mismatch');
			}
		}
		else{
			array_push($bonus, 'No method name enforced');
		}
		// Confusing String Manipulation
		if(!empty($student->task->argnames)){
			$args = array();
			$temp = substr($ans, strpos($ans, '('), strpos($ans, ')') - strpos($ans, '(')+ 1);
			
			foreach($student->task->argtypes as $type){				
				$part = substr($temp, strpos($temp, $type) + strlen($type));
				$part = trim($part);
				$comma = substr($part, 0, strpos($part, ','));
				if(!empty($comma))					
					$part = substr($part, 0, strpos($part, ','));
				else 
					$part = substr($part, 0, strpos($part, ')'));
				$part = trim($part);
				if(!empty($part))
					$temp = substr($temp, strpos($temp, $part));
				array_push($args, $part);
			}
			
			
			if($student->task->argnames == $args){
				array_push($bonus, 'Argument names match');
			}
			else{
				array_push($bonus,'Argument names mismatch');
			}
		}
		else{
			array_push($bonus, 'No arg names enforced');
		}
		
	
		$student->grievance = array_merge($bonus, $student->grievance);
		array_push($bonus, $args);
		$student->bonuscheck = $bonus;
	}
}

?>
