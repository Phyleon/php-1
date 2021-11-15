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
Schreibt einen Fussbereich einer html-seite

@param $fluid bool optional -- regelt ob eine bootstrap-klasse 'container'bzw.'containert-fluid benutzt werden soll -- default false
@param $bootstrap_js bool optional -- regel ob Bootstrap-JS-Dateien eingebunden werden sollen -- default false
@return string Footer-Angaben fuer die HTML-Seite.

 */

function get_footer(bool $fluid = false, bool $bootstrap_js = false){
    $class_fluid = $fluid?'container-fluid':'container';
?>
</main>
<footer class=" <?php echo $class_fluid ?> " >
<p>&copy; <?php echo date('Y'); ?> Maximilian Langenbeck, Kurs: PHP</p>

</footer>
<?php if ($bootstrap_js): ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php endif; ?>
</body>
</html>


<?php
}