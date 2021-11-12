<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Uebung:Berechnungen mithilfe von Funktionen</h1>
    <?php  
    function addiere($a1,$a2,$a3=0){
        return $a1+$a2+$a3; 
    }
    function multipizieren($a1,$a2,$a3=1){
        return $a1*$a2*$a3; 
    }
    echo'<p>Berechnungen: addiere(8,4,2) -->';
    echo addiere(8,4,2);
    echo'<br>Berechnungen: multiplizieren(8,4,2) -->';
    echo multipizieren(8,4,2);
    echo'<br>Berechnungen: addiere(8,4) -->';
    echo addiere(8,4);
    echo'<br>Berechnungen: multiplizieren(8,4) -->';
    echo multipizieren(8,4);
    echo'</p>';
    
    ?>
</body>
</html>