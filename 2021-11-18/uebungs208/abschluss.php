<?php
session_start();
require_once( '../../includes/functions.inc.php' );
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
                echo'test';
            }
        } 


else:
?>
<p class='lead'>Geben Sie noch Ihre Kontaktdaten ein:</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
        <label for="vname" class="form-label">Vorname</label>
        <input type="text" name="vname" id="vname" class="form-control">
    </div>
    <div class="form-group">
        <label for="nname" class="form-label">Nachname</label>
        <input type="text" name="nname" id="nname" class="form-control">
    </div>
    <div class="form-group">
        <label for="ort" class="form-label">Wohnort</label>
        <input type="text" name="ort" id="ort" class="form-control">
    </div>
    <div class="form-group">
        <label for="mail" class="form-label">Mailadresse</label>
        <input type="mail" name="mail" id="mail" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="absenden">Absenden</button>
</form>
    
<?php endif; get_footer(); ?>