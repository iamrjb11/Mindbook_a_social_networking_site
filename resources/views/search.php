<div>
    <?php foreach ($data as $dt) { 
        $url = Session::get('host_name')."/others_profile?other_id=".$dt->user_id;
        
        ?>
        <a style="color:#565252;" href="<?php echo $url; ?>"> <?php echo $dt->user_name; ?> </a>
    <?php } ?>
</div>


