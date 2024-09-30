<?php

	$conectar=mysqli_connect('benpb4ui9luo7mm7cwuw-mysql.services.clever-cloud.com','ukqxmoatp1jqy6ge','ID9mnJQf51EwoXfZ5qbS','benpb4ui9luo7mm7cwuw');
	// esta linea de abajo es para q la base de datos reconosca los caracteres especiales
	$conectar->set_charset('utf8mb4');
	if(!$conectar){
		die("No se Pudo Conectar con el Servidor: " . mysqli_connect_error());
	}

?>