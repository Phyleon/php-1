<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Seite 208',null,true
);
get_header( ...$args );
if(isset($_POST['senden'])){
    
foreach ($_POST as $key => $value) {
    if((int)$value>0){
        $_SESSION[$key]=(int)$value;
    }
}
echo '<pre>', var_dump( $_SESSION ), '</pre>';
echo '<pre>', var_dump( $_POST ), '</pre>';
?>
<p class="lead">Sie haben folgende Mengen bestellt:</p>
<p>
<?php 
    
     foreach ($_SESSION as $key => $value) {
    if ($key!=='names'){
      echo''.$_SESSION['names'][$key].': '.$value.($value>1?' Glaesser':' Glas').'<br>';  
    }
   
}  ?>
</p>
<p><i>Die Session-ID lautet: <?php echo session_id(); ?></i></p>
<p><a href="abschluss.php">Weiter zur Eingabe persoenlicher Daten</a> und dem Abschluss der Bestellung</p>
<?php 
}else{
    echo '<p>';
    echo 'Bitte die Seite richtig aufrufen!';
    echo '</p>';
}
 get_footer(); ?>