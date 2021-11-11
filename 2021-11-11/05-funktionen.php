<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen</title>
</head>
<body>
    <h1>Funktionen</h1>
    <?php 
    /* Eine Funktion wird definiert */
    function hallo($ausgabe){
        return "<p>Hallo $ausgabe</p>";
        
    }
    // Hier wird die Funktion aufgerufen
    echo hallo('Ewaldi');
    $msg = hallo('Didy');
    echo $msg;


    function viele($a){

        $anz = func_num_args();
        $args= func_get_args();
        echo $anz;
        echo '<pre>', var_dump( $args ), '</pre>';
        echo "der erste parameter is $a.";
        echo '<pre>', var_dump( $a ), '</pre>';
        echo $args[$anz-1];
    }

    // Neuster shizzle seit php 5.7

    function variadisch(...$params){
        echo '<pre>', var_dump( $params ), '</pre>';
    }
    
    function mit(string $mnn, string|array $mvn,string $ber, int $age):string{
        if(is_array($mvn)){
            $mvn = implode(", ", $mvn);
        }
        return "<p>$mvn $mnn ist $ber und $age Jahre alt.</p>";
    }
    
    // Testaufruf
    variadisch(1,5,2,345,5,4,3);
    viele(4,5,6,7);
    echo mit('Langi','Maxi','Hacker',29);
    // variadischer aufruf
    $m_array = ['Langi',['Maxi','Lian Mi'],'Hacker',29.1234];
    echo mit(...$m_array);
    ?>
</body>
</html>