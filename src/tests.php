<?php

//$t = bin2hex(random_bytes(20));
//echo $t;

$d = array();
$d['hello'] = 'hola';
$d['cat'] = 'gato';

foreach ($d as $k => $v){
    echo $k.": ".$v."\n";
}