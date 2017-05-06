<?php

   //Grade a single question //return single grade and errors 
   $_POST['question'];


   //get questions and tests cases / runs per question
   $url = "https://web.njit.edu/~em244/CS490/Model/getQuestionRow.php";
   $ch = curl_init($url);
   $result = curl_exec($ch);
   curl_close($ch);
   echo $result;

   /*
   function compile(){
      $points = 0;
      //get question and test cases
      $tests = "1,2 | 3,4 | 5,6";
      $group = preg_split("/\|/", $tests);
      $single = preg_split("/,/", $group[0]);
      $testAnswers = "3|7|11";
      $testAnswers = preg_split("/\|/", $testAnswers); //answers[0] == 3

      //tell user to write a public static method
      $answer = "public static int add(int a, int b){ return a+b; }";
      $templateOne = "public class Answer {";
      $templateTwo = "\npublic static void main(String[] args){
      System.out.println(";
               
      //grep method name from $answer
      $split = preg_split("/(\s|\()/", $answer);
      $methodName = $split[3];
   
      $methodDeclaration = $methodName . "( ";
      foreach($single as $value){
         $methodDeclaration .= "$value ,";
      }
      $methodDeclaration = substr($methodDeclaration, 0, strlen($methodDeclaration)-1); 
      $endbracket = ")); \n}\n}";

      $compile = fopen("Answer.java", "w");
      fwrite($compile, $templateOne);
      fwrite($compile, $answer);
      fwrite($compile, $templateTwo);
      fwrite($compile, $methodDeclaration);
      fwrite($compile, $endbracket);

      exec('javac Answer.java');
      exec('java Answer', $output);
      if($output){ //if output and if output == testanswer
         $points++;
	 if($output[0] == $testAnswers[0])
	    $points++;
      }else{
         $output = shell_exec('javac Answer.java 2>&1 1> /dev/null');
      }

      exec('rm Answer.*');
      return $points;
   }

   compile();
   */ 
?>
