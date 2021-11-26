<?php
require_once( '../includes/functions.inc.php' );
$database = 'firma';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Mitarbeiterdatenbank',['css/firma.css','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'],true,'<i class="bi bi-person-video2"></i> Mitarbeiterdatenbank'
);
get_header( ...$args );
$actionresult=null;
// Actions
if(!empty($_POST)){
    //echo '<pre>', var_dump( $_POST ), '</pre>';
    $sql='';
    if ($_POST['action']==='insert') {
        $sql="INSERT INTO `tbl_personen` (`perso_id`, `perso_nachname`, `perso_vorname`, `perso_gehalt`, `perso_gtag`, `perso_erstellt`) VALUES (NULL, '".$_POST['na'][0]."', '".$_POST['vo'][0]."', '".strtr($_POST['gh'][0],['.'=>'',','=>'.'])."', '".$_POST['gb'][0]."', current_timestamp())";
    }
    if ($_POST['action']==='update') {
        $pid=$_POST['id'];
        $sql="UPDATE `tbl_personen` SET `perso_nachname` = '".$_POST['na'][$pid]."', `perso_vorname` = '".$_POST['vo'][$pid]."', `perso_gehalt` = '".strtr($_POST['gh'][$pid],['.'=>'',','=>'.'])."', `perso_gtag` = '".$_POST['gb'][$pid]."'  WHERE `tbl_personen`.`perso_id` = ".$pid;
    }
    if ($_POST['action']==='delete') {
        $pid=$_POST['id'];
        $sql ="DELETE FROM `tbl_personen` WHERE `tbl_personen`.`perso_id` = ".$pid;
    }

$actionresult= mysqli_query($db,$sql);  
if($actionresult){get_db_error($db,$sql);}  
}
$sql="SELECT `perso_id`, `perso_nachname`, `perso_vorname`, `perso_gehalt`, `perso_gtag`, `perso_erstellt` FROM `tbl_personen`;";
$result = mysqli_query($db,$sql);
if($result or $actionresult):
    if($actionresult){
    $msg='<div class="alert alert-success"><i class="bi bi-check-square"></i> Der Mitarbeiter wurde erfolgreich ';
    $msg.=match($_POST['action']){'insert'=>'hinzugefuegt!','update'=>'geaendert','delete'=>'geloescht'};

    $msg.='</div>';

}else if(is_null($actionresult)){$msg='';}else{
    $msg='<div class="alert alert-danger"><i class="bi bi-exclamation-square"></i>Die Aktion konnte nicht durchgefuehrt werden, Wenden sie sich bitte an Chuck Norris!</div>';
}
?>

<script>
    function send(action,id) {
      /*   if(action===2){
            if(confirm('Den Mitarbeiter mit der Personalnummer '+id+' wirklich loeschen?'))
            document.form.action.value='delete';
        } */
        document.form.action.value=action===0?'insert':action===1?'update':action===2?'delete':'';
        document.form.id.value= id;
        document.form.submit();
    }
</script>
<?php echo $msg; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
    <input type="hidden" name="action">
    <input type="hidden" name="id">
    <table class="table">
        <tr class="header green">
            <th>angelegt</th>
            <th>Name</th>
            <th>Vorname</th>
            <th>Pers.Nr.</th>
            <th>Gehalt</th>   
            <th>G-Tag</th>
            <th>Aktion</th>
        </tr>
        <tr class="info">
            <td></td>
            <td><input type="text" name="na[0]" class="form-control"></td>
            <td><input type="text" name="vo[0]" class="form-control"></td>
            <td><input type="text" name="pn[0]" class="form-control number"></td>
            <td><input type="text" name="gh[0]" class="form-control number"></td>
            <td><input type="date" name="gb[0]" class="form-control"></td>
            <td class="text-center"><a href="javascript:send(0,0)" title="neu eintragen"><i class="bi bi-person-plus-fill"></i></a></td>
        </tr>
        <?php while ($row=mysqli_fetch_assoc($result)):
           // echo '<pre>', var_dump( $row ), '</pre>';
            $id=$row['perso_id'];
            $erstellt = str_replace(' ','<br>',$row['perso_erstellt']);

            ?>
        <tr>
            <td class="small-fonts number text-success"><?php echo $erstellt; ?></td>
            <td><input type="text" class="form-control" name="na[<?php echo $id;?>]" value="<?php echo $row['perso_nachname']; ?>"></td>
            <td><input type="text" class="form-control" name="vo[<?php echo $id;?>]" value="<?php echo $row['perso_vorname']; ?>"></td>
            <td><input type="text" class="form-control number" name="pn[<?php echo $id;?>]" value="<?php echo $row['perso_id']; ?>"></td>
            <td><input type="text" class="form-control number" name="gh[<?php echo $id;?>]" value="<?php echo number_format($row['perso_gehalt'],2,',','.'); ?>"></td>
            <td><input type="date" class="form-control" name="gb[<?php echo $id;?>]" value="<?php echo$row['perso_gtag'];?>"></td>
            <td class="text-center"><a href="javascript:send(1,<?php echo $id;?>)" title="aendern" class="me-1"><i class="bi bi-pencil"></i></a><a href="javascript:send(2,<?php echo $id;?>)" title="loeschen"><i class="bi bi-door-open-fill"></i></a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</form>
    
<?php else:
    get_db_error($db,$sql);
endif;
 get_footer(); ?>