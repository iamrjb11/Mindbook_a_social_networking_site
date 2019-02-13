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

//try
$ts = "Nice to * meet you.* Whats up * guyzzzzzz";
$host = explode('*',$ts);
$sv="";

foreach($host as $ht){
  //echo $ht."<br>";
  $sv=$sv.$ht."<br>";
}
//echo $sv;

?>
<head>
<script>

</script>
  <style>

    .outlayer{
     
      background-color:white;
      width:57%;
      height:40%;
      padding:20px;
      border-radius:6px;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    
    
    
    .sts_like{
      width:20px;
      height:20px;
    }
    
    .textarea{
      margin: 0px opx 0px 0px; 
      height: 150px; 
      width: 57%;
      border-radius:5px;
      padding-left:10px;
      padding-top:7px;
      border:1px solid #c5c5c5;
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
      

    }
  </style>
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

  <div class="navbar-header"  style="padding-right:500px">

    
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" >
        <a class="nav-link" href="{{Session::get('host_name')}}/blog/profile?u_id={{Session::get('u_id')}}"><img src="{{ Session::get('u_img') }}" class="img-rounded" style="width:25px;height:25px"> {{Session::get('u_name')}}</a>
        </li>
        <li class="nav-item" >
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

<div style="padding-top:0px;padding-left:5%;padding-right:5%">
    <form method="post" action="{{ URL::to('/blog/create_post') }}">
        {{ csrf_field() }}
        <div style="text-align:left;">
        <div style="font-size:25px;font-weight:bold;">Create a post</div>
        </div>
        <div>
        <textarea rows="5" name="status" onkeypress="onTestChange();" class="textarea" placeholder="What's on your mind ... ? "></textarea>
        </div>
        <div>
        <input type="submit" name="" value="Share" class="mybtn btn-primary"></div>
    </form>
<br> 
<div id="sts" style="">
@foreach($data as $dt)
<br>
  <div class="outlayer">
    <div>
    <img src="{{$dt->user_img}}" class="sts_img">
    <a class="sts_name" href="{{Session::get('host_name')}}/blog/others_profile?other_id={{$dt->user_id}}">{{$dt->user_name}}</a><p>Time : <span style="color:#767a82">{{ $dt->time}}</span></p>
      
      <?php 
        $dt->status= nl2br($dt->status);
      ?>
      <p><?php echo $dt->status; ?></p>
      <table style="background-color:#e9ebee;width:100%" >
        <tr >
          <td ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" style="font-size:20px;"></span> </button></td>
          <td class="table_td">Likes : 0</td>
          <td class="table_td"><a href="{{Session::get('host_name')}}/blog/comments?u_id={{$dt->user_id}}&post_id={{$dt->post_id}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-send" style="font-size:20px;"></span> </a></td>
          <td class="table_td">Comments : {{$dt->comments}}</td>
        </tr>
      </table>
    
    
  </div>
  </div>

  @endforeach

  
</div>

</div>

</body>
</html> 