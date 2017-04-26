<?php

//for every response: compile
//if compile, then check syntax
  
  //receive exam and responses AND quesitons?

  //get tests cases/answers
  $url = "https://web.njit.edu/~em244/CS490/Model/...php";
  $ch = curl_init($url);
  $result = curl_exec($ch);
  curl_close($ch);



   function compile(){
      $points = 0;
      //get question and test cases
      $tests = "1,2 | 3,4 | 5,6";
      $group = preg_split("/\|/", $tests);
      $single = preg_split("/,/", $group[0]);

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
      if($output) //if output and if output == testanswer
         $points++;
      else
         $output = shell_exec('javac Answer.java 2>&1 1> /dev/null');

      echo "ANSWERzzz $output \n"; //print_r or echo $output[0] if compiles
      
      exec('rm Answer.*');
      return $points;
   }

   //if(compile($question) != 0){
   //   syntax();
   //}

   compile();
   
?>
