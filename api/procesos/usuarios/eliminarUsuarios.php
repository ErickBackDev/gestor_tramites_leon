<?php

	require_once "../conexion.php";

	$codConfirm = "gecorleon_07_02_2000";
	$codigo = $_POST['codigo'];

	if ($codigo == $codConfirm) {
		$sql = "TRUNCATE usuarios";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data = 1;
		}else{
			$data = 3;
		}
	}else{
		$data = 2;
	}

	sleep(1);
	print json_encode($data);
?>