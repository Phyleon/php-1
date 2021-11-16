<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'uebung s. 172'
);
get_header( ...$args );
//1.
$float = 78.123456789;
printf("%09.5f", $float);
echo'<br>';
//2.
$string1='Beachten Sie das Angebot fuer die ';
$string2='folgende Kalenderwoche';
$string3=' ';
$string4='Bananen, 5 Kilo fuer nur 5.- Euro!';
printf("%s-%s-%'*5s-%s",$string1,$string2,$string3,$string4);
echo'<br>';
//3.
$string=$string1.$string2.$string3.$string4;
$arr= explode(" ",$string);
echo implode("#",$arr);
echo '<br>';
//4.
$string5=str_replace("das Angebot","<b>unser Sonderangebot</b>",$string);
echo $string5.'<br>';
$string6=str_replace("Bananen","Alle Obstsorten",$string5);
echo $string6.'<br>';


?>
    
<?php get_footer(); ?>