<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?php echo Session::get('title') ?></title>
    <link rel="shortcut icon" href="/images/mindbook.png" type="image/png">
    <link rel="stylesheet" type="" href="/bstp4/css/bootstrap.css">
    <link rel="stylesheet" href="/bstp4/css/bootstrap.min.css">
    <link rel="stylesheet" type="" href="/bstp3/css/bootstrap.css">
    <link rel="stylesheet" href="/bstp3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mindbook.me.css">
    
    <script src="/bstp3/js/jquery.min.js"></script>
    <script src="/bstp3/js/bootstrap.min.js"></script>
    <script src="/bstp3/js/jquery-3.2.1.min.js"></script>
    <script src="/js/mindbook.me.js"></script>



    <script>
        $(document).ready(function(){
        console.log("message show code->");
        <?php if(Session::get('msg_code') =="success"){ ?>
    
            var temp = '<div class="alert alert-info alert-dismissable" style="background-color:#55d33f;color:white;">'+
                    '<button type="" class="close" data-dismiss="alert"  style="color:white;">&times</button>'+
                    '<?php echo Session::get('msg_text');?>'+
                    '</div>';
            $('body').append(temp);
        
            setTimeout(function(){
            $('.alert').addClass('on');
            },200);
        
        <?php } elseif( Session::get('msg_code') =="fail") { ?>
    
            var temp = '<div class="alert alert-danger alert-dismissable" style="background-color:#ce4942;color:white;">'+
                '<button type="" class="close" data-dismiss="alert" style="color:white;">&times</button>'+
                '<?php echo Session::get('msg_text');?>'+
                '</div>';
             $('body').append(temp);
    
            setTimeout(function(){
            $('.alert').addClass('on');
            },200);
    
        <?php } ?>
    });
    </script>
 </head>  

</html>