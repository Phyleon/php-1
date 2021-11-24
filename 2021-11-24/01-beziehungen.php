<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'DB-Tabellen verbinden',null, true
);
get_header( ...$args );
$sql = "SELECT `gerte_name`,`gerte_beschreibung`, b.kateg_name FROM `tbl_gerichte`as a JOIN `tbl_kategorien` as b ON a.`gerte_kateg_id_ref`=b.kateg_id;";
$result=mysqli_query($db,$sql);
if (false===$result){echo get_db_error($db,$sql);}else{
?>
<table class="table">
    <tr>
        <td>Gericht</td>
        <td>Beschreibung</td>
        <td>Kategorie</td>
    </tr>
    <?php while ($row =mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['gerte_name']; ?></td>
            <td><?php echo $row['gerte_beschreibung']; ?></td>
            <td><?php echo $row['kateg_name']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<?php } ?>
<?php mysqli_close($db); get_footer(); ?>