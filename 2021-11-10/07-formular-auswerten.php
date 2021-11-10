<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulare auswerten</title>
</head>
<body>
    <h1>Formular Auswertung</h1>
    <p>folgende Daten wurden uebermittelt:</p>
    <?php 
    echo 
    '<p>'.
    'Vorname: '.$_POST['vorname'].'<br>'.
    'Nachname: '.$_POST['nachname'].'<br>'.
    'Email: '.$_POST['email'].
    '</p>';
    
    ?>
</body>
</html>