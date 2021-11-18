<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    "dreamy Sweets",null,true,'Dreamy Sweets - Warenkorb',['Dreamy Sweets',['Start'=>'index.php','Schokolade'=>'schokolade.php','Pralinen'=>'pralinen.php','Warenkorb'=>'warenkorb.php']]
);
include 'artikel.inc.php';
get_header( ...$args );
if(isset($_POST['schokolade']) OR isset($_POST['pralinen'])){
    foreach ($_POST as $artnr => $menge) {
        if ((int)$menge>0) {
            $_SESSION[$artnr]=(int)$menge;
        }else{
            if (array_key_exists($artnr,$_SESSION)){
                unset($_SESSION[$artnr]);
            }
        }
        
    }
}



?>
<table class="table table-hover">
    <tr class="table-success">
        <th>Artikel Nummer</th>
        <th>Bezeichnung</th>
        <th>Menge</th>
    </tr>
    <?php foreach ($_SESSION as $key => $value): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td>
                <?php
                 echo str_starts_with($key,'s')?$array_schoko[$key]:''; 
                 echo str_starts_with($key,'p')?$array_praline[$key]:''; 
                 ?>
            </td>
            <td><?php echo $value; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Was moechten Sie als naechstes tun?</p>
<ul>
    <li><a href="schokolade.php">Schokolade bestellen</a></li>
    <li><a href="pralinen.php">Pralinen bestellen</a></li>
    <li><a href="kasse.php">Bestellung abschliessen</a></li>
</ul>

<?php get_footer(); ?>