<?php
Session::put('title','My Blog');
include "../resources/views/templates/resourcesFile.php";


?>
<head>
  <style>
  .box{
    margin: auto;
    float:right;
    padding-right:70px;
    padding-left:20px;
    padding-top:20px;
    padding-bottom:20px;
    width:40%;
    border-left: 5px solid #9b2;
    box-shadow: 0 0 20px rgba(0,0,0,.15);
  }
  .signupTxt{
    border-bottom: 2px solid black;
    font-size:30px;
    font-weight:bold;
    color:#f08080;
  }
  </style>  
</head>


    
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">

  <div class="container-fluid">
    <div class="navbar-header"  style="padding-right:500px;">
    
      <a class="navbar-brand" href="#" style="padding-bottom:20px;"><img src="/images/22.png" alt="" style="width:40px;height:40px;"> </a>
      <a class="navbar-brand" href="#" style="font-size:30px;">My Bolg</a>
    </div>
    
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
    {{ csrf_field() }}
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" required>
        <input type="text" class="form-control" name="password" placeholder="Password" required>
      </div>
      <input type="submit" name="" class="btn btn-primary" value="log in">
    </form>
  </div>

</nav><br><br>
<div style="float:left">
  <img src="/images/23.png" style="padding-top:30px;width:100%;"><br>
  <p style="text-align:center;font-size:25px;font-weight:bold;">Think and write whats are your mind ....</>
</div>
<form method="post" enctype="multipart/form-data" action="{{ URL::to('/blog/signup') }}">
  {{ csrf_field() }}
  <div  class="box">
  <div class="signupTxt">Sign up</div><br>
    <input type="text" name="u_name" value="" class="form-control" placeholder="Full Name" required><br>
    <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
    <input type="text" name="u_password" value="" class="form-control" placeholder="Password" required><br>
    <input type="text" name="u_mobile" value="" class="form-control" placeholder="Mobile Number"required><br>
    <input type="file" name="u_img" value="" class="form-control" required><br>
    <input type="submit" name="" class="btn btn-primary" value="Sing up">
  </div>
</form>
</body>
