<?php 
$db =mysqli_connect('localhost','php-user','Pa$$w0rd','obstladen')
        or die("Fehler: 347_455!");
echo'<p>DB-Verbindung steht. Datenbank "obstladen" wurde ausgewaehlt.</p>';
mysqli_close($db);