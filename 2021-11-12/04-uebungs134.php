<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
    $a1='';
    $a2='';
    $a3='';
    
    if (isset($_POST['senden'])) {
       
        $a1=$_POST['a1'];
        $a2=$_POST['a2'];
        $a3=$_POST['a3'];
    }
    ?>
    <h1>Uebung: Addition mi eingebundener Funktion</h1>
    <p>Bitte geben SIe zwei oder drei Zahlen ein und senden Sie dasd Formular ab</p>
    
    <form action="04-uebungs134.php" method="post">

    <p>Zahl 1: <input type="text" name="a1" value="<?php echo $a1; ?>"></p>
    <p>Zahl 2: <input type="text" name="a2" value="<?php echo $a2; ?>"></p>
    <p>Zahl 4 <i>(optional)</i>: <input type="text" name="a3" value="<?php echo $a3; ?>"></p>
    <input type="submit" value="Absenden" name="senden"></input>
    </form>
    <?php 
    include '04-uebungs134.inc.php';
    if (isset($_POST['senden'])) {
        if (!empty(trim($_POST['a1']))&&!empty(trim($_POST['a2']))&&!empty(trim($_POST['a3']))){
            echo'<p>Das Formular wurde abgesendet, das Ergebnis der...<br>Additon(Zahlen ',$_POST['a1'],',',$_POST['a2'],',',$_POST['a3'],') lautet ';
            echo addiere($_POST['a1'],$_POST['a2'],$_POST['a3']);
        }else   
        if (!empty(trim($_POST['a1']))&&!empty(trim($_POST['a2']))&&empty(trim($_POST['a3']))){
            echo'<p>Das Formular wurde abgesendet, das Ergebnis der...<br>Additon(Zahlen ',$_POST['a1'],',',$_POST['a2'],') lautet ';
            echo addiere($_POST['a1'],$_POST['a2']);
        }else{
            echo'Geben Sie bitte jeweils einen Wert fuer Zahl 1 und Zahl 2 an';
        }   
    }
    
    ?>
</body>
</html>