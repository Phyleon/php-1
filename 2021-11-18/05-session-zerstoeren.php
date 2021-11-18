<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',null,true,'sessions - Daten zerstoeren'
);
get_header( ...$args );
/* einzelne Eintraege loeschen */
echo '<pre>', print_r( $_SESSION ), '</pre>';
unset($_SESSION['vn']);
echo '<pre>', print_r( $_SESSION ), '</pre>';

/* === Session zerstoeren
============================================================================================= */

/* 1. Session-Array leeren */
$_SESSION = [];

echo '<p>';
echo 'Die Session mit der ID: '.session_id().'wurde';

if(session_destroy()){echo'<span class="text-success">erfolgreich zerstoert</span>';
}else{echo'<span class="text-danger"> nicht erfolgreich zerstoert</span>';}

echo '</p>';
?>
    
<?php get_footer(); ?>