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
.searchTxt{
      width:290%;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 6px 10px;
      color:black;
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
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">


<div class="container-fluid">

  <div class="navbar-header"  style="padding-right:500px;">
  <a class="navbar-brand" href="{{Session::get('host_name')}}/blog/home" style="font-size:25px;">My Blogs</a>
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
</body>