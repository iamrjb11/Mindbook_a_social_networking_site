<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
    <form method="post" action="{{ URL::to('/course/show') }}">
    {{ csrf_field() }}
    <input type="text" name="c_name" value="" palceholder="EnterName">
        <input type="text" name="c_age" value="" palceholder="EnterAge">
        <input type="submit" name="btn" value="Submit">
        <div>
            <?php foreach ($data as $dt) { ?>
                <p><?php echo $dt->name; ?></p>
            <?php } ?>
        </div>
    </form>
         
    
    </div>
</body>
</html>