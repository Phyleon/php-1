<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raumschiffe und Anderes</title>
</head>
<body>
    <h1>Raumschiffe und anderes</h1>
    <?php 
    
    // spaceship operator
    // ergibt -1 wenn a<b, 1 wenn a>b und 0 wenn a=b
    $a = null;
    $b = 9;
    echo $a <=>$b;
    echo '<br>';
    // null coalescing-operator
    // pueft existenz und weist den ersten existierenden wert ungleich null zu
    $c = $h?? $a ?? $b;
    echo $c;

    ?>
</body>
</html>