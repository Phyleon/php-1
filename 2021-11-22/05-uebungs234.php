<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Seite 234',null,true,'Newsletter abbonieren'
);
get_header( ...$args );

$username=isset($_GET['username'])?$_GET['username']:'';

if (isset($_POST['senden'])):
   
    if (!empty(trim($_POST['usermail']))) {
        
        
        $sql = 'INSERT INTO `newsletter`(`username`,`usermail`)values("'.$_POST['username'].'","'.$_POST['usermail'].'")';
        
        
        if($result=mysqli_query($db,$sql)){
            
            echo'<p class="lead">Vielen Dank, die Mail-Adresse <i>'.$_POST['usermail'].'</i> wurde gespeichert...<br>SIe erhalten ab sofort unsere Newsletter an die angegebene Adresse</p>';;
        }else{
            echo'<p>Die Angegebene Mail-Adresse <i>'.$_POST['usermail'].'</i> erhaelt bereits den Newsletter!<br>Bitte wenn gewuenscht andere Email-Adresse angeben <a href="05-uebungs234.php?username='.$_POST['username'].'">Email</a></p>';
            //echo get_db_error($db,$sql);
        }
        mysqli_close($db);
    }else{
    
        echo'<p class="lead">Bitte fuellen sie das Feld <a href="05-uebungs234.php?username='.$_POST['username'].'">Email</a> aus</p>';}
else:?>
<p>Ueber dieses Formular koennen sie sich fuer den Newsletter anmelden:</p>
<form action="05-uebungs234.php" method="post">
    <p>Ihr Name: <input type="text" name="username" value="<?php echo $username ?>"></p>
    <p>Ihre E-mail Adresse: <input type="email" name="usermail"></p>
    <button type="submit" class="btn btn-lg btn-outline-dark" name="senden">absenden</button>
</form>

<?php endif; ?>  
<?php get_footer(); ?>