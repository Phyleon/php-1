<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',null,true,'sessions - Daten auslesen'
);
get_header( ...$args );
?>

<p>Daten aus dem Session-Cookie auslesen:</p>

<table>
    <?php 
    foreach ($_SESSION as $key => $value): ?>
    <tr>
    <td><?php echo $key; ?></td><td><?php echo $value; ?></td>
    </tr>
    <?php endforeach;?>
</table>
<p>Weiter zur <a href="05-session-zerstoeren.php">naechsten Seite</a>.</p>
<?php get_footer(); ?>