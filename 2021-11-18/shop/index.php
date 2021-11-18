<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    "dreamy Sweets",null,true,'The sweetest Dreams awake',['Dreamy Sweets',['Start'=>'index.php','Schokolade'=>'schokolade.php','Pralinen'=>'pralinen.php','Warenkorb'=>'warenkorb.php']]
);
get_header( ...$args );
?>
<p class="lead">Herzlich Willkommen in unserem Suesigkeiten-Shop</p>
<p><i class="bi bi-cart"></i>Bitte waehlen Sie aus unserem Angeboten:</p>
<ul>
    <li><a href="schokolade.php">Schokolade</a></li>
    <li><a href="pralinen.php">Pralinen</a></li>
</ul>
    
<?php get_footer(); ?>