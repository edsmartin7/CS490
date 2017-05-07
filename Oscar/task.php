<?php
/* 
	task.php
  	Created By: Oscar Rodriguez
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Task {

	// The category the question pertains to.
	public $category;
	
	// The difficulty of the question  0-Easy 1-Medium 2-Hard
	public $difficulty;
	
	// Raw String data the question contains.
	public $text;

	public $returntype;

	public $methodname;
	
	public $argtypes = array();
	
	public $argnames = array();
	
	public $numtests;
	
	public $tinput = array();
	
	public $toutput = array();

	
		
	function assimilate($taskdata){
		$this->category = $taskdata["category"];
		$this->difficulty = $taskdata["difficulty"];
		$this->text = $taskdata["question"];
		$this->returntype = $taskdata["returnType"];
		$this->methodname = $taskdata["methodName"];
		$this->argtypes = self::commasep($taskdata["argType"]);
		$this->argnames = self::commasep($taskdata["argName"]);	
		$this->toutput = self::commasep($taskdata["tests"][0]['testanswer']);
		$this->numtests = count($this->toutput);
		$this->tinput = self::commasep($taskdata["tests"][0]['testcase']);
		$this->tinput = array($this->tinput);
		
		/*
		$cnt = 0;
		foreach($taskdata["tests"] as $temp){
			if($temp[$cnt] == 'testanswer')
				
		}
		*/
	}
	
	function commasep($string){
		$marr = explode(",", $string);
		return $marr;
	}
	
	function localmerge($taskdata){
		$this->category = $taskdata["category"];
		$this->difficulty = $taskdata["difficulty"];
		$this->text = $taskdata["text"];
		$this->returntype = $taskdata["returntype"];
		$this->methodname = $taskdata["methodname"];
		$this->argtypes = $taskdata["argtypes"];
		$this->argnames = $taskdata["argnames"];
		$this->tinput = $taskdata["input"];
		$this->toutput = $taskdata["output"];
		$this->numtests = $taskdata["numtests"];
	}
	
}

?>