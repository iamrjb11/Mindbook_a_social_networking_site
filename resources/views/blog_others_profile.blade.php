<?php

Session::put('title',$others_info[0]->user_name.' | Profile');

include "../resources/views/templates/resourcesFile.php";



?>
<head>

  <style>
    .mybtn{
      width:100%
    }
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
    .float_left_container{
      float:left;
      padding-left:5%;
    }
    .pro_pic_layer{
      padding-left:12%;
    }
    .searchTxt{
      width:290%;
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 6px 10px;
      color:black;
    }
    @media only screen and (max-width: 1300px){
      .p_tag{
        width:600px;
      }
    }
    @media only screen and (max-width: 1200px){
      .p_tag{
        width:450px;
      }
    }
    @media only screen and (max-width: 1100px){
      .p_tag{
        width:400px;
      }
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
        width:100%;
      }
      .float_left_container{
        padding-left:3%;
        padding-right:3%;
      }
      .pro_pic_layer{
        text-align:center;
        padding-left:0%;
      }
      .pro_pic{
      width:250px;
      height:250px;
      border-radius:6px;
      border:2px solid #007bff;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
    }
    .info_layer{
      width:100%;
      
    }
}
  </style>
</head>

<body style="background-color:#e9ebee;">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">


<div class="container-fluid">
<a class="nav-link" href="{{Session::get('host_name')}}/home" style="padding-left:5%;"><img src="/images/mindbook.png" alt="" style="width:40px;height:30px;"></a>
<form class="navbar-form navbar-left" method="post" action="{{ URL::to('/login') }}">
    {{ csrf_field() }}
      <div class="form-group">
      <div class="dropdown">
        <input type="text" onkeyup="search(this.value);" class="searchTxt" id="searchTxt" placeholder="Search" >
      
        <div class="dropdown-content" id="drop_content">
          
        </div>
      </div>
      </div>
  </form>

  <div class="navbar-header"  style="padding-right:500px;">
  
  </div>
  
  <div>
    <ul class="navbar-nav">
        <li class="nav-item" style="padding-left:20px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/profile?u_id={{Session::get('u_id')}}"><img src="{{ $data[0]->user_img }}" class="img-rounded" style="width:25px;height:25px"> {{$data[0]->user_name}}</a>
        </li>
        <li class="nav-item" style="padding-left:10px;">
        <a class="nav-link" href="{{Session::get('host_name')}}/home">Home</a>
        </li>
        
        <li class="nav-link" style="padding-left:10px;padding-right:60px;padding-top:11px;font-size:16px;">
          <div class="dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" style=""><span class="glyphicon glyphicon-triangle-bottom"></span></a>
            <ul class="dropdown-menu">
              <li class="" ><a class="" href="{{Session::get('host_name')}}/profile?u_id={{Session::get('u_id')}}" style="font-size:14px;color:blue;">{{$data[0]->user_name}}</a></li>
              <li class="divider"></li>
              
              <li><a href="{{Session::get('host_name')}}/about"><span class="glyphicon glyphicon-user"></span> About</a></li>
              <li><a href="{{Session::get('host_name')}}/settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
              <li class="divider"></li>
              <li><a href="{{Session::get('host_name')}}/logout"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
            </ul>
        </div>
      </li>
        
    </ul>
  </div>
  
  
</div>

</nav>
<div class="float_left_container">
    <div class="pro_pic_layer">
    <img src="{{$others_info[0]->user_img}}" class="pro_pic">
    </div><br>
    <div class="info_layer">
      <p style="color:black;font-size:25px;font-weight:bold;">{{$others_info[0]->user_name}}</p>
      @if($others_info[0]->versity_name !="")
        <p><span class="glyphicon glyphicon-education"></span> Studied 
        @if($others_info[0]->versity_degree !="")
          @if($others_info[0]->versity_degree =="BSc")
            B.Sc
          @elseif($others_info[0]->versity_degree =="MSc")
            M.Sc
          @else
            {{$others_info[0]->versity_degree}} 
          @endif
        @endif
        @if($others_info[0]->collage_group !="")
          in {{ $others_info[0]->versity_department}}
        @endif
        at <span style="color:blue;">{{ $others_info[0]->versity_name}}</span></p>
      @endif

      @if($others_info[0]->collage_name !="")
        <p><span class="glyphicon glyphicon-education"></span> Studied HSC 
        @if($others_info[0]->collage_group !="")
          in {{$others_info[0]->collage_group}} 
        @endif
        at <span style="color:blue;">{{$others_info[0]->collage_name}}</span></p>
      @endif

      @if($others_info[0]->school_name !="")
        <p><span class="glyphicon glyphicon-education"></span> Studied SSC 
        @if($others_info[0]->school_group !="")
            in {{$others_info[0]->school_group}} 
        @endif
        at <span style="color:blue;">{{$others_info[0]->school_name}}</span></p>
      @endif

      @if($others_info[0]->live !="")
        <p><span class="glyphicon glyphicon-home"></span> Lives in <span style="color:blue;"> {{ $others_info[0]->live}}</span></p>
      @endif

      @if($others_info[0]->user_mobile !="")
        <p><span class="glyphicon glyphicon-phone"></span> +88 <span style="color:blue;"> {{ $others_info[0]->user_mobile}}</span></p>
      @endif

      
      <p><span class="glyphicon glyphicon-envelope"></span> <span style="color:blue;">{{ $others_info[0]->user_email}}</span></p>
    
      
    </div>
    

</div>
<div class="float_right_container">

<p value="" class="p_tag"></p>


<br> 
<div id="sts" style="">
@foreach($others_info as $dt)
<br>
  <div class="outlayer">
    <div>
    <img src="{{$dt->user_img}}" class="sts_img">
    <a class="sts_name" href="{{Session::get('host_name')}}/others_profile?other_id={{$dt->user_id}}">{{$dt->user_name}}</a><p>Time : <span style="color:#767a82">{{ $dt->time}}</span></p>
      
      <?php 
        $dt->status= nl2br($dt->status);
      ?>
      <p><?php echo $dt->status; ?></p>
      <table style="background-color:#e9ebee;width:100%" >
        <tr style="padding:0px 0px;">
          <td style="padding:0px 0px;"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" style="font-size:20px;"></span> </button></td>
          <td style="padding:0px 5%;">Likes : {{$dt->likes}}</td>
          <td style="padding:0px 5%;"><a href="{{Session::get('host_name')}}/comments?u_id={{$dt->user_id}}&post_id={{$dt->post_id}}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-send" style="font-size:20px;"></span> </a></td>
          <td style="padding:0px 5%;">Comments : {{$dt->comments}}</td>
        </tr>
      </table>
    
    
  </div>
  </div>
  @endforeach

  
</div>


</div>

</body>
</html> 