function search(val){
    var search_value = val;
    console.log("Search Value : "+search_value);


    if(search_value==""){
        document.getElementById("drop_content").innerHTML="Sry";
    }
    else{
    
    
     
     
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
         //console.log("OK");
            if(this.readyState == 4 && this.status == 200){
                 document.getElementById("drop_content").innerHTML = this.responseText;
                 console.log("Ajax code in");
                 $(document).ready(function(){
                    $(".dropdown-content").css("display","block");
                  });
            }
        };
        
        xhttp.open("GET","/blog/search?s_value="+search_value,true);
        xhttp.send();

    }
    
  }