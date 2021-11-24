<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung 1_3',null,true
);
get_header( ...$args );
if (!empty($_POST)) {

$preis=isset($_POST['preis'])?$_POST['preis']:'';
$order=isset($_POST['order'])?$_POST['order']:'';
$sql="SELECT `hersteller`,`typ`,`preis` FROM `fp`".$preis.$order.";";

$result=mysqli_query($db,$sql);
if (false===$result){echo get_db_error($db,$sql);}else{
    while ($row =mysqli_fetch_array($result,1)){

   
        echo implode(", ",$row),'<br>';
       
    } 
} }else{ ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p><input type="radio" name="preis" value=" where `preis`<=120">bis 120 Euro einschl.<br>
    <input type="radio" name="preis" value=" where `preis`>120 and `preis`<=140">ab 120 Euro ausschl. bis 140 Euro einschl.<br>
    <input type="radio" name="preis" value=" where `preis`>140">ab 140 Euro ausschl.</p>
    <p><input type="checkbox" value=" ORDER by `preis` DESC" name="order">Ausgabe nach Preis (absteigend) sortiert</p>
    <button type="submit">Daten absenden</button><button type="reset">Zuruecksetzen</button>
</form>
<?php } ?>
<?php mysqli_close($db); get_footer(); ?>