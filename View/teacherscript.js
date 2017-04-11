
function showDiv(){
   var div = document.getElementById('abox');
   if(div.style.display === 'none')
      div.style.display = 'block';
   else
      div.style.display = 'none';

}

function showExamEntry(){
   var div = document.getElementById('exambox');
   if(div.style.display === 'none')
      div.style.display = 'block';
   else
      div.style.display = 'none';

}

function addTests(){
   
   var current = document.getElementById('tests');
   var input = document.createElement("div");
   //input.setAttribute("id", 'tests');
   input.id = 'tests'; 
   input.innerHTML = "<input type='text' name='testCase[]' class='textInput' placeholder='Test Case'> <input type='text' name='testAnswer[]' class='textInput' placeholder='Test Answer'>";
   current.appendChild(input);
}

