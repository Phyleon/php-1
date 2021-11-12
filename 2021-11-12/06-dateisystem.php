<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbeiten mit dem Dateisystem</title>
</head>
<body>
    <h1>Arbeiten mit dem Dateisystem</h1>
    <h2>Oeffnen, Lesen, Schliessen</h2>
    <?php 
    $datei = 'protokoll.txt';
    if(is_file($datei)){
        
        $fh = fopen($datei,'r');

        if(false !== $fh){
            while (!feof($fh)) {
               echo fgets($fh).'<br>';
            }
            //BItte schliessen nicht vergessen
            fclose($fh);

        }else{
            echo'unbekannter Fehler';
        }
    
    }else{
        echo'Die Datei '.$datei.' ist keine Datei!';
    }
    
    ?>


<h2>eine bestimmte Zeile lesen</h2>



<?php 
if(is_file($datei)){
        
    $fh = fopen($datei,'r');

    if(false !== $fh){

        fseek($fh, 10);
        echo fgets($fh);
        echo'<br>';
        $i=0;
        while (!feof($fh)) {
            $i++;
            if ($i !==2){fgets($fh);continue;}
            else{echo fgets($fh);}
           
        }
        //BItte schliessen nicht vergessen
        fclose($fh);

    }else{
        echo'unbekannter Fehler';
    }

}else{
    echo'Die Datei '.$datei.' ist keine Datei!';
}

?>
</body>
</html>