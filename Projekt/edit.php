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

/* User eingeloggt: */
if (isset($_SESSION['loginsuccess'])) {
    
    $posts_titel=isset($_POST['posts_titel'])?(!empty(trim($_POST['posts_titel']))?($_POST['posts_titel']):false):false;
    $posts_inhalt=isset($_POST['posts_inhalt'])?(!empty(trim($_POST['posts_inhalt']))?($_POST['posts_inhalt']):false):false;
    $posts_bild=isset($_POST['posts_bild'])?(!empty(trim($_POST['posts_bild']))?($_POST['posts_bild']):true):true;
    $posts_kateg_id=isset($_POST['options'])?$_POST['options']:false;

    $sql="SELECT `kateg_id`, `kateg_name` FROM `tbl_kategorien`";
    $result=mysqli_query($db,$sql);
    while ($row =mysqli_fetch_assoc($result)): 
    ?>
    <!-- Radio Buttons fuer die Kategorien -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
    <input type="radio" class="btn-check" name="options" id="<?php echo $row['kateg_id']; ?>" value="<?php echo $row['kateg_id']; ?>" autocomplete="off">

    <label class="btn btn-secondary" for="<?php echo $row['kateg_id']; ?>">
        <?php echo $row['kateg_name'] ?>
    </label>

    <?php endwhile; ?>
    <!-- Formular fuers erstellen -->
        <input type="text" name="posts_titel" value="<?php echo $posts_titel; ?>">
        
        <textarea name="posts_inhalt" cols="30" rows="10"><?php echo $posts_inhalt; ?></textarea>
        <input type="text" name="posts_bild" value="<?php echo $posts_bild; ?>">
        <button type="submit">erstellen</button>
    </form>

    <?php 
  

    if (!empty($_POST)&&$posts_titel&&$posts_inhalt&&$posts_kateg_id&&$posts_bild) {
        
        $sql= "INSERT INTO `tbl_posts`(`posts_id`, `posts_autor_id_ref`, `posts_kateg_id_ref`, `posts_titel`, `posts_inhalt`, `posts_bild`) VALUES (NULL,?,?,?,?,?)";
            $stmt=mysqli_prepare($db,$sql);
            if(false===$stmt){echo get_db_error($db,$sql);}
            mysqli_stmt_bind_param($stmt,'iisss',$_SESSION['autor_id'],$_POST['options'],$_POST['posts_titel'],$_POST['posts_inhalt'],$_POST['posts_bild']);
            mysqli_stmt_execute($stmt);
            if(mysqli_affected_rows($db)===1){
                printf('<p class="altert alert-success">Ihre Regisitrierung war erfolgreich!</p>');
            }
            if(mysqli_affected_rows($db)===-1){
                echo '<p class="altert alert-danger">Ihre Regisitrierung war nich moeglich, email adresse berteits in Verwendung.<br>Bitte loggen sie sich mit der Email adresse ein oder legen sie sich ein neues Konto mit einer anderen Email Adresse an!</p>';
            }
            mysqli_stmt_close($stmt);
    }else{
        echo '<h2>vervollstaendigen!</h2>';
    }
    ?>
<!-- User nicht eingeloggt -->
<?php }else{ ?> 
    <p class="alert alert-danger">Du bist nicht eingeloggt<br><a href="logon.php">Loggen Sie sich ein</a> , um einen Beitrag zu erstellen</p>
<?php }
mysqli_close($db);
get_footer(); ?>