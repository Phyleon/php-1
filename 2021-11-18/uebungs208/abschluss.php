<?php
session_start();
require_once( '../../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Seite 208',null,true
);
get_header( ...$args );
if(isset($_POST['absenden'])):

    foreach ($_POST as $key => $value) {
        if (!empty(trim($value))&&$key!=='absenden' ){

            $_SESSION[$key]=$value;
        }}
    echo '<p class="lead">';
    echo'Das sind die in der Session gesammelte Daten';
    echo '</p>';
    foreach ($_SESSION as $key => $value) {
        if ( array_key_exists($key,$_SESSION['names'])){
            echo''.$_SESSION['names'][$key].': '.$value.($value>1?' Glaesser':' Glas').'<br>';  
        }
        if ( array_key_exists($key,$_POST)){
            echo"$key: $value<br>";
        }
    } 
    $sql1='INSERT INTO `bestellungen`(';
     //    .'`zellenname`,'.
    $sql2='`id`)values(';
    //'"'.$_POST['username'].'",
    $sql3='NULL)';
    foreach ($_SESSION as $key => $value) {
        if ( array_key_exists($key,$_SESSION['names'])){
            $sql1.='`'.$_SESSION['names'][$key].'`, ';
            $sql2.='"'.$value.'", ';
             
        }
        if ( array_key_exists($key,$_POST)){
            $sql1.='`'.$key.'`, ';
            $sql2.='"'.$value.'", ';

        }
    } 
    //INSERT INTO `bestellungen` (`vorname`, `nachname`, `wohnort`, `mailadresse`, `Nuss-Nougat Creme`, `Peanutbutter`, `Cashewcreme`, `Chocolatcreme Noir`, `id`) VALUES ('vorname', 'nachname', 'ort', 'mail', '1', '2', '3', '4', NULL);
   $sql= $sql1.$sql2.$sql3;
    if($result=mysqli_query($db,$sql)){
            
        echo'<p class="lead">success</p>';
    }else{
        echo get_db_error($db,$sql);
    }
    mysqli_close($db);

          $_SESSION = [];
        session_destroy();
            echo '<p>';
            echo'Damit ist die Session beendent. <a href="formular.php">Klicken Sie hier</a>, um eine neue Session zu beginnen.';
            echo '</p>';
            
        

      
    
    
    else:
?>
<style>
.empty{
    pointer-events: none;   /* deaktiviert den link */
    cursor:default;         /* setzt den cursor zurueck */
    text-decoration:none;   /* nicht unterstrichen */
    color: #666;            /* Farbe grau */
}
</style>
<?php 
$empty=''; 
if(empty($_SESSION)){
    $empty='empty'; 

}?>
<p class='lead'>Geben Sie noch Ihre Kontaktdaten ein:</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
        <label for="vname" class="form-label">Vorname</label>
        <input type="text" name="Vorname" id="vname" class="form-control">
    </div>
    <div class="form-group">
        <label for="nname" class="form-label">Nachname</label>
        <input type="text" name="Nachname" id="nname" class="form-control">
    </div>
    <div class="form-group">
        <label for="ort" class="form-label">Wohnort</label>
        <input type="text" name="Ort" id="ort" class="form-control">
    </div>
    <div class="form-group">
        <label for="mail" class="form-label">Mailadresse</label>
        <input type="mail" name="Mail" id="mail" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="absenden">Absenden</button>
</form>

<?php endif; get_footer(); ?>