<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--<?php echo '<pre>', var_dump( $_POST ), '</pre>'; ?>  -->
    <h1>Auswertung des Formulars</h1>
    <p>Vielen Dank fuer die Teilnahme an unserer Umfrage. Sie haben folgende Daten uebermittelt: </p>
    <p>
    Vorname: <?php echo $_POST['vn']; ?><br>
    Nachname: <?php echo $_POST['nn']; ?><br>
    Wohnort: <?php echo $_POST['wo']; ?><br>
    Wohnung: <?php echo $_POST['wohnart']; ?><br>
    Beliebte TV-Sendungen: <?php echo implode(", ", $_POST['tv']);?><br>
    
    
    Nachricht:  
        <?php  if(empty(trim($_POST['nachricht']))){
            echo'keine';
        }else {echo nl2br($_POST['nachricht'],false);} ?>
    </p>
    <?php 
    if(isset($_POST['senden'])){}
    
    
    ?>
</body>
</html>