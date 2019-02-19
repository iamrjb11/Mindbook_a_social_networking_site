<?php
include "../resources/views/templates/resourcesFile.php";
?>

<head>
    <style>
    .div_form{
      background-color:white;
      width:100%;
      height:60%;
      padding:2% 15%;
      border-radius:6px;
      border-top:2px solid #007bff;
      border-bottom:2px solid #007bff;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    .body_form{
        padding:1% 5%;
        text-align:center;
    }
    </style>
</head>
<body class="body_form">
<marquee behavior="" direction="left" style="font-size:25px;">WELCOME TO MINDBOOK. THANK U FOR VISITING.</marquee>
<div class="div_form">
    

    <div style="color:blue;font-size:35px;">
      --  MINDBOOK  --
    </div><br>
    <img src="/images/2.jpg" alt="" style="width:150px;height:150px;"><br>
    <div style="color:blue;font-size:16px;">
      Developed By : RK Rajib Khan 
    </div><br><br> <span style="color:blue;"></span>
    <p style="font-size:16px;">It is a simple <span style="color:blue;">social networking website</span> like <span style="color:blue;">facebook</span> 
    that allows registered users to <span style="color:blue;">create profiles</span>, share posts to others, upload <span style="color:blue;">photos</span>, do likes and comments of the posts.
    It is <span style="color:red;">not complete</span> yet. It will be updated <span style="color:blue;">soon</span>.</p>
    <a href="{{Session::get('host_name')}}/mindbook" class="btn btn-success">Start Now</a>
</div>
</body>