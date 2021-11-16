<?php
require_once'functions.inc.php';
$args =['test',['css1','css2'],true,null,['Lian Mi Technologie',['Startseite'=>'test2.php','Ueber uns'=>'test.php']],true];

get_header(...$args);
get_footer(true,true);
