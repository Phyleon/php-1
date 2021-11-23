<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Login',null,true
);
get_header( ...$args );

if (!empty($_POST)) {
    $bntzr_name=$_POST['bntzr_name'];
    $bntzr_passwort=$_POST['bntzr_passwort'];

    $sql = "SELECT bntzr_name, bntzr_passwort from tbl_benutzer where bntzr_name = ?";
    $stmt= mysqli_prepare($db,$sql);
    if (false===$stmt){get_db_error($db,$sql);}
    else{
        mysqli_stmt_bind_param($stmt,'s',$bntzr_name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $db_uname,$db_upw);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        //Pruefe ob passwort uebereinstimmt:
        if(password_verify($bntzr_passwort,$db_upw)){echo'<p class="alert alert-success">Du bist eingeloggt</p>';}
        else{echo'<p class="alert alert-danger">Du bist nicht eingeloggt</p>';}
        
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>Benuztername: <input type="text" name="bntzr_name"></p>
    <p>Passwort: <input type="text" name="bntzr_passwort"></p>
    <br>
    <button type="submit"class="btn btn-outline-primary">Login</button>
</form>
<?php 
mysqli_close($db);
get_footer(); ?>