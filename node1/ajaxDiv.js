function ajaxFunction(){
   var ajaxRequest;  // Khai bao mot bien
   try{		   
      // Voi cac trinh duyet hien dai: Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){
   try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Thong bao khi xay ra loi
            alert("Co loi xay ra voi trinh duyet cua ban!");
            return false;
         }
      }
    }
    ajaxRequest.onreadystatechange = function (){
    
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('wrap_main');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
    }	   
    ajaxRequest.open("GET", "ajaxDiv.php");
    ajaxRequest.send(); 
    setTimeout("ajaxFunction()",6000);
    }