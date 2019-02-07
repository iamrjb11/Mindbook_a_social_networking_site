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

  <style>
    .outlayer{
     
      background-color:white;
      width:57%;
      height:40%;
      padding:20px;
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
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">


<div class="container-fluid">
  <div class="navbar-header"  style="padding-right:250px;">
    <a class="navbar-brand" href="http://localhost:8000/blog/home" style="font-size: 30px;">My Blogs</a>
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
  {{ csrf_field() }}
    <div class="form-group">
    <div class="dropdown">
      <input type="text" class="form-control" onkeyup="search(this.value);" id="searchTxt" placeholder="Search" style="width:300px;">
     
      <div class="dropdown-content" id="drop_content">
        
      </div>
    </div>
    </div>
  </form>
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="http://localhost:8000/blog/profile?u_id={{Session::get('u_id')}}"><img src="{{ Session::get('u_img') }}" class="img-rounded" style="width:25px;height:25px"> {{Session::get('u_name')}}</a>
        </li>
        <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="http://localhost:8000/blog/home">Home</a>
        </li>
        <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="http://localhost:8000/blog/logout">Log out</a>
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
        <div  style=""><input type="submit" name="" value="Share" class="btn btn-primary" style="width:57%;"></div>
    </form>
</div><br> 
<div id="sts" style="padding-left:250px;">

@foreach($data as $dt)
<br>
  <div class="outlayer">
    <div>
    <img src="{{$dt->user_img}}" class="sts_img">
    <a class="sts_name" href="#">{{$dt->user_name}}</a><p>Time : <span style="color:#767a82">{{ $dt->time}}</span></p>
      
      <p>{{$dt->status}}</p>
    </div><br>
    <div>
      <a href="#"><img src="/images/11.png" alt="" class="sts_like"> <span style="font-size: 20px;padding-top:30px;">Like</span></a>
    </div>
  </div>
  @endforeach

  
</div>

</body>
</html> 