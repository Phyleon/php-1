<?php
session_start();
require_once( 'includes/functions.inc.php' );
$database = 'miniblock';
require_once( 'includes/db-connect.inc.php' );

$_SESSION['logon']=isset($_SESSION['loginsuccess'])?$_SESSION['autor_vorname'].' '.$_SESSION['autor_nachname'] .' <i class="bi bi-box-arrow-right"></i>':'Registrierung oder Login';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblock',['css'=>'css/style.css','bsicons'=>'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'],true,'Wilkommen',['Normis Schlemmerecke',['Willkommen'=>'index.php','Neuer Beitrag'=>'edit.php',$_SESSION['logon']=>'logon.php']],false
);
get_header( ...$args );

?>
    
<!-- SQL ABFRAGE fuer die Kategorien  -->
<?php
$sql="SELECT `kateg_id`, `kateg_name` FROM `tbl_kategorien`";
$result=mysqli_query($db,$sql);
while ($row =mysqli_fetch_assoc($result)): 
?>
<!-- Radio Buttons fuer die Kategorien -->
<input type="radio" class="btn-check" name="options" id="<?php echo $row['kateg_id']; ?>" autocomplete="off">

<label class="btn btn-secondary" for="<?php echo $row['kateg_id']; ?>">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?kateg_id=<?php echo $row['kateg_id']; ?>"><?php echo $row['kateg_name'] ?></a>
</label>

<?php endwhile; ?>

<!-- Radio Button fuer alle Kategorien -->
<input type="radio" class="btn-check" name="options" id="alle" autocomplete="off">
<label class="btn btn-secondary" for="<?php echo $row['kateg_id']; ?>">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?alle=true">Alle Kategorien</a>
</label>
<!-- Flex Container fuer die Cards -->
<div class="col-12 d-flex flex-wrap">

<!-- SQL Abfrage fuer die teaser Cards -->
<?php
$kateg_id=isset($_GET['kateg_id'])?" where `posts_kateg_id_ref` = ".$_GET['kateg_id']:'';
$sql="SELECT `autor_vorname`, `autor_nachname`,`posts_id`,`kateg_name`, `posts_titel`, `posts_inhalt`, `posts_bild` FROM `tbl_posts` JOIN `tbl_kategorien` ON `posts_kateg_id_ref`=tbl_kategorien.kateg_id JOIN tbl_autoren on `posts_autor_id_ref`= tbl_autoren.autor_id".$kateg_id;
$result=mysqli_query($db,$sql);
while ($row =mysqli_fetch_assoc($result)): 
?>
<!-- Karte: -->
    <div class="card m-3" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $row['posts_titel']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo empty($row['autor_vorname'])?'Herr / Frau / Divers ':$row['autor_vorname'].' '; ?> <?php echo $row['autor_nachname']; ?></h6>
        <p class="card-text"><?php echo substr($row['posts_inhalt'],0,101).'...'; ?></p>
        <a href="detail.php/?posts_id=<?php echo $row['posts_id']; ?>" class="btn btn-outline-dark">Zum Rezept</a>
    </div>
    </div>

<?php endwhile; ?>
</div>
    
<?php 
mysqli_close($db);
get_footer(); ?>