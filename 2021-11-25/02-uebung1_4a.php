<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung 1_4a',null,true
);
get_header( ...$args );



    $sql="SELECT herst.herstellername, `typ`, `gb`, `preis`, `artnummer`  FROM `fp` JOIN `herst` ON fp.herst_id = herst.id;";
    $result=mysqli_query($db,$sql);

    if (false===$result){
        echo get_db_error($db,$sql);
    }
    else{
        ?>
        <table class="table">
            <tr>
            <th>Hersteller</th><th>Typ</th><th>Gb</th><th>Preis</th><th>Artikelnummer</th>
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
    } ?> 
   
<?php mysqli_close($db); get_footer(); ?>