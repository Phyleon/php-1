<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Datumsfunktionen',NULL,TRUE
);
get_header( ...$args );
echo '<pre>', var_dump( getdate() ), '</pre>';
$datum= getdate();
$stringf = '';
foreach ($datum as $key => $value) {
    if(is_string($value)){
        $stringf .=' %s '.$key;
    }else{
        $stringf .=' %d '.$key;
    }  
}
$string =[$stringf];
foreach ($datum as $key => $value) {
    array_push($string,$value);
}
echo '<p>';
printf(...$string); 
echo '</p>';


$string =[];
foreach ($datum as $key => $value) {
    array_push($string,$value);
}
echo '<p>';
printf($stringf,...$string);
echo '</p>';




?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>Geben sie bitte das Datum in der form tt.mm.jjj ein!</p>
    <input type="text" name="datum">
    <input type="submit" value="pruefen" name="senden">
</form>
<?php 
if (isset($_POST['senden'])&&!empty(trim($_POST['datum']))){
    
    $date=explode(".",$_POST['datum'],3);
    if (checkdate($date[1],$date[0],$date[2])) {
        echo '<p class="alert alert-success">';
        echo 'korrekte eingabe';
        echo '</p>';
        
    }else{
        echo '<p class="alert alert-danger">';
        echo 'Unkorrekte eingabe';
        echo '</p>';
    }
}
?>
    
<?php get_footer(); ?>