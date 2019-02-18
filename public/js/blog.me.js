function search(val){
    var search_value = val;
    //console.log("Search Value : "+search_value);


    if(search_value!=""){
    
    
     
     
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
         //console.log("OK");
            if(this.readyState == 4 && this.status == 200){
                 document.getElementById("drop_content").innerHTML = this.responseText;
                 //console.log("Ajax code in");
                 $(document).ready(function(){
                    $(".dropdown-content").css("display","block");
                  });
            }
        };
        
        xhttp.open("GET","/search?s_value="+search_value,true);
        xhttp.send();

    }
    else{
        document.getElementById("drop_content").innerHTML = "";
    }
    
  }

//how to check enter key code when write a status in textarea textbox
function onTestChange() {
    var key = window.event.keyCode;

    // If the user has pressed enter
    if (key === 13) {
        document.getElementById("txtArea").value = document.getElementById("txtArea").value + "\n*";
        return false;
    }
    else {
        return true;
    }
}
