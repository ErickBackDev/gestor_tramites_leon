<?php

	session_start();
	require_once "../conexion.php";

    function eliminarDir($ruta){
		foreach (glob($ruta."/*") as $elemento) {
			if (is_dir($elemento)) {
				eliminarDir($elemento);
			}else{
				unlink($elemento);
			}
		}
		rmdir($ruta);

	}

	$ruta = "../../archivos/papelera";

	$sql = "DELETE FROM carpetas WHERE papelera = '1'";
	$resultado = $conectar->query($sql);

	if($resultado){
		eliminarDir($ruta);
		$data = 1;
	}else{
		$data = null;
	}

	print json_encode($data);

 ?>