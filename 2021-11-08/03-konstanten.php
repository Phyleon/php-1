<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konstanten</title>
</head>
<body>
    <h1>Konstanten</h1>
    <?php 
    // Konstanten definieren und initialisieren
    // standard variante
    define('MWST',0.19); // (name,wert,notcasesensetive)

    echo '<p>Die Mehrwertsteuer in Deutschland betraegt aktuell '. (MWST *100) .'%.</p>';
// alnernativ
const PI = 3.1415;
echo 'PI = '. PI. '' ;
    
    ?>
</body>
</html>