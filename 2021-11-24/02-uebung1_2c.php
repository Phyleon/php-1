<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung 1_2c',null,true
);
get_header( ...$args );
$sql="SELECT `hersteller`,`typ`,`artnummer`,`prod` FROM `fp` WHERE `prod` BETWEEN '2008-01-01' and '2008-06-30' ORDER by `prod` ASC;";
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