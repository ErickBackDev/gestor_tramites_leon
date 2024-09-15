<?php

	session_start();
	require_once "../conexion.php";

	$link = (isset($_POST['linkToDir'])) ? $_POST['linkToDir'] : "";

    function eliminarDir($ruta){
		foreach (glob($ruta."/*") as $elemento) {
			if (is_dir($elemento)) {
				eliminarDir($elemento);
			}else{
				unlink($elemento);
			}
		}
	}

	$ruta = "../../archivos/$link";

	eliminarDir($ruta);
	$data = 1;
	

	print json_encode($data);

 ?>