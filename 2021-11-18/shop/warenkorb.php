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

if(isset ($_GET['unset']) ){
    unset($_SESSION[$_GET['unset']]);
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
                 $link= str_starts_with($key,'s')?'schokolade.php':(str_starts_with($key,'p')?'pralinen.php':'');
               
                 ?>
            </td>
            <td><?php echo "$value"; ?><a class="btn btn-sm btn-outline-danger ms-3" href="warenkorb.php?unset=<?php echo "$key"; ?>" role="button">Delete</a><a class="btn btn-sm btn-outline-warning ms-3" href="<?php echo $link; ?>?edit=<?php echo "$key"; ?>" role="button">Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Was moechten Sie als naechstes tun?</p>
<style>
.empty{
    pointer-events: none;   /* deaktiviert den link */
    cursor:default;         /* setzt den cursor zurueck */
    text-decoration:none;   /* nicht unterstrichen */
    color: #666;            /* Farbe grau */
}
</style>
<?php 
$empty=''; 
if(empty($_SESSION)){
    $empty='empty'; 

}?>
<ul>
    <li><a href="schokolade.php">Schokolade bestellen</a></li>
    <li><a href="pralinen.php">Pralinen bestellen</a></li>
    <li><a href="kasse.php" class="<?php echo $empty;?>">Bestellung abschliessen</a></li>
</ul>

<?php get_footer(); ?>