<?php
use \App\Http\Controllers\blogController;
Session::put('title','Mindbook');
include "../resources/views/templates/resourcesFile.php";
// if(count($errors)>0){
//   Session::put('msg_overlap_pblm',1);
//   Session::put('msg_code',"fail");
//   Session::put('msg_text',"Failed to sing up !");
//   blogController::reloadME();
// }
?>

<head>
  <style>
  .box{
    margin: auto;
    float:right;
    position:auto;
    padding-right:6%;
    padding-left:2%;
    padding-top:1%;
    padding-bottom:5%;
    width:150%;
    border-left: 5px solid #9b2;
    box-shadow: 0 0 20px rgba(0,0,0,.15);
    background-color:#b6ccef;
  }
  .signup_form{
    padding-left:3%;
    padding-right:3%;
    float:right;
    
  }
  .signupTxt{
    border-bottom: 2px solid black;
    font-size:30px;
    font-weight:bold;
    color:#138906;
  }
  @media only screen and (max-width: 700px){
    .box{
      margin: auto;
      position:auto;
      padding-left:2%;
      padding-top:1%;
      padding-bottom:3%;
      width:100%;
      border-left: 5px solid #9b2;
      border-right: 5px solid #9b2;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
      
    }
    .signup_form{
      float:none;
      width:100%;
    }
    .web_name{
      width:100%;
      padding-left:20%;
    }
  } 
  </style>  
</head>


    
<body style="background-color:white;">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">

  <div class="container-fluid">
    <div class="navbar-header"  style="padding-right:500px;"><a href="{{Session::get('host_name')}}/mindbook" style="color:white;font-size:27px;text-decoration: none;">
    
      <div class="web_name" style=""><img src="/images/mindbook.png" alt="" style="width:40px;height:34px;"> Mindbook</div>
      </a>
    </div>
    
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/login') }}">
    {{ csrf_field() }}
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" required>
        <input type="text" class="form-control" name="password" placeholder="Password" required>
      </div>
      <input type="submit" name="" class="btn btn-primary" value="log in">
    </form>
  </div>

</nav>
@if(count($errors) > 0)

@endif
<br><br>
<div style="float:left">
  <img src="/images/mb_img.png" style="padding-top:30px;width:90%;padding-left:5%;"><br>
  <p style="text-align:center;font-size:25px;font-weight:bold;">Think and share whats are your mind ....</>
</div>
<form method="post" enctype="multipart/form-data" action="{{ URL::to('/signup') }}" class="signup_form">
  {{ csrf_field() }}
  <p class="p_tag"></p>
  <div  class="box">
  <div class="signupTxt">Sign up</div><br>
    <input type="text" name="u_name" value="" class="form-control" placeholder="Full Name" required><br>
    <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
    <input type="text" name="u_password" value="" class="form-control" placeholder="Password" required><br>
    <input type="text" name="u_mobile" value="" class="form-control" placeholder="Mobile Number"required><br>
    <input type="file" name="u_img" value="" class="form-control" required><br>
    <input type="submit" name="" class="btn btn-primary" value="Sign up" style="width:100%;"><br>
    @if(count($errors)>0)
    <p style="color:red;padding-top:10px;">* Failed to sing up. Please check all the information.Maximum image size is 2MB.</p>
    @endif
    
  </div>
</form>
</body>
