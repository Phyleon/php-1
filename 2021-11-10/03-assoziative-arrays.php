<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>asso arrays</title>
</head>
<body>
    <h1>asso arrays</h1>
    <?php 
    $hauptstaedte = array ('Schweiz'=>'Bern','Frankreich'=>'Paris','Spanien'=>'Madrid');
    ?>
<table style = "border:1px solid gray;">
<tr>
    <th>Land</th>
    <th>Hauptstadt</th>
</tr>
<?php 
foreach($hauptstaedte as $land => $stadt){
    echo '<tr>';
    echo "<td>$land</td>";
    echo "<td>$stadt</td>";
    echo '</tr>';
}
?>

</table>
    
</body>
</html>