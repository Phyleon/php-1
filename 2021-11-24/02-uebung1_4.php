<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung 1_4',null,true
);
get_header( ...$args );
if (!empty($_POST)) {

    $hersteller=isset($_POST['hersteller'])?$_POST['hersteller']:'';
    $sql="SELECT `hersteller`, `typ`, `gb`, `preis`, `artnummer`, `prod` FROM `fp`".$hersteller.";";
    $result=mysqli_query($db,$sql);

    if (false===$result){
        echo get_db_error($db,$sql);
    }
    else{
        ?>
        <table class="table">
            <tr>
            <th>Hersteller</th><th>Typ</th><th>Gb</th><th>Preis</th><th>Artikelnummer</th><th>Datum</th>
            </tr>
            <?php while ($row =mysqli_fetch_array($result,1)): ?> 
                <tr>
                    <?php foreach ($row as $key => $value):?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endwhile; ?>
        </table>     
        <?php     
    } }else{ ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>Anzeige der Festplatten des ausgewaehlten Herstellers:</p>
        <p><select name="hersteller">
            <option value=" where `hersteller`='Fujitsu'">Fujitsu</option>
            <option value=" where `hersteller`='Quantum'">Quantum</option>
            <option value=" where `hersteller`='Seagate'">Seagate</option>
        </select></p>
        <button type="submit">Daten absenden</button><button type="reset">Zuruecksetzen</button>
    </form>
    <?php } ?>
<?php mysqli_close($db); get_footer(); ?>