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
    if(isset($_POST['senden'])){
        if(empty(trim($_POST['email']))){
            echo'<p>Mail ist leer!</p>';
        }
        else{
            echo'<p>Mail-Adresse ist: ',$_POST['email'],' </p>';
            
        }

    echo '<pre>',print_r($_POST),'</pre';

    }else{
        echo'<p>Diese seite wurde nicht durch das Formular aufgerufen. Bitte rufen sie <a href="08-form-elemente.html">Formular</a> auf</p>';

    }
    
     ?>
    
</body>
</html>