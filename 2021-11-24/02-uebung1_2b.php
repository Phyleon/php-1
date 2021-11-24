<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung 1_b',null,true
);
get_header( ...$args );
$sql='SELECT * FROM `fp` WHERE `preis`<150 AND `gb`>60 ORDER BY `gb` DESC;';
$result=mysqli_query($db,$sql);
if (false===$result){echo get_db_error($db,$sql);}else{
         
echo '<p>',mysqli_num_rows($result),' Datensaetze gefunden<br>';

while ($row =mysqli_fetch_array($result,1)){
       
   
        echo implode(", ",$row),'<br>';
       
    } 
     
 echo '</p>';


?>
<?php } ?>
<?php mysqli_close($db); get_footer(); ?>