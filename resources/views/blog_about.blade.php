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
              <li class="dropdown-header" style="font-size:14px;color:blue;">{{Session::get('u_name')}}</li>
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
<span class="glyphicon glyphicon-user"></span> About
</div><br>
<div class="div_form">
  <form class="form-horizontal" action="/action_page.php">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Full Name :</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Full Name" name="name_txt">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Lives in :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" placeholder="Enter city name" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Contact Number :</label>
        <div class="col-sm-2" >
          <input type="text" class="form-control" id="email" placeholder="" name="email" value="BD | +88" readonly>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="email" placeholder="Enter mobile number" name="email">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for="email">University Info :</label>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">University Name :</label>
        
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="University Name " name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Department Name :</label>
        
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="Department Name" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Degree Name :</label>
        
        <div class="col-sm-8">
          <select class="form-control">
            <option>--- Select ---</option>
            <option>B.Sc</option>
            <option>BA</option>
            <option>Honours</option>
            <option>M.Sc</option>
            <option>PHD</option>
          </select>
        </div>
      </div>



      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Collage Info :</label>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Collage Name :</label>
        
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="Collage Name " name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Group :</label>
        
        <div class="col-sm-8">
          <select class="form-control">
            <option>--- Select ---</option>
            <option>Science</option>
            <option>Commerce</option>
            <option>Arts</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Degree Name :</label>
        
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="" name="email" value="HSC" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">School Info :</label>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">School Name :</label>
        
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="School Name " name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Group :</label>
        
        <div class="col-sm-8">
          <select class="form-control">
            <option>--- Select ---</option>
            <option>Science</option>
            <option>Commerce</option>
            <option>Arts</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="email">Degree Name :</label>
        
        <div class="col-sm-8">
          <input type="email" class="form-control" id="email" placeholder="" name="email" value="SSC" readonly>
        </div>
      </div>
      
     <br>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" style="width:100%">Save</button>
        </div>
      </div>
  </form>
</div>
</div><br><br>
</body>