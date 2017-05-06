
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
