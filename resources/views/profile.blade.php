<?php
Session::put('title','Profile');
include "../resources/views/resourcesFile.php";



?>
<head>
  <style>
    .outlayer{
     
      background-color:white;
      width:56%;
      height:80%;
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
  </style>
</head>

<body style="background-color:#e9ebee;">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">


<div class="container-fluid">
  <div class="navbar-header"  >
    <a class="navbar-brand" href="#">My Blogs</a>
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
  {{ csrf_field() }}
    <div class="form-group">
      <input type="text" class="form-control" name="searchTxt" placeholder="Search">
    </div>
    <input type="submit" name="" class="btn btn-primary" value="Search">
  </form>
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="#"><img src="/images/color.JPG" class="img-rounded" style="width:25px;height:25px"> Name</a>
        </li>
        <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="#">Log out</a>
        </li>
    </ul>
  </div>
  
  
</div>

</nav>

<div>
    <form method="post" action="{{ URL::to('/blog/create_post') }}" style="padding-left:250px;">
        {{ csrf_field() }}
        <div>Create a post</div>
        <textarea rows="5" class="form-control" name="status" style="margin: 0px 115px 0px 0px; height: 150px; width: 626px;" placeholder="What's on your mind ... ? "></textarea>
        <div  style=""><input type="submit" name="" value="Share" class="btn btn-primary" style="width:56%;"></div>
    </form>
</div><br> <br>
<div id="sts" style="padding-left:250px;">
  <div class="outlayer">
    <div>
    <img src="/images/color.JPG"  class="sts_img">
    <a class="sts_name" href="#"> Name</a><p>Time : 10:50pm , 06-Feb-2019</p>
      
      <p>RK, we want to make sure you know about Privacy Checkup, which helps you review the privRK, we want to make sure you know about Privacy Checkup, which helps you review the privRK, we want to make sure you know about Privacy Checkup, which helps you review the privRK, we want to make sure you know about Privacy Checkup, which helps you review the privacy of your posts, apps and some profile info. You can review this information anytime</p>
    </div><br>
    <div>
      <a href="#"><img src="/images/11.png" alt="" class="sts_like"> <span style="font-size: 20px;padding-top:30px;">Like</span></a>
    </div>
  </div>
  
</div>

</body>
</html> 