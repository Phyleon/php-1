<?php
session_start();
require_once( 'includes/functions.inc.php' );
$database = 'miniblock';
require_once( 'includes/db-connect.inc.php' );
$_SESSION['logon']=isset($_SESSION['loginsuccess'])?$_SESSION['autor_vorname'].' '.$_SESSION['autor_nachname'] .' <i class="bi bi-box-arrow-right"></i>':'Registrierung oder Login';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblock',['css/style.css','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'],true,'Neuer Beitrag',['Normis Schlemmerecke',['Willkommen'=>'index.php','Neuer Beitrag'=>'edit.php',$_SESSION['logon']=>'logon.php']],false
);
get_header( ...$args );
if (isset($_SESSION['loginsuccess'])) {
$kateg_id  

?>
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
<!-- Formular fuers erstellen -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="posts_titel">
    
    <textarea name="posts_inhal" cols="30" rows="10"></textarea>
    <input type="text" name="posts_bild">
    <button type="submit">erstellen</button>
</form>

<?php 
$kateg_id=isset($_GET['kateg_id'])?$_GET['kateg_id']:0;

if (!empty($_POST)) {
    
    $sql= "INSERT INTO `tbl_posts`(`posts_id`, `posts_autor_id_ref`, `posts_kateg_id_ref`, `posts_titel`, `posts_inhalt`, `posts_bild`) VALUES (NULL,?,?,?,?,?)";
        $stmt=mysqli_prepare($db,$sql);
        if(false===$stmt){echo get_db_error($db,$sql);}
        mysqli_stmt_bind_param($stmt,'iisss',$_SESSION['autor_id'],$kateg_id,$_POST['posts_titel'],$_POST['posts_inhalt'],$_POST['posts_bild']);
        mysqli_stmt_execute($stmt);
        if(mysqli_affected_rows($db)===1){
            printf('<p class="altert alert-success">Ihre Regisitrierung war erfolgreich!</p>');
        }
        if(mysqli_affected_rows($db)===-1){
            echo '<p class="altert alert-danger">Ihre Regisitrierung war nich moeglich, email adresse berteits in Verwendung.<br>Bitte loggen sie sich mit der Email adresse ein oder legen sie sich ein neues Konto mit einer anderen Email Adresse an!</p>';
        }
        mysqli_stmt_close($stmt);
}
?>

<?php }else{ ?> 
    <p class="alert alert-danger">Du bist nicht eingeloggt<br><a href="logon.php">Loggen Sie sich ein</a> , um einen Beitrag zu erstellen</p>
<?php }
mysqli_close($db);
get_footer(); ?>