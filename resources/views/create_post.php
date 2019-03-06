<?php include "../resources/views/templates/resourcesFile.php";?>

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
    </style>

<div>
<?php foreach($data as $dt){
    $url = Session::get('host_name')."/others_profile?other_id=".$dt->user_id;
    $cmmt_url = Session::get('host_name')."/comments?u_id=".$dt->user_id."&post_id=".$dt->post_id;
    
 ?>
<br>
  <div class="outlayer">
    <div>
    <img src="<?php echo $dt->user_img; ?>" class="sts_img">
    <a class="sts_name" href="<?php echo $url; ?>"><?php echo $dt->user_name; ?></a><p>Time : <span style="color:#767a82"><?php echo $dt->time; ?></span></p>
      
      <?php 
        $dt->status= nl2br($dt->status);
      ?>
      <p><?php echo $dt->status; ?></p>
      <table style="background-color:#e9ebee;width:100%" >
        <tr >
          <td ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up" style="font-size:20px;"></span> </button></td>
          <td class="table_td">Likes : 0</td>
          <td class="table_td"><a href="<?php echo $cmmt_url; ?>" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-send" style="font-size:20px;"></span> </a></td>
          <td class="table_td">Comments : <?php echo $dt->comments; ?></td>
        </tr>
      </table>
    
    
  </div>
  </div>
<?php  } ?>
</div>