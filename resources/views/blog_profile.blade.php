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
    .textarea{
      height: 150px; 
      width: 100%;
      border-radius:5px;
      padding-left:10px;
      padding-top:7px;
      border:1px solid #c5c5c5;
    }
    .p_tag{
      width:700px;
      height:2px;
      background-color:#007bff;
    }
    .outlayer{
     
      background-color:white;
      width:100%;
      height:40%;
      padding:20px;
      border-radius:6px;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    .info_layer{
      background-color:white;
      width:400px;
      height:40%;
      padding:20px;
      border:2px solid #007bff;
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
    .pro_pic{
      width:300px;
      height:300px;
      border-radius:6px;
      border:2px solid #007bff;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    
    .sts_like{
      width:20px;
      height:20px;
    }
    .float_right_container{
      float:right;
      padding-left:5%;
      padding-right:5%;
    }
    @media only screen and (max-width: 500px){
      .searchTxt{
        width:100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px 10px;
        color:black;
      }
      .dropdown {
        padding-left:10%;
      }
      .dropdown-content{
        min-width: 100%;
      }
      .textarea{
        width: 100%;
      }
      .mybtn{
        width:100%;
      }
      .outlayer{
        width:100%;
      }
      .p_tag{
        width:100%;
      }
      .float_right_container{
        float:left;
      }
}
  </style>
</head>

<body style="background-color:#e9ebee;">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">


<div class="container-fluid">

  <div class="navbar-header"  style="padding-right:600px;">
  <a class="navbar-brand" href="{{Session::get('host_name')}}/blog/home" style="font-size:25px;">My Blogs</a>
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
  {{ csrf_field() }}
    <div class="form-group">
    <div class="dropdown">
      <input type="text" class="form-control" onkeyup="search(this.value);" id="searchTxt" placeholder="Search" style="width:300%;">
     
      <div class="dropdown-content" id="drop_content">
        
      </div>
    </div>
    </div>
  </form>
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/profile?u_id={{Session::get('u_id')}}"><img src="{{ Session::get('u_img') }}" class="img-rounded" style="width:25px;height:25px"> {{Session::get('u_name')}}</a>
        </li>
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/home">Home</a>
        </li>
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/logout">Log out</a>
        </li>
    </ul>
  </div>
  
  
</div>

</nav>
<div style="float:left;padding-left:5%;">
    <div style="padding-left:12%;">
    <img src="{{$data[0]->user_img}}" class="pro_pic">
    </div><br>
    <div class="info_layer">
      <p style="color:black;font-size:25px;font-weight:bold;">{{Session::get('u_name')}}</p>
      <p><span class="glyphicon glyphicon-briefcase"></span> Studied B.Sc in Computer Science & Engineering (CSE) at <span style="color:blue;">Khulna University</span></p>
      <p><span class="glyphicon glyphicon-book"></span> Studied HSC in Science at <span style="color:blue;">BN Collage</span></p>
      <p><span class="glyphicon glyphicon-book"></span> Studied SSC Science at <span style="color:blue;">Rotary School, Khulna</span></p>
      <p><span class="glyphicon glyphicon-home"></span> Lives in <span style="color:blue;">Khulna</span></p>
      <p><span class="glyphicon glyphicon-phone"></span> +88 <span style="color:blue;"> 01778338429</span></p>
      <p><span class="glyphicon glyphicon-envelope"></span> <span style="color:blue;">iamrjb@gmail.com</span></p>
    </div>
    

</div>
<div class="float_right_container">

    <div>
        <form method="post" action="{{ URL::to('/blog/create_post') }}">
        {{ csrf_field() }}
        <p value="" class="p_tag"></p>
        <div style="text-align:left;">
          <div style="font-size:25px;font-weight:bold;">Create a post</>
        </div>
        <div>
          <textarea rows="5" name="status" class="textarea" placeholder="What's on your mind ... ? "></textarea>
        </div>
        <div>
          <input type="submit" name="" value="Share" class="btn btn-primary">
        </div>
    
        </form>
    </div>

</div>
<br> 
<div id="sts" style="">
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