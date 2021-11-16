<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Umfrage mit Gewinnspiel</h1>
    <p>Wir freuen uns, dass Sie an unserer kleinen Umfrage zu unserer Website teilnehmen! Unter allen Teilnehmern verlosen wir drei Praesentkoerbe.</p>
    <form action="03-uebungs150.php" method="post">
    <p>Vorname und Nachname <input type="text" name="name"></p>
    <p>Strasse <input type="text" name="strasse"></p>
    <p>PLZ und Ort <input type="text" name="ort"></p>
    <p><b>Bitte waehlen Sie die Antwort aus, die fuer Sie am ehesten zutrifft:</b></p>
    <p style="background-color:darkgrey">Wie gefaellt Ihnen unser Internetangebot?<br>
        <input type="radio" name="f1" value="n1"> sehr gut<br>
        <input type="radio" name="f1" value="n2"> gut<br>
        <input type="radio" name="f1" value="n3">nicht so gut<br>
        <input type="radio" name="f1" value="n4"> gar nicht
    </p>
    <p style="background-color:grey">Wie beurteilen Sie den Informationsgehalt unserer Website?<br>
        <input type="radio" name="f2" value="n1"> sehr informativ<br>
        <input type="radio" name="f2" value="n2"> die eine oder andere Information fehlt<br>
        <input type="radio" name="f2" value="n3"> es fehlen sehr viele wichtige Informationen
    </p>
    <p style="background-color:lightgrey">Wie kommen Sie mit dem Bestellsystem zurecht?<br>
        <input type="radio" name="f3" value="n1"> sehr gut<br>
        <input type="radio" name="f3" value="n2"> gut<br>
        <input type="radio" name="f3" value="n3"> nicht besonders gut<br>
        <input type="radio" name="f3" value="n4"> gar nicht
    </p>
    <p>Moechten Sie uns noch etwas mitteilen?<textarea name="text" cols="30" rows="1"></textarea></p>
    <p><input type="submit" value="Abschicken" name="senden"></p>
    </form>
    <?php 
    if (isset($_POST['senden'])) {
    $datei  = 'umfrage_daten.csv';

    $tkopf = file_exists($datei);
    if ($tkopf){

    $mtype= mime_content_type($datei);
    
     if($mtype !== 'text/plain'){
        echo "Die Datei <b>$datei<b> vom Typ $mtype kann nicht zum lesen geoeffnet werden";
        die('Das Progamm wird geschlossen');
    }}

    $fh=fopen($datei,'a');
    if (!$fh) {
        echo"<p>Die Datei <b>$datei</b> konnte icht geoeffnet werden.</p>";
        die('<p>Das Programm wird geschlossen.</p>');
    }

    if (!$tkopf) {
        fwrite($fh, "Name;Strasse;Ort;Frage1;Frage2;Frage3;Text\r\n");
    }
    
    
    foreach ($_POST as $key => $value) {
        if (empty(trim($value))) {
            $_POST[$key]='keine Angabe';
        }
    }
    for ($i=1; $i < 4; $i++) { 
       if (!isset($_POST['f'.$i])) {
          $_POST['f'.$i]='keine Angabe'; 
       }
    }
    
    $name = $_POST['name'];
    $strasse = $_POST['strasse'];
    $ort = $_POST['ort'];
    $f1 = $_POST['f1'];
    $f2 = $_POST['f2'];
    $f3 = $_POST['f3'];
    $text = $_POST['text'];

    $inhalt = "$name ;$strasse;$ort;$f1;$f2;$f3;$text\r\n";
   
    if(fwrite($fh, $inhalt)){
        echo 'Folgende Daten wurden gespeichert:<br>';
        echo "$name ;$strasse;$ort;$f1;$f2;$f3;$text";
    }else{
        echo'Das Schreiben der Daten ist fehlgeschlagen.';
    }
    
    fclose($fh);}
    ?>
</body>
</html>