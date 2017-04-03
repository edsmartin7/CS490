
/*
function moveItem(){
  question = document.getElementById();
}
*/

function sendQuestions(){
   //because asynchronous
   xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
         document.getElementByid("demo").innerHTML = this.responseText;
      }
   };

   //document.getElementById("button") //needs name
   xhttp.open("POST", "createTest.php", true); //change php file
   xhttp.send(questionlist);
}
