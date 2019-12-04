<?php
// Inicializamos la sesion actual
session_start();

// des-seteamos todas las variables en SESSION
$_SESSION = array();

// Destruimos la session
session_destroy();

// Redirigimos a la pagina de login despues de lincharnos a la session
header("location: index.php");
exit;
?>
