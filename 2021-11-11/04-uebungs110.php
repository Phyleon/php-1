<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uebung</title>
</head>
<body>
    <?php 
    $herr='';
    $frau='';
    $vn='';
    $nn='';
    $email='';
    if (isset($_POST['senden'])) {
        if (isset($_POST['anrede'])) {
            $herr=($_POST['anrede'])=='Herr'?' checked':'';
            $frau=($_POST['anrede'])=='Frau'?' checked':'';
        }
        $vn=$_POST['vn'];
        $nn=$_POST['nn'];
        $email=$_POST['email'];
    }
    ?>
    <h1>Bewerbung, Newsletter oder Infomaterial</h1>
    <p>Bitte nennen Sie uns Ihr Anliegen:</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
    <p>Anrede:
        <input type="radio" name="anrede" value="Herr" <?php echo $herr; ?> >Herr
        <input type="radio" name="anrede" value="Frau" <?php echo $frau; ?> >Frau
    </p>
    <p>Vorname: <input type="text" name="vn" value="<?php echo $vn; ?>"></p>
    <p>Nachname: <input type="text" name="nn" value="<?php echo $nn; ?>"></p>
    <p>Mailadresse: <input type="email" name="email" value="<?php echo $email; ?>"></p>
    <p>
    <input type="submit" value="bei Ihnen bewerben" name="senden"></input>
    <input type="submit" value="Newsletter abonnieren" name="senden"></input>
    <input type="submit" value="Infomaterial anfordern" name="senden"></input>
    </p>
    </form>
    <?php 
    
    if (isset($_POST['senden'])) {
      
        if (isset($_POST['anrede'])&&!empty(trim($_POST['vn']))&&!empty(trim($_POST['nn']))&&!empty(trim($_POST['email']))) {
          echo'<p>Herzlichen Dank, ',
          $_POST['anrede'],' ',$_POST['nn'],' fuer ihre ',

          $_POST['senden']=='bei Ihnen bewerben'?'Bewerbungsanfrage. Unsere Personalabteilung wird':'',
          $_POST['senden']=='Newsletter abonnieren'?'Anfrage unseres Newsletters. Sie werden zukuenftig':'',
          $_POST['senden']=='Infomaterial anfordern'?'Anfrage nach Infomaterial. Sie bekommen direkt':'',
            
          ' per Mail - an Ihre Adresse <b>',$_POST['email'],'</b> - ',

          $_POST['senden']=='bei Ihnen bewerben'?'Kontakt zu Ihnen aufnehmen.':'',
          $_POST['senden']=='Newsletter abonnieren'?'ueber Neuigkeiten informiert.':'',
          $_POST['senden']=='Infomaterial anfordern'?'unser Infomaterial erhalten.':'',

          '</p>';  
        }else{
            echo'<p>Ihre Angaben sind unvollstaendig, bitte vervollstaendigen Sie die leeren Felder</p>';
        }   
    }
     ?>
</body>
</html>