<?php
Session::put('title','Blog');
include "../resources/views/resourcesFile.php";


?>


    
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">

  <div class="container-fluid">
    <div class="navbar-header"  style="padding-right:500px;">
      <a class="navbar-brand" href="#">My Blogs</a>
    </div>
    
    <form class="navbar-form navbar-left" method="post" action="{{ URL::to('/blog/login') }}">
    {{ csrf_field() }}
      <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email">
        <input type="text" class="form-control" name="password" placeholder="Password">
      </div>
      <input type="submit" name="" class="btn btn-primary" value="log in">
    </form>
  </div>

</nav>
<div style="float:left">
  <img src="/images/color.JPG">
</div>
<form method="post" action="{{ URL::to('/blog/signup') }}">
  {{ csrf_field() }}
  <div  style="float:right;padding-right:50px;width:450px;">
    <input type="text" name="u_name" value="" class="form-control" placeholder="Full Name"><br>
    <input type="text" name="u_email" value="" class="form-control" placeholder="Email"><br>
    <input type="text" name="u_password" value="" class="form-control" placeholder="Password"><br>
    <input type="text" name="u_mobile" value="" class="form-control" placeholder="Mobile Number"><br>
    <input type="submit" name="" class="btn btn-primary" value="Sing up">
  </div>
</form>
</body>
