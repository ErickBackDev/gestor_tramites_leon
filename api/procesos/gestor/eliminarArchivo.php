<?php 

	session_start();
	require_once "../conexion.php";

	$link = (isset($_POST['linkToFile'])) ? $_POST['linkToFile'] : "";

	$ruta = "../../archivos/".$link;

	if (unlink($ruta)) {
		$data = 1;
	}else{
		$data = null;
	}
	

	print json_encode($data);

 ?>