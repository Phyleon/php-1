<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'blablalala',null,true
);
get_header( ...$args );
if (isset($_POST['delete'])) {

    $sql = 'DELETE FROM `tbl_bestellung` WHERE `bstlg_id` ='.$_POST['auswahl'];
    
    if($result=mysqli_query($db,$sql)){
        $anzahl= mysqli_affected_rows($db);
        echo "Anzahl Datensaetze: $anzahl";
    }else{
        echo get_db_error($db,$sql);
    }
 mysqli_close($db);
}else{
    echo '<p>';
    echo'';
    echo '</p>';
}
?>
    <a href="04-db-delete-form.php">Zurueck zum loeschen</a>
<?php get_footer(); ?>