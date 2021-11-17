<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Seite 189',Null,true
);
get_header( ...$args );

?>
<?php 
echo '<p>';
function qu($i){
    return $i*$i;
}
$times=microtime(true);
for ($i=1; $i <1000001 ; $i++) { 
$erg=qu($i);
}
$timee=microtime(true);
echo 'Dauer in Millisekunen fuer aufruf Funktion Berechnung: '. (($timee-$times)*1000);
echo '</p>';    


echo '<p>';
$times=microtime(true);
for ($i=1; $i <1000001 ; $i++) { 
$erg=$i*$i;
}
$timee=microtime(true);
echo 'Dauer in Millisekunen fuer direkte Berechnung: '. (($timee-$times)*1000);
echo '</p>';    

?>
<?php get_footer(); ?>