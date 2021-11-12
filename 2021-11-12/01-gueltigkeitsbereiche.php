<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>gueltigkeitsbereiche</h1>
    <?php 
    $ausgabe = 'ein Brot';
    function doin($n){
        $ausgabe = $n;
        echo '<pre>', var_dump( $ausgabe ), '</pre>';
        $ausgabe = 'noch ein brot';
        echo '<pre>', var_dump( $ausgabe ), '</pre>';
    }

doin($ausgabe);
echo '<pre>', var_dump( $ausgabe ), '</pre>';



    ?>

    <h2>funktionsaufruf per referenz</h2>
    <?php 
    function quadrat($zahl){
        echo"Das Quadrat von $zahl ist: ";
        $zahl*=$zahl;
        echo"$zahl";
        echo"<br>";
    }
    function quadrat_ref(&$zahl){
        echo"Das Quadrat von $zahl ist: ";
        $zahl*=$zahl;
        echo"$zahl";
        echo"<br>";
    }


    $wert = 5;
    
    for ($i=0; $i < 3; $i++) { 
        quadrat($wert);
    }
    
    for ($i=0; $i < 3; $i++) { 
        quadrat_ref($wert);
    }
    echo $wert;
    ?>
</body>
</html>