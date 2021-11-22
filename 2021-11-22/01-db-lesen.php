<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'db-lesen',null,true
);
get_header( ...$args );
$sql="SELECT `bstlg_nachname`,`bstlg_sorte`,`bstlg_menge` from `tbl_bestellung`";
if ($result = mysqli_query($db,$sql)) {
    $anz = mysqli_num_rows($result);
    echo $anz;
    while($erg = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo '<pre>', var_dump( $erg ), '</pre>';
    }
    
    echo '<pre>', var_dump( $result ), '</pre>';
}else{
    echo '<p>';
    echo 'fehlerhafte abfrage';
    echo '</p>';
    $errnum= mysqli_errno($db);
    $errmsg = mysqli_error($db);
    echo"<p>Fehler-Nr: $errnum<br>$errmsg </p>";
    echo get_db_error($db, $sql);
}
mysqli_close($db);
?>
    
<?php get_footer(); ?>