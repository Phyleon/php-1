<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 1. -->
<!--     <?php 
    echo'
    <h1>Maximilian Langenbeck</h1>
    <p>Altonaer Strasse 4 <br>99085 Erfurt <br>mobil:01783260248</p>
    ';
    ?> -->
    <!-- 2. -->
<!--     <?php 
    $info= 'Maximilian Langenbeck';
    echo'<h1>'.$info.'</h1>';
    $info='Altonaer Strasse 4';
    echo'<p>'.$info.'<br>';
    $info='99085 Erfurt';
    echo $info.'<br>';
    $info='mobil:01783260248';
    echo $info.'</p>';
    ?> -->
    <!-- <h1>taschenrechner</h1>
    <?php 
    $a1='';
    $a2='';
    $op='';
    
    if (isset($_POST['senden'])) {
       
        $a1=$_POST['a1'];
        $a2=$_POST['a2'];
        $op=$_POST['op'];
      
    }
    ?>
    <form action="01-Uebung.php" method="post">
    <p>Zahl 1 <input type="text" name="a1" value="<?php echo $a1; ?>"></p>
    <p>Zahl 2<input type="text" name="a2" value="<?php echo $a2; ?>"></p>
    <p>Operator<input type="text" name="op" value="<?php echo $op; ?>"></p>
    <input type="submit" value="Absenden" name="senden"></input>
    </form> -->

    <!-- <h1>Kreisberechnungen</h1>
    <?php 
    $a1='';
    $pi=pi();
    if (isset($_POST['senden'])) {
       
        $a1=$_POST['a1'];
    }
    ?>
    <form action="01-Uebung.php" method="post">
    <p>Radius <input type="text" name="a1" value="<?php echo $a1; ?>"></p>
    <input type="submit" value="Absenden" name="senden"></input>
    </form>

    <?php 
    if (isset($_POST['senden'])) {
        if (!empty(trim($_POST['a1']))){
            echo'<p>Das Formular wurde abgesendet, die Flaeche des Kreises mit dem radius <b>'.$a1.'</b> ist: '.($a1*$a1*$pi).' und der Umfang ist: '.($a1*2*$pi).'</p>';
            
        }else{
            echo'Geben Sie bitte einen Wert fuer den Radius ein';
    }}   
    ?> -->

    <!-- <h1>KGV</h1>
    <?php 
    $a1='';
    $a2='';

    if (isset($_POST['senden'])) {  
        $a1=$_POST['a1'];
        $a2=$_POST['a2'];
    }
    ?>
    <form action="01-Uebung.php" method="post">
    <p>Zahl 1 <input type="text" name="a1" value="<?php echo $a1; ?>"></p>
    <p>Zahl 2 <input type="text" name="a2" value="<?php echo $a2; ?>"></p>
    <input type="submit" value="Absenden" name="senden"></input>
    </form>
    <?php 
    if (isset($_POST['senden'])) {
        if (!empty(trim($_POST['a1']))&&!empty(trim($_POST['a2']))){
         
            function kgv($a1,$a2){
                if ($a1==$a2){return $a1;} 
                $sn=$a1<$a2?$a1:$a2;
                $bn=$a1>$a2?$a1:$a2;
                for ($i=1; $i <= $sn ; $i++) { 
                    if(($bn*$i)%$sn==0){
                        return $bn*$i;
                    }
                }   
            }
            echo'KGV lautet: '.kgv($a1,$a2);
        }else{
            echo'Bitte geben sie zwei werte an';
        }}
    ?> -->
<!--     <?php 
    $kl=15;
    $block=[100,200,50];
    $rest=[];
    $count=1;
    $wieviel=0;
    $a=0;
    foreach ($block as $value) {
      array_push($rest, ($value%$kl));
    }
    echo '<pre>', var_dump( $rest ), '</pre>';
    
    for ($i=0; $i <= 2 ; $i++){
        $count=$count*(($block[$i]-$rest[$i])/$kl);
    }
    echo'anzahl wuerfel pro block: '. $count;
    echo'<br>'
;    while ($a < 1000) {
        $wieviel++;
        $a+=$count;
    }
    echo'Anzahl Bloecke fuer 1000 stueck: '. $wieviel
    ?> -->
    <?php 
   
    function teppich($d,$mat){

    } ?>


</body>
</html>