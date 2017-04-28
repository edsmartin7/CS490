
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

function addTestQuestions(questionList){
   
   if(str == ""){
      document.getElementById("temp").innerHTML = "";
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
            document.getElementById("temp").innerHTML = this.responseText;
	 }
      };
      xmlhttp.open("GET","filteredQuestions.php?q="+str, true);
      xmlhttp.send();
   }
   //
   var current = document.getElementById('tests');
   var input = document.createElement("input");
   //input.setAttribute("id", 'tests');
   input.id = 'tests'; 
   input.innerHTML = "<input type='text' name='testCase[]' class='textInput' placeholder='Test Case'> <input type='text' name='testAnswer[]' class='textInput' placeholder='Test Solution'>";
   current.appendChild(input);

   //
   var request = new XMLHttpRequest();
   request.open('GET', 'someurlwjson');
   //button listener instead in php form
   //<button id="btn">get info</button>
   var btn = document.getElementById("btn");
   btn.addEventListener("click", function(){
      //all jax stuff below
   });
   request.onload = function(){
     //console.log(request.responseText); 
     //var data = request.responseText;
     var data = JSON.parse(request.repsonseText);
     //console.log(data[0]);
     renderHTML(data);
   };
   request.send();
   //add html to page
   function renderHTML(stuff){
      for(i=0; i<stuff.length; i++){
         string += "<p>"+stuff[i]+"</p>"; //declare var outside of array 
      }
      //div id animal-info
      var container = docuemnt.getEelmetnBID('animal-info');
      container.insertAdajacentHTML('beforeend', stuff);
   }

}

function removeTestQuestions(){

}
