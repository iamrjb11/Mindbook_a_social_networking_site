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
    .p_tag{
      width:100%;
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
    .icon{
        padding-left:5%;
    }
    .sts_name{
      font-size:20px;
      
    }
    .comment_sts_name{
      font-size:14px;
      
    }
    .comment_sts_img{
      width:30px;
      height:30px;
    }
    
    
    .sts_like{
      width:20px;
      height:20px;
    }
    
    .textarea{
      margin: 0px opx 0px 0px; 
      height: 50px; 
      width: 100%;
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
      .table_td{
        padding:0px 0px;
    }
    .nav-item{
        padding-left:10%;
    }

    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
<a class="icon" href="{{Session::get('host_name')}}/blog/home" ><img src="/images/mindbook.png" alt="" class="sts_img"></a>
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

<br> 
<div id="sts" style="padding:0px 20%">

    <br>
    <div class="outlayer">
    <div>
        <img src="{{$data[0]->user_img}}" class="sts_img">
        <a class="sts_name" href="{{Session::get('host_name')}}/blog/others_profile?other_id={{$data[0]->user_id}}">{{$data[0]->user_name}}</a><p>Time : <span style="color:#767a82">{{ $data[0]->time}}</span></p>
        
        <?php 
            $data[0]->status= nl2br($data[0]->status);
        ?>
        <p><?php echo $data[0]->status; ?></p>
        <table style="background-color:#e9ebee;width:100%" >
            <tr >
            <td ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" style="font-size:20px;"></span> </button></td>
            <td class="table_td">Likes : 0</td>
            <td class="table_td"><a href="{{Session::get('host_name')}}/blog/comments?post_id={{$data[0]->post_id}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-send" style="font-size:20px;"></span> </a></td>
            <td class="table_td">Comments : {{$num_cmnt[0]->sum}}</td>
            </tr>
        </table><br>
        <form method="post" action="{{ URL::to('/blog/create_comment') }}">
        {{ csrf_field() }}  
        
            <textarea rows="" cols="" name="cmnt_txt" class="textarea" placeholder="Write your comment ..."></textarea><br> 
            <input type="submit" name="" class="btn btn-success" value="Commet" style="width:100%;">
        </form>
        
        
    </div>
    </div><br>
    <div class="outlayer">
    @foreach($cmnts as $ct)
    <div>
        <img src="{{$ct->user_img}}" class="comment_sts_img">
        <a class="comment_sts_name" href="{{Session::get('host_name')}}/blog/others_profile?other_id={{$ct->user_id}}">{{$ct->user_name}}</a><p style="font-size:12px;">Time : <span style="color:#767a82">{{ $ct->comment_time}}</span></p>
        
        <?php 
            $ct->comment = nl2br($ct->comment_text);
        ?>
        <p><?php echo $ct->comment_text; ?></p>
    </div>
    <p class="p_tag"></p>
    @endforeach

    </div>


  
</div>

</body>