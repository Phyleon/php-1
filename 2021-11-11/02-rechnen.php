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
  $zahl1='';
  $zahl2='';
  if (isset($_GET['plus']) OR isset($_GET['mal'])) {
    $zahl1=$_GET['zahl1'];
    $zahl2=$_GET['zahl2'];
        $erg=0;
        if (isset($_GET['plus'])) {
            $erg = (float)$_GET['zahl1']+(float)$_GET['zahl2'];
        }else {
            $erg = (float)$_GET['zahl1']*(float)$_GET['zahl2'];
            
        }
        echo'<p>Das Ergebnis lautet: ',$erg,'</p>';
        echo gettype($_GET['zahl1']);
        echo gettype($erg);
    }
    ?>
        <form action="/php/2021-11-11/02-rechnen.php">


<p>Erste Zahl: <input type="number" name="zahl1" value="<?php echo $zahl1; ?>"></p>
<p>Zweite Zahl: <input type="number" name="zahl2" value="<?php echo $zahl2; ?>"></p>
<p>
    <input type="submit" value="+" name="plus">
    <input type="submit" value="x" name="mal">
</p>

</form>
</body>
</html>