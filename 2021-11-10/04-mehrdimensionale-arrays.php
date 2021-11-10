<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Mehrdimensionale Arrays</h1>

    <h2>mehrdimensionale indizierte Arrays</h2>

    <?php 
    
    $personen = array(
        array(
            'Manfred',
            'deutsch',
            53,
            'männlich'
        ),
        array(
            'Cindy',
            'englisch',
            23,
            'weiblich'
        ),
        array(
            'Carlos',
            'spanisch',
            34,
            'männlich'
        )
    );
    
    // Zugriff
    echo '<p>' . $personen[2][0] . ' ist ' . $personen[2][2] . ' Jahre alt, spricht ' . 
    $personen[2][1] . ' und ist ' . $personen[2][3] . '</p>';

    // Ändern
    $personen[2][2] = 35;

    // Hinzufügen
    $personen[] = array(
        'Ursula',
        'dänisch',
        22,
        'weiblich'
    );

    $personen[4][0] = 'Johanna';
    $personen[4][1] = 'schwedisch';
    $personen[4][2] = 47;
    $personen[4][3] = 'weiblich';

    echo '<pre>', var_dump( $personen ), '</pre>';
    
    ?>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Sprach</th>
            <th>Alter</th>
            <th>Geschlecht</th>
        </tr>
        <!-- Schleife für das äußere Array (Zeilen)-->
        <?php foreach($personen as $person): ?>
        <tr>

            <!-- Schleife für das innere Array (Spalten)-->
            <?php foreach($person as $info):  ?>

                <td><?php echo $info; ?></td>

            <?php endforeach ?>

        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ausgabe der Personen mit list</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Geschlecht</th>
            <th>Sprache</th>
            <th>Alter</th>
        </tr>
        <?php foreach($personen as $person): ?>
            
            
        <tr>
            <?php list($pname,$sprache,$alter,$geschlecht) = $person; ?>
            <td><?php echo $pname ?></td>
            <td><?php echo $geschlecht ?></td>
            <td><?php echo $sprache ?></td>
            <td><?php echo $alter ?></td>
            
        </tr>

        <?php endforeach; ?>
    </table>

    

    

    
</body>
</html>