<?php
	$conexion = mysqli_connect("localhost", "root", "", "pharmacy");
	if($conexion) {
		echo "Conexion establecida";
	} else {
		echo "Conexion Fallida";
	}
?>