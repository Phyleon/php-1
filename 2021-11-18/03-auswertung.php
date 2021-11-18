<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',null,true,'sessions - Auswertung, Daten speichern'
);
get_header( ...$args );
?>

<p>Sie haben folgende Daten im Formular uebertragen:</p>
<p>Vorname: <?php echo $_POST['vn'] ?><br>
<p>Nachname: <?php echo $_POST['nn'] ?><br>
<p>Wohnort: <?php echo $_POST['ort'] ?>
</p>

<?php 
/* Formulardaten im Session-Cookie aud dem Server speichern */
$_SESSION['vn']=$_POST['vn'];
$_SESSION['nn']=$_POST['nn'];
$_SESSION['ort']=$_POST['ort'];
$_SESSION['zeit']=time();
?>

<p>folgende Daten sind nun im Session-Cookie auf dem server gespeichert:</p>
<?php echo '<pre>', var_dump( $_SESSION ), '</pre>'; ?>

<p>Weiter zur <a href="04-auslesen.php">naechsten Seite</a>.</p>

<?php get_footer(); ?>