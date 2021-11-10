<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen</title>
</head>
<body>
    <h1>Variablen</h1>
    <?php 
    // Variablen beginnen in PHP mit einem $
    // Bekanntgabe (Deklaration) und Wertzuweisung (Initalisierung)
    $eine_zahl = 5; // Datentyp Integer
    $eine_zeichenkette = 'Hier kommt ein Karton.'; // Datentyp: String
    $werweis = '5';

    // umgang mit zeichenketten
    echo '<h2>'. $eine_zeichenkette . '</h2>';


    echo "<h2>$eine_zeichenkette</h2>";

    echo '<p>Das Ergebnis ist: '. $eine_zahl + $werweis . '</p>';

    echo '<p>'. gettype($eine_zahl) . '<br>';
    echo gettype($eine_zeichenkette). '<br>';
    echo gettype($werweis) . '</p>';
    
    // Automatische Typkonvertierung

    $werweis = 10.5; // double / float

    echo '<p>' . gettype ($werweis) . '</p>';

    // Rechnen mit Variablen

    $a = 2.4;
    $b = '3 Tassen Kaffee';
    $c = '2.5';
    $erg = $a * $c;
    echo "<p> $a mal $c ist gleich $erg .</p> ";
    $preis = $eine_zahl * $b;
    echo "<p> $b kosten $preis Euro.</p> ";

    // Pre Inkrement und Dekrement

    // Inkrement
    $a = 39;
    $b = 2;
    echo "<p>a = $a, b = $b</p>";
    
    ++$a; // Inkrement: ist das selbe wie $a + 1
    --$b; //dekrement: ist das selbe wie $b -1 
   
    echo "<p>a = $a, b = $b</p>";
    $erg = ++$a +$b;
    echo "<p>Das Ergebnis von $a + $b ist <b>$erg</b>.</p>";
    // Post Inkrement
    $a = 39;
    $b = 2;
    $erg = $a++ +$b;
    echo "<p>Das Ergebnis von $a + $b ist <b>$erg</b>.</p>";
    
    // abgekuerzte Addition
    $a = 10 ;
    $a +=5;
    echo "<p>Der Wert vona ist $a </p>";

    // Datentypen konvertieren
    $z1 = '25.8';
    $z2 = '17';
    $z3 = (int)$z2;
    $z4 =(double)$z1;
    $erg = $z3 + $z4;
    
    echo "<p>Das Ergebnis von $z3 + $z4 ist <b>$erg</b>.</p>";
    
    $z5 =(double)$z2;
    $z6=(int)$z1;
    $erg = $z5 + $z6;
    echo "<p>Das Ergebnis von $z5 + $z6 ist <b>$erg</b>.</p>";
    
    ?>


</body>
</html>