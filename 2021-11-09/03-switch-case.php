<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch-Case</title>
</head>
<body>
    <h1>switch-case</h1>
    <h2>wochentage</h2>
    <?php 
    
    $heute = 'Freitag';
    
    switch ($heute) {
        case 'Samstag':
            echo 'Party hard! OOOAh';
            break;
        case 'Sonntag':
            echo 'enjoy your Day, while it lasts';
            break;
        case 'Freitag':
            echo'U did it, U finished the Week!';
            break;
        default:
            echo'This Time of the week sucks Ass';
            break;
    }

    
    
    ?>
    
    <h2>Pruefungsergebnis</h2>
    <?php 
    
    $note = 5;
    switch ($note) {
        case 1:
        case 2:
        case 3:
        case 4:
            $erg= 'bestanden';
            break;
        case 5:
        case 6:
            $erg= 'durchgefallen';
            break;
        case 'keine Wertung';
            $erg = $note;
            break;
        default:
            $erg = 'keine Auswertbate Bedingung gefunden.';
            break;
    }
    echo " <p>Das Ergebnis der Pruefung: <b>$erg</b></p>";

    switch (true) {
        case ($note>=1&&$note<=4):
            $erg= 'bestanden';
            break;
        case ($note>=5&&$note<=6):
            $erg= 'Durchgefallen';
            break;
        case ($note=='keine Wertung');
            $erg = $note;
            break;
        default:
            $erg = 'keine Auswertbate Bedingung gefunden.';
            break;
    }
    echo " <p>Das Ergebnis der Pruefung: <b>$erg</b></p>";
    ?>
</body>
</html>