<?php
//take a get url value inside blade template
$r=Request::get('u_id');
//echo $r;
if( $r ){
  Session::put('title',$data[0]->user_name.' | Profile');
 
}
else
  Session::put('title','Home');
include "../resources/views/templates/resourcesFile.php";



?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .outlayer{
     
      background-color:white;
      width:57%;
      height:40%;
      padding:20px;
      border-radius:6px;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    .sts_name{
      font-size:20px;
      
    }
    .sts_img{
      width:45px;
      height:45px;
    }
    
    .sts_like{
      width:20px;
      height:20px;
    }
    @media only screen and (max-width: 600px){
      body{
        
        background-color:red;
      }
    }
    body{
      background-color:black;
    }
    .ar{
      background-color:black;
      width:900px;
      height:300px;
    border: 5px solid #9b2;
    box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
  </style>
</head>

<body>
<div class="ar">Rajib </div>

</body>
</html> 