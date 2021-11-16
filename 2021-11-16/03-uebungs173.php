<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung seite 173'
);
get_header( ...$args );
$text='';
$suche='';
if (isset($_POST['senden'])){
    $text = $_POST['text'];
    $suche = $_POST['suche'];
}
?>
<h1>Begriff in einer Textpassage suchen</h1>
<form action="03-uebungs173.php" method="post">
<p>Orginaltext:<textarea name="text" cols="75" rows="15"><?php echo $text ?></textarea></p>
<p>Suche nach <input type="text" value="<?php echo $suche ?>" name="suche">
<p><input type="submit" value="Zeichenkette suchen" name="senden"></p>
</form>
<?php if (isset($_POST['senden'])){
    if (!empty($_POST['suche'])&&!empty($_POST['text'])){
    //$text = $_POST['text'];
    //$suche = $_POST['suche'];
    $count= substr_count($text,$suche);
    echo"<p style= \"color:blue\">Suche nach <b>\"$suche\"</b>:<b style=\"color:red\"> $count Mal</b> gefunden.</p>";
    $marked= str_replace($suche,"<span style=\"background-color:yellow\">$suche</span>",nl2br($text));
    echo"<p>$marked</p>";
    }else{
        echo'<p>Bitte Text in beide Felder eintragen</p>';
    }

}



?>
    



<?php get_footer(); ?>