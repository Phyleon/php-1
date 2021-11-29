<?php
session_start();
require_once( 'includes/functions.inc.php' );
$database = 'miniblock';
require_once( 'includes/db-connect.inc.php' );
$_SESSION['logon']=isset($_SESSION['loginsuccess'])?$_SESSION['autor_vorname'].' '.$_SESSION['autor_nachname'] .' <i class="bi bi-box-arrow-right"></i>':'Registrierung oder Login';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblock',['css/style.css','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'],true,$_SESSION['logon'],['Normis Schlemmerecke',['Willkommen'=>'index.php','Neuer Beitrag'=>'edit.php',$_SESSION['logon']=>'logon.php']],false
);
get_header( ...$args );


if(isset($_SESSION['loginsuccess'])){

    $_SESSION = [];

    echo '<p>';
    echo 'Die Session mit der ID: '.session_id().'wurde';

    if(session_destroy()){echo'<span class="text-success"> erfolgreich zerstoert und sie wurden ausgeloggt</span>';
    }else{echo'<span class="text-danger"> nicht erfolgreich zerstoert</span>';}

    echo '</p>';
    ?>
    <a class="btn btn-outline-dark" href="logon.php" role="button">Login</a>

<?php 
}else{


if (!empty($_POST)&&isset($_POST['register'])) {
    //Variablen anlegen
    $autor_email = $_POST['autor_email'];
    $autor_passwort = password_hash($_POST['autor_passwort'],PASSWORD_DEFAULT);
    $autor_vorname =$_POST['autor_vorname'];
    $autor_nachname =$_POST['autor_nachname'];
    $sql= "INSERT INTO `tbl_autoren`(`autor_id`, `autor_vorname`, `autor_nachname`, `autor_email`, `autor_passwort`) VALUES (NULL,?,?,?,?)";
    $stmt=mysqli_prepare($db,$sql);
    if (false===$stmt){
        echo get_db_error($db,$sql);
    }else{
        mysqli_stmt_bind_param($stmt,'ssss',$autor_vorname,$autor_nachname,$autor_email,$autor_passwort);
        mysqli_stmt_execute($stmt);
        printf('<p class="altert alerts-success">Ihre Regisitrierung war erfolgreich!<br>Anzahl der hinzu gefuegten Datensaetze: %d</p>',mysqli_affected_rows($db));
        mysqli_stmt_close($stmt);
    }
}
if (!empty($_POST)&&isset($_POST['login'])) {

    $autor_email = $_POST['autor_email'];
    $autor_passwort =$_POST['autor_passwort'];

    $sql = "SELECT `autor_vorname`, `autor_nachname`, `autor_email`, `autor_passwort` FROM `tbl_autoren` WHERE `autor_email` = ?";
    $stmt= mysqli_prepare($db,$sql);
    if (false===$stmt){get_db_error($db,$sql);}
    else{
        mysqli_stmt_bind_param($stmt,'s',$autor_email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt,$db_vorname,$db_nachname,$db_email,$db_passwort);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        //Pruefe ob passwort uebereinstimmt:
        if(password_verify($autor_passwort,$db_passwort)){
            $_SESSION['loginsuccess']=true;
            $_SESSION['autor_vorname']=$db_vorname;
            $_SESSION['autor_nachname']=$db_nachname;
            echo'<p class="alert alert-success">Du bist eingeloggt</p>';
            header("Refresh:1; url=index.php");
        }
        else{
            
            echo'<p class="alert alert-danger">Du bist nicht eingeloggt</p>';
        
        }   
    }
}

?>
    <p>Bitte geben sie einen Benutzernamen und ein Passwort an!</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>email: <input type="text" name="autor_email"></p>
        <p>Passwort: <input type="text" name="autor_passwort"></p>
        <p><button type="submit" name="login" class="btn btn-outline-dark">Einloggen</button></p>
        <p>Vorname: <input type="text" name="autor_vorname"></p>
        <p>Nachname: <input type="text" name="autor_nachname"></p>
        <p><button type="submit" name="register" class="btn btn-outline-dark">Registrieren</button></p>
    </form>
 
<?php }
mysqli_close($db);
get_footer(); ?>