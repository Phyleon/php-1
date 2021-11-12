<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>schnecke</h1>

    <?php 
    
    
    function schnecke($hoehe=4.5,$slide=0.1,$mpd=0.5){
        $pos=0;
        $day=0;
        while($pos<$hoehe){
            $day++;
            $pos+=$mpd;
            if ($pos>$hoehe){
                return $day;
            }
            $pos*=(1-$slide);
        }
    }

    echo schnecke(10,0.05,0.6);
    
    ?>
</body>
</html>