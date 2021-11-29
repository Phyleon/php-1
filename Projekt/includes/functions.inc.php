<?php 
/*
Schreibt einen HTML-Header und den Kopf-Bereich der Seite.

@param $title string required -- Titel der Website im Head-bereich --
@param $cs string|array optional -- Pfad zur CSS-Datei(en) -- default null
@param $bootstrap bool optional -- bootstrap nutzen oder nicht -- default false
@param $header string optional -- Ausgabe der Hauptueberschrift im Sichtbaren Bereich -- default NULL
@param $nav array optional -- Wird eine navigation benoetigt, wenn ja:welche Navpunkte -- default NULL
@param $fluid bool optional -- regelt ob die bootstrapklasse container-fluid oder container genutzt werden soll -- default false
@return string HTML-Header und Seiten Kopfbereich
 */
function get_header(string $title,string|array $css = NULL,bool $bootstrap=false, string $header = Null, array $nav = NULL, bool $fluid = false){
    $class_fluid = $fluid?'container-fluid':'container';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars( $title );?></title>
    <?php if($bootstrap): ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <?php endif; ?>
    <?php if(is_array($css)) {foreach ($css as $css_link): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars( $css_link); ?>">
    <?php endforeach; ?> 
    <?php  }else if(!is_null($css)): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($css_link); ?>" >
    <?php endif; ?>
</head>
<body>
    <?php if(!is_null($nav)) get_nav($nav); ?>
    <header>
        <div class="<?php echo $class_fluid; ?> " >
            <h1 class="display-3"><?php echo is_null($header)?$title:$header; ?></h1>
        </div>
    </header>
    <main class="<?php echo $class_fluid; ?>">
<?php 
}

/* 
Schhreibt die Navigationsleiste der HTML-Seite (basierend auf Bootstrap 5, nur eine Ebene).

@param $nav array required
    $nav[0] = Branding
    $nav[1]=array() mit den Menuepunkten (eine Ebene!)
@return string Navigationsleiste fuer die Webseite

 */

function get_nav( array $nav){
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $nav[0]; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php foreach ($nav[1] as $item => $url):?>
                <?php 
                    $class_active = '';
                    $current = '';
                    if(basename($_SERVER['PHP_SELF'])===$url){
                        $class_active = 'active';
                        $current = 'aria-current="page"';
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $class_active; ?>" <?php echo $current; ?> href="<?php echo $url; ?>"><?php echo $item; ?></a> 
                </li>



            <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
<?php     
}

/* 
Schreibt einen Fussbereich einer html-seite

@param $fluid bool optional -- regelt ob eine bootstrap-klasse 'container'bzw.'containert-fluid benutzt werden soll -- default false
@param $bootstrap_js bool optional -- regel ob Bootstrap-JS-Dateien eingebunden werden sollen -- default false
@return string Footer-Angaben fuer die HTML-Seite.

 */

function get_footer(bool $fluid = false, bool $bootstrap_js = false){
    $class_fluid = $fluid?'container-fluid':'container';
?>
</main>
<footer>
<div class=" <?php echo $class_fluid ?> "><p>&copy; <?php echo date('Y'); ?> Maximilian Langenbeck, Kurs: PHP</p></div>

</footer>
<?php if ($bootstrap_js): ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php endif; ?>
</body>
</html>


<?php
}
/**
 * get_db_error( $db, $sql )
 *
 * Gibt eine formatierte Fehlermeldung zu MySQL-Abfragen aus
 *
 * @param object-mysqli $db Server-Kennung
 * @param string $sql zugehörige SQL-Anweisung
 * 
 * @return string Die formatierte Meldung.
 */
function get_db_error( object $db, string $sql ):string {
    $errnum = mysqli_errno( $db );
    $search = array( ';', 'manual', 'near' );
    $replace = array( ';<br>', '<a href="https://mariadb.com/kb/en/mariadb-error-codes/" target="_blank">manual</a>', 'near<br>' );
    $errmsg = str_replace( $search, $replace, mysqli_error( $db ) );
    $errdisplay  = '<div class="alert alert-danger">';
    $errdisplay .= '<h4 class="alert-heading">SQL-Fehler!</h4>';
    $errdisplay .= "<p><b>Fehler-Code:</b> <code>$errnum</code></p>";
    $errdisplay .= '<hr>';
    $errdisplay .= '<p><b>Der SQL-Server meldet:</b><br>';
    $errdisplay .= "<code>$errmsg</code></p>";
    $errdisplay .= '<hr>';
    $errdisplay .= '<p><b>Die fehlerhafte SQL-Anweisung:</b><br>';
    $errdisplay .= '<code>' . highlightText($sql) . '</code></p>';
    $errdisplay .= '</div>';
    return $errdisplay;
}
/**
 * highlightText($text)
 *
 * Formatiert Code-Ausschnitte
 *
 * @autor Stanislav Eckert stanislav.eckert@viszon.de
 * @url https://www.php.net/manual/de/function.highlight-string.php#118550
 *
 * @param string $text der zu formatierende Code
 * 
 * @return string der formatierte Code.
 */
function highlightText(string $text):string {
    $text = trim($text);
    $text = highlight_string("<?php " . $text, true);  // highlight_string() requires opening PHP tag or otherwise it will not colorize the text
    $text = trim($text);
    $text = preg_replace("|^\\<code\\>\\<span style\\=\"color\\: #[a-fA-F0-9]{0,6}\"\\>|", "", $text, 1);  // remove prefix
    $text = preg_replace("|\\</code\\>\$|", "", $text, 1);  // remove suffix 1
    $text = trim($text);  // remove line breaks
    $text = preg_replace("|\\</span\\>\$|", "", $text, 1);  // remove suffix 2
    $text = trim($text);  // remove line breaks
    $text = preg_replace("|^(\\<span style\\=\"color\\: #[a-fA-F0-9]{0,6}\"\\>)(&lt;\\?php&nbsp;)(.*?)(\\</span\\>)|", "\$1\$3\$4", $text);  // remove custom added "<?php "
    return $text;
}