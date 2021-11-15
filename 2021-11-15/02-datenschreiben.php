<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>In eine Datei schreiben</h1>
    <?php 
    $datei  = 'bestellung.csv';

    $tkopf = file_exists($datei);

    $mtype= mime_content_type($datei);

    if($mtype !== 'text/plain'){
        echo "Die Datei <b>$datei<b> vom Typ $mtype kann nicht zum lesen geoeffnet werden";
        die('Das Progamm wird geschlossen');
    }

    $fh=fopen($datei,'a');
    if (!$fh) {
        echo"<p>Die Datei <b>$datei</b> konnte icht geoeffnet werden.</p>";
        die('<p>Das Programm wird geschlossen.</p>');
    }

    if (!$tkopf) {
        fwrite($fh, "Name;Vorname;Ort;Anschrift;PLZ\r\n");
    }
    $k_name = 'Duck';
    $k_vorname='Donald Fountleroy';
    $k_ort = 'Entenhausen';
    $k_anschrift = 'Hauptstrasse';
    $k_zip = '12345';

    $inhalt = "$k_name ;$k_vorname;$k_ort;$k_anschrift;$k_zip\r\n";

    if(fwrite($fh, $inhalt)){
        echo 'Folgende Daten wurden gespeichert:<br>';
        echo "$k_name <br>$k_vorname<br>$k_ort $k_anschrift $k_zip";
    }else{
        echo'Das Schreiben der Daten ist fehlgeschlagen.';
    }
    
    fclose($fh);
    ?>

    <h2>alles aufeinmal</h2>
    <?php 
    $datei = 'text.txt';
    file_put_contents($datei,"Daten fuer Zeile 1\r\n",FILE_APPEND);
    file_put_contents($datei,"Daten fuer Zeile 2\r\n",FILE_APPEND);
    
    ?>
</body>
</html>