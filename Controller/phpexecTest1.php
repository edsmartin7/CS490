<?php

   $question = "";
   $filename = "";
   $compile = "javac '$filename'";
   $run = "java '$filename'";
  
   //echo exec('ls');
   //echo "\n";

   $file = "Answer.java";
   exec("javac Answer.java");
   $fileclass = "Answer.class";
   if(file_exists($fileclass) == true){
      $output = shell_exec("java Answer");
      //delete .class file
   }else{

      $output = "Did not compile";
   }

   //append output to array w/exam question number
   

?>
