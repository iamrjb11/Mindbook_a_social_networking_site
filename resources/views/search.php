<style>


.aa {
    color: red;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
</style>
<div>
    <?php foreach ($data as $dt) { ?>
        <a style="color:#565252;" href="#"><?php echo $dt->user_name; ?></a>
    <?php } ?>
</div>

