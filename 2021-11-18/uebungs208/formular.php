<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Seite 208',null,true,
);
get_header( ...$args );
$artikel=[
    'nnc'=>'Nuss-Nougat Creme',
    'pb'=>'Peanutbutter',
    'cc'=>'Cashewcreme',
    'ccn'=>'Chocolatcreme Noir',
];
$_SESSION['names']=[];
foreach ($artikel as $key => $value) {
    $_SESSION['names']+=[$key=>$value];
}
?>
<form action="bestellung.php" method="post">
    <p class="lead">Bitte geben Sie die Bestellmenge an (Einheit: 500g-Glas):</p>
    <table class="table table-bordered border-dark">
        <tr>
            <th>Aufstrich</th>
            <th>Menge</th>
        </tr>
        <tr>
            <td><?php echo $artikel['nnc'] ?></td>
            <td><input type="number" name="nnc"></td>
        </tr>
        <tr>
            <td><?php echo $artikel['pb'] ?></td>
            <td><input type="number" name="pb"></td>
        </tr>
        <tr>
            <td><?php echo $artikel['cc'] ?></td>
            <td><input type="number" name="cc"></td>
        </tr>
        <tr>
            <td><?php echo $artikel['ccn'] ?></td>
            <td><input type="number" name="ccn"></td>
        </tr>
        <tr><td colspan="2">
            <button class="btn btn-dark" name="senden" type="submit">Abschicken</button>
        </td></tr>
    </table>
</form>
<?php get_footer(); ?>