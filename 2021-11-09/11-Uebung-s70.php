<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewertung</title>
</head>
<body>
    <h1>Bewertung_Switch</h1>
    <?php 

    for ($i=10; $i >=0 ; $i--) { 
    $punktzahl = $i;
    echo$punktzahl.' Punkte ergeben folgende Bewertung: ';
    switch ($punktzahl) {
        case 10:
            echo'Sehr gut';
            break;
        case 9:
            echo'Gut';
            break;
        case 8:
            echo'Befriedigend';
            break;
        case 7:
            echo'Ausreichend';
            break;
        case $punktzahl<7:
        case 0:
            echo'Leider zu wenig Punkte erreicht';
            break;
        default:
            echo'Punktzahl nicht moeglich.';
            break;
    } 
    echo'<br>';
    }
    
    ?>
</body>
</html>