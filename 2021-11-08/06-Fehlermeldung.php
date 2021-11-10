<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlermeldung</title>
</head>
<body>
    <h1>Fehlermeldung</h1>
    <?php
    
    error_reporting(E_ALL);
    
    echo "<p>Der Wert der Variable i ist: $i </p>";
    echo 4 /0;
    ?>
</body>
</html>