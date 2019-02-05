<?php
Session::put('title','Profile');
include "../resources/views/resourcesFile.php";



?>

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
    <form method="post" style="padding-left:250px;">
        <div>Create a post</div>
        <textarea rows="5" class="form-control" name="description" style="margin: 0px 115px 0px 0px; height: 150px; width: 626px;"></textarea>
        <div  style=""><input type="submit" name="" value="Share" class="btn btn-primary" style="width:56%;"></div>
    </form>
</div>

</body>
</html>