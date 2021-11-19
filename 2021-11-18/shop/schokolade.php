<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    "dreamy Sweets",null,true,'Dreamy Sweets - Schokolade',['Dreamy Sweets',['Start'=>'index.php','Schokolade'=>'schokolade.php','Pralinen'=>'pralinen.php','Warenkorb'=>'warenkorb.php']]
);
include 'artikel.inc.php';
get_header( ...$args );
?>
<p class="lead">Bitte tragen Sie die gewuenschte Menge ein: </p>
<form action="warenkorb.php" method="post">
    <table class="table table-hover">
        <tr class="table-warning">
            <th>Artikel Nummer</th>
            <th>Bezeichnung</th>
            <th>Menge</th>
            <th>Einheit</th>
        </tr>

        <?php foreach ($array_schoko as $key => $value):?>
            <?php $menge=isset($_SESSION[$key])?$_SESSION[$key]:0; ?>
            <?php 
            $focus='';
            
            if (isset($_GET['edit'])&&$key ===$_GET['edit']) {
                $focus='autofocus';
            }
             ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
                <td><input type="number" <?php echo $focus; ?> size="5" value="<?php echo $menge; ?>" name="<?php echo $key; ?>"></td>
                <td>Tafel 80g</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4">
                <input type="submit" value="In den Warenkorb" name="schokolade" class="btn btn-primary">
                <input type="reset" value="Abbrechen" class="btn btn-secondary">
            </td>
        </tr>
    </table>
</form>
<script>
    const elements = document.querySelectorAll("input");
    for (let i=0; i<elements.length;i++){
        elements[i].addEventListener("focus", function(){this.select();});
    }
</script>
<?php get_footer(); ?>