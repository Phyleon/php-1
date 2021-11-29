<?php
session_start();
require_once( 'includes/functions.inc.php' );
$database = 'miniblock';
require_once( 'includes/db-connect.inc.php' );

$_SESSION['logon']=isset($_SESSION['loginsuccess'])?$_SESSION['autor_vorname'].' '.$_SESSION['autor_nachname'] .' <i class="bi bi-box-arrow-right"></i>':'Registrierung oder Login';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblock',['css'=>'css/style.css','bsicons'=>'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'],true,'Wilkommen',['Normis Schlemmerecke',['Willkommen'=>'index.php','Neuer Beitrag'=>'edit.php',$_SESSION['logon']=>'logon.php']],false
);
get_header( ...$args );
?>
    
<?php
mysqli_close($db);
get_footer(); ?>