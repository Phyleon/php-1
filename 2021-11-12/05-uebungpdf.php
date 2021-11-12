<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Uebung Funktionen</h1>
    <h2>Array-Tabelle</h2>
    <?php 
    function array_ausgabe($arr,$rand=false,$farbe='black'){
        
        $ausgabe='<table';
        if ($rand) {
            $ausgabe.=' style="border: 1px solid '.$farbe.';"';
        }
        $ausgabe.='>';
        
        foreach ($arr as $key => $value) {
            $ausgabe.='<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
            
        }
        $ausgabe.='</table>';
        return $ausgabe;
    }
    $arr=[1=>2,2=>3];
    echo array_ausgabe($arr,true,'orange');
    ?>

    <h2>Kugel</h2>
    <?php 
    $a1='';
    $a2='';
   
    
    if (isset($_POST['senden'])) {
       
        $a1=$_POST['a1'];
        $a2=$_POST['a2'];
      
    }
    ?>
    <form action="05-uebungpdf.php" method="post">
    <p>Durchmesser: (in cm) <input type="text" name="a1" value="<?php echo $a1; ?>"></p>
    <p>Material: <select name="a2">
                    <option>Holz</option>
                    <option>Styropor</option>
                    <option>Glas</option>
                    <option>Metall</option>
                    </select>
    </p>
    <input type="submit" value="Absenden" name="senden"></input>
    </form>
    <?php 
    function quantakosta($durch,$material){
        $durch=$durch/100;
        
        $preis=['Holz'=>100,'Styropor'=>20,'Glas'=>250,'Metall'=>175];
        
        if (!array_key_exists($material,$preis )) {
          
            return 'Kein Preis fuer dieses Material vorhanden!';
        }
        $a=4/3*($durch/2)*($durch/2)*($durch/2)*3.1415*$preis[$material]*1.19;
        
        (float)$a=(((int)($a*100)))/100;
        
        return $a;



    }
    if (isset($_POST['senden'])) {
        if (!empty(trim($_POST['a1']))&&isset($_POST['a2'])){
            echo'<p>Das Formular wurde abgesendet, der Preis fuer Ihre Kugel ist incl MWST: '.quantakosta($_POST['a1'],$_POST['a2']).' Euro';
            
        }else{
            echo'Geben Sie bitte jeweils einen Wert fuer Material und Durchmesser an';
    }}   
    ?>
    
    
   
</body>
</html>