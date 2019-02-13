<?php

Session::put('title',$data[0]->user_name.' | Settings');


include "../resources/views/templates/resourcesFile.php";

?>
<head>
<style>
.searchTxt{
      width:290%;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 6px 10px;
      color:black;
    }
    .div_form{
      background-color:white;
      width:100%;
      height:60%;
      padding:30px 10%;
      border-radius:6px;
      border-top:2px solid #007bff;
      border-bottom:2px solid #007bff;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    .about_txt{
      background-color:white;
      font-size:25px;
      color:blue;
      width:100%;
      height:200%;
      padding:20px 10%;
      border-left:4px solid #007bff;
      border-radius:6px;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    @media only screen and (max-width: 500px){
      .searchTxt{
        width:100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px 10px;
        color:black;
      }
    }
    
    
</style>
<script>
  

</script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">

  <a class="nav-link" href="{{Session::get('host_name')}}/blog/home" style="padding-left:5%;"><img src="/images/mindbook.png" alt="" class="sts_img"></a>
  <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
    {{ csrf_field() }}
      <div class="form-group">
      <div class="dropdown">
        <input type="text" onkeyup="search(this.value);" class="searchTxt" id="searchTxt" placeholder="Search" >
      
        <div class="dropdown-content" id="drop_content">
          
        </div>
      </div>
      </div>
  </form>
<div class="container-fluid">

  <div class="navbar-header"  style="padding-right:500px;">
  
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/profile?u_id={{Session::get('u_id')}}"><img src="{{ Session::get('u_img') }}" class="img-rounded" style="width:25px;height:25px"> {{Session::get('u_name')}}</a>
        </li>
        <li class="nav-item" style="padding-left:10px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/home">Home</a>
        </li>
        
        <li class="nav-link" style="padding-left:10px;padding-right:60px;padding-top:11px;font-size:16px;">
          <div class="dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" style=""><span class="glyphicon glyphicon-triangle-bottom"></span></a>
            <ul class="dropdown-menu">
              <li class="" ><a class="" href="{{Session::get('host_name')}}/blog/profile?u_id={{Session::get('u_id')}}" style="font-size:14px;color:blue;">{{Session::get('u_name')}}</a></li>
              <li class="divider"></li>
              
              <li><a href="{{Session::get('host_name')}}/blog/about"><span class="glyphicon glyphicon-user"></span> About</a></li>
              <li><a href="{{Session::get('host_name')}}/blog/settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
              <li class="divider"></li>
              <li><a href="{{Session::get('host_name')}}/blog/logout"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
            </ul>
        </div>
      </li>
        
    </ul>
  </div>
  
  
</div>

</nav>




<div style="padding:0px 10%">
<div class="about_txt">
<span class="glyphicon glyphicon-cog"></span> Settings
</div><br>

<div class="div_form">
  <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="{{ URL::to('/blog/change_password') }}">
  {{ csrf_field() }}
      <div class="form-group">
        <label class="control-label col-sm-3" for="email" style="font-size:19px;">Change Password</label>  
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="email">Current Password :</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="email" placeholder="Enter current password" name="cur_pass_txt" value="" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-3" for="live_txt">New Password :</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="live_txt" placeholder="Enter new passsword" name="new_pass_txt" value="">
        </div>
      </div>
    
      <div class="form-group">        
        <div class="col-sm-offset-3 col-sm-9">
          <input type="submit" class="btn btn-success" style="width:100%" value="Change" id="pass_btn">
        </div>
      </div>
  </form>
  <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="{{ URL::to('/blog/change_email') }}">
    {{ csrf_field() }}
        <div class="form-group">
          <label class="control-label col-sm-3" for="email" style="font-size:19px;">Change Email</label>  
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Current Email :</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="email" placeholder="Enter current password" name="email_txt" value="{{$data[0]->user_email}}" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="live_txt">New Email :</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="live_txt" placeholder="Enter new email" name="new_email_txt" value="">
          </div>
        </div>
      
        <div class="form-group">        
          <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" class="btn btn-success" style="width:100%" value="Change">
          </div>
        </div>
  </form>
</div>
</div>
</body>