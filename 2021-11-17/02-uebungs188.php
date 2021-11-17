<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Seite 188',Null,True
);
get_header( ...$args );

echo'<h3>1.</h3>';
echo '<p>';
echo date("d.m.y").'<br>';
echo date("d-m-Y").'<br>';
echo date("d.m.Y - H:i:s").'<br>';
echo date("d/m/Y - g:i a").'<br>';
echo date("Y-m-d").'<br>';
echo date('H:i  \U\h\r').'<br>';
echo '</p>';


echo'<h3>2.</h3>';
echo '<p>';
setlocale(LC_TIME,'DE');
echo strftime("%B",time());
echo '</p>';


echo'<h3>3.</h3>';
echo '<p>';
$stamp=getdate();
switch ($stamp['wday']) {
    case '01':
        echo $stamp['weekday'].' ist ein doofer Tag';
        break;
    case '02':
        echo $stamp['weekday'].' ist ein doofer Tag';
        break;
    case '03':
        echo $stamp['weekday'].' ist ein doofer Tag';
        break;
    case '04':
        echo $stamp['weekday'].' ist ein doofer Tag';
        break;
    case '05':
        echo $stamp['weekday'].' ist ein toller Tag';
        break;
    case '06':
        echo $stamp['weekday'].' ist der beste Tag';
        break;
    case '07':
        echo $stamp['weekday'].' ist der beste Tag';
        break;
    
    default:
        # code...
        break;
}


echo '</p>';
?>
    
<?php get_footer(); ?>