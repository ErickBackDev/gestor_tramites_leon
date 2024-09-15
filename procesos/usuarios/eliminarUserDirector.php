<?php

	require_once "../conexion.php";

	$codConfirm = "gecorleon_07_02_2000";
	$codigo = $_POST['codigo'];

	if ($codigo == $codConfirm) {
		$sql = "DELETE FROM usuarios WHERE id_cargo = 1";
		$resultado = $conectar->query($sql);

		if($resultado){

			$carpeta = '../../img/' . 1 . '/';

			function eliminarDir($carpeta){
				foreach (glob($carpeta."/*") as $elemento) {
					if (is_dir($elemento)) {
						eliminarDir($elemento);
					}else{
						unlink($elemento);
					}
				}
				rmdir($carpeta);
			}

			if (file_exists($carpeta)) {
				eliminarDir($carpeta);		
			}

			$data = 1;
		}else{
			$data = 3;
		}
	}else{
		$data = 2;
	}

	print json_encode($data);
?>