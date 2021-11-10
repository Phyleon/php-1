<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>match</title>
</head>
<body>
    <h1>match</h1>
    <?php 
    
    
    $status = 200;
    $erg = match($status){
        200,300 => null,
        400=>'not found',
        500=>'server error',
        default  =>'unknown status code'
    };
    
    ?>
</body>
</html>