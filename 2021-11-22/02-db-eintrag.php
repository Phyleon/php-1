<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'daten eintragen',null,true
);
get_header( ...$args );
$sql= 'INSERT INTO `tbl_bestellung`(`bstlg_vorname`,`bstlg_nachname`, `bstlg_ort`, `bstlg_sorte`,`bstlg_menge`)values("Maxi","Langi","Erfurt","Gala",6)';

if($result=mysqli_query($db,$sql)){
   $anzahl= mysqli_affected_rows($db);
   echo "Anzahl Datensaetze: $anzahl";
}else{
    echo get_db_error($db,$sql);
}
mysqli_close($db);

?>
    
<?php get_footer(); ?>