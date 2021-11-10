<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sportfest: Startzeiten und Veranstaltungen</h1>
    <?php 
    $sport=[
        ["Beginn"=>"09:30 Uhr","Disziplin"=>"Diskuswurf","Ort"=>"Nebenplatz","Bemerkung"=>"Jugendmeisterschaften"],
        ["Beginn"=>"10:00 Uhr","Disziplin"=>"5 km=Lauf","Ort"=>"Stadion-Laufbahn","Bemerkung"=>"Offener Lauf"],
        ["Beginn"=>"11:00 Uhr","Disziplin"=>"Halbmarathon","Ort"=>"Waldgebiet","Bemerkung"=>"Teilnahme ab 18 Jahren"],
        ["Beginn"=>"12:00 Uhr","Disziplin"=>"Stabhochsprung","Ort"=>"Stadion-Stabhochsprunganlage","Bemerkung"=>"Nur Frauen"]
    ];
    $sport1=[
        ["09:30 Uhr","Diskuswurf","Nebenplatz","Jugendmeisterschaften"],
        ["10:00 Uhr","5 km=Lauf","Stadion-Laufbahn","Offener Lauf"],
        ["11:00 Uhr","Halbmarathon","Waldgebiet","Teilnahme ab 18 Jahren"],
        ["12:00 Uhr","Stabhochsprung","Stadion-Stabhochsprunganlage","Nur Frauen"]
    ];
    $a = $sport[0];
    ?>
    <h2>assoziatives Array</h2>
    <table border="1">
        <tr>  
        <?php foreach (array_keys($a) as $value):?>
            <th><?php echo $value ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>  
        <?php foreach ($a as $key => $value):?>
            <th><?php echo $key ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($sport as $spo): ?>
        <tr>
            <?php foreach($spo as $info): ?>
            <td><?php echo $info; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h2>indieziertes Array</h2>
    <table border="1">
        <tr>  
            <th>Beginn</th>
            <th>Disziplin</th>
            <th>Ort</th>
            <th>Bemerkung</th>
        </tr>
        <?php foreach($sport1 as $spo): ?>
        <tr>
            <?php foreach($spo as $info): ?>
            <td><?php echo $info; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>