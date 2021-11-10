<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while_do</title>
</head>
<body>
    <h1>WHile- und DO-While schleifen</h1>
    <?php 
    echo'startwert 1<br><h3>While-Schleife</h3>';
    $zahl=1;
    while($zahl<6)
    {
        echo $zahl.'<br>';
        $zahl++;
    }
    $zahl=1;
    echo'<hr><h3>Do-While-Schleife</h3>';

    do
    {
        echo $zahl.'<br>';
        $zahl++;
    }while($zahl<6);

    echo'startwert 20<br><h3>While-Schleife</h3>';
    $zahl=20;
    while($zahl<6)
    {
        echo $zahl.'<br>';
        $zahl++;
    }
    $zahl=20;
    echo'<hr><h3>Do-While-Schleife</h3>';

    do
    {
        echo $zahl.'<br>';
        $zahl++;
    }while($zahl<6);
    ?>
  
    
</body>
</html>