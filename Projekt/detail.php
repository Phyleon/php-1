<?php
session_start();
require_once( 'includes/functions.inc.php' );
$database = 'miniblock';
require_once( 'includes/db-connect.inc.php' );
$_SESSION['logon']=isset($_SESSION['loginsuccess'])?$_SESSION['autor_vorname'].' '.$_SESSION['autor_nachname'] .' <i class="bi bi-box-arrow-right"></i>':'Registrierung oder Login';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblock',['css/style.css','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'],true,'POSTS TITEL',['Normis Schlemmerecke',['Willkommen'=>'../index.php','Detail'=>$_SERVER['PHP_SELF'],'Neuer Beitrag'=>'../edit.php',$_SESSION['logon']=>'../logon.php']],false
);
get_header( ...$args );
if (!empty($_GET)) {

$sql="SELECT `autor_vorname`, `autor_nachname`,`posts_id`,`kateg_name`, `posts_titel`, `posts_inhalt`, `posts_bild` FROM `tbl_posts` JOIN `tbl_kategorien` ON `posts_kateg_id_ref`=tbl_kategorien.kateg_id JOIN tbl_autoren on `posts_autor_id_ref`= tbl_autoren.autor_id WHERE posts_id = ".$_GET['posts_id'];
$result=mysqli_query($db,$sql);


    echo '<pre>', var_dump( mysqli_fetch_assoc($result) ), '</pre>';
?>



<?php }else{
    header("Refresh:1; url=index.php");
}
mysqli_close($db);
get_footer(); ?>