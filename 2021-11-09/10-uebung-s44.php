<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buero</h1>
    <?php 
    
    $bezeichunng_tisch = 'Schreibtisch';
    $bezeichunng_stuhl = 'Buerostuhl';
    $bezeichunng_lampe = 'Schreibtischlampe';
    $bezeichunng_pctisch = 'Computertisch';
    $preis_tisch = 1999.00;
    $preis_stuhl = 589.00;
    $preis_lampe = 29.00;
    $preis_pctisch = 999.00;
    $netto_gesamt;
    const MWST = 0.19;
    const EURO = ' €';
    $netto_gesamt = $preis_tisch + $preis_stuhl + $preis_lampe + $preis_pctisch;
    $brutto_gesamt = $netto_gesamt *(1+ MWST);
    echo
    '<p>'.
    'Netto-Gesamtpreis der eigekauften Artikel: '.$netto_gesamt.EURO.'<br>'.
    'Brutto-Gesamtpreis der eigekauften Artikel: '.$brutto_gesamt.EURO.'<br><hr>'.
    'Brutto Preis <b>'.$bezeichunng_tisch.'</b> '.($preis_tisch*(1+MWST)).EURO.'<br>'.
    'Brutto Preis <b>'.$bezeichunng_stuhl.'</b> '.($preis_stuhl*(1+MWST)).EURO.'<br>'.
    'Brutto Preis <b>'.$bezeichunng_lampe.'</b> '.($preis_lampe*(1+MWST)).EURO.'<br>'.
    'Brutto Preis <b>'.$bezeichunng_pctisch.'</b> '.($preis_pctisch*(1+MWST)).EURO.
    '</p>'

    
    ?>
</body>
</html>