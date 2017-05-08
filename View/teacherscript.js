
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
   input.innerHTML = "<input type='text' name='testCase[]' class='textInput' placeholder='Test Case'> <input type='text' name='testAnswer[]' class='textInput' placeholder='Test Solution'>";
   current.appendChild(input);
}

function filterQuestions(str){ 

   if(str == ""){
      document.getElementById("list").innerHTML = ""; //getElementByName
      return;
   }else{

      if(window.XMLHttpRequest){
         //new browsers
         xmlhttp = new XMLHttpRequest();
      }else{
         //old browsers
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function(){
         if(this.readyState == 4 && this.status == 200){
            document.getElementById("list").innerHTML = this.responseText;
	 }
      };
      xmlhttp.open("GET","filteredQuestions.php?q="+str, true);
      xmlhttp.send();
   }
}

function selectedQuestions(questionList){

   for(var x=0; x<questionList.length; x++){
      if(questionList[x].checked){
         var current = document.getElementById('selected');
         var input = document.createElement("div");
         //input.id = 'tests'; 
         input.innerHTML = "<input type='checkbox' name='submitList[]' value='"+questionList[x].value+"'>"+questionList[x].value+" <br><input type='number' min='1' style='width: 60px' name='pointsAssigned[]' placeholder='Pts' maxlength='2' size='1'><br>";
         current.appendChild(input);
      }
   }

}

function removeTestQuestions(){

}
