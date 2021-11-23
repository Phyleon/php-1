<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'sichere INSERTS',null,true
);
get_header( ...$args );

if(!empty($_POST)){
    $gerte_name = mysqli_real_escape_string($db,$_POST['gerte_name']);
    $gerte_kateg_id_ref =mysqli_real_escape_string($db, $_POST['gerte_kateg_id_ref']);
    $gerte_beschreibung = mysqli_real_escape_string($db,$_POST['gerte_beschreibung']);
    $sql = "INSERT INTO `tbl_gerichte`(gerte_name,gerte_beschreibung,gerte_kateg_id_ref)VAlUES(?,?,?)";
    $stmt = mysqli_prepare($db,$sql);

    if (false===$stmt) {
        echo get_db_error($db,$sql);
    }else{
        // WErte und Datentypen an die platzhalter binden
        mysqli_stmt_bind_param($stmt,'ssi',$gerte_name,$gerte_beschreibung,$gerte_kateg_id_ref);
        // ausfuehrung
        mysqli_stmt_execute($stmt);
        // liefert die zuletzt hinzugefuegte id
        $id = mysqli_stmt_insert_id($stmt);
        echo '<p class="alert alert-success">';
        echo mysqli_affected_rows($db);
        echo ' Datensaetze wurden hinzugefuegt.<br>Hinzugefuegte ID:'.$id.'</p>';
        mysqli_stmt_close($stmt);
    }
}



?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <h2>Neues Gericht anlegen</h2>
      <p>
          Name des Gerichtes:<br>
          <input type="text" name="gerte_name">
      </p>
      <p>
          Beschreibung:<br>
          <textarea name="gerte_beschreibung" cols="30" rows="10"></textarea>
      </p>
      <p>
          Kategorie:<br>
          <select name="gerte_kateg_id_ref">
              <?php 
              $sql= "SELECT `kateg_name`,`kateg_id` FROM `tbl_kategorien`";
              $result = mysqli_query($db, $sql);
              if(false===$result){echo get_db_error($db,$sql);}else{
                while($row=mysqli_fetch_assoc($result)):?>
    <option value="<?php echo$row['kateg_id']; ?>"><?php echo$row['kateg_name']; ?></option>

             <?php endwhile; 
             }
             ?>
          </select>
          <p><button class="btn btn-outline-dark" type="submit">speichern</button></p>
      </p>
  </form>  
<?php 
mysqli_close($db);
get_footer(); ?>