
function showDiv(){
   document.getElementById('abox').style.display = "block";
}

function hideDiv(){
   //hide when question is submitted
   document.getElementById('abox').style.display = "none";
}

function showExamEntry(){
   document.getElementById('exambox').style.display = "block";
}
function hideExamEntry(){
   document.getElementById('exambox').style.display = "none";
}

var counter = 1;
function addAnotherTest(divName){
   var newdiv = document.createElement('div');
   newdiv.innerHTML = "<br><td><input type='text' name='testCase' class='textInput'></td><td><input type='text' name='textAnswer' class='textInput'></td>";
   document.getElementById(divName).appendChild(newdiv);
   counter++;
}


