<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uebung1</title>
</head>
<body>
    <h1>Autokennzeichen</h1>
    <?php 
    $kennzeichen = ["HH"=>"Hamburg","B"=>"Berlin","S"=>"Stuttgart"];
    $kennzeichen["F"]="Frankfurt";
    $kennzeichen["HB"]="Bremen";
    unset($kennzeichen["HB"]);
    $kennzeichen["F"]="Frankfurt am Main";
    ?>
    <table border="1">
        <th>Kennzeichen</th>
        <th>Stadt</th>

        <?php foreach($kennzeichen as $kennzeich => $stadt): ?>
            <tr>
                <td><?php echo $kennzeich?></td>
                <td><?php echo $stadt?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>