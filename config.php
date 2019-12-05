<?php
/*SI YA SE YO CREE MI CONEXION, LO SIENTO SOLO ERA PAR UBICARME*/
/* Credenciales de la base de datos.*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dbejemplo');

/* Intentamos conectarnos a nuestra super base de datos en MySQL*/
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Revisamos la conexion para que no se mate tan feo
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
