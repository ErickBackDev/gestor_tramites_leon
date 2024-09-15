<?php 

	session_start();
	require_once "../conexion.php";

	$id_municipio = (isset($_POST['id_municipio'])) ? $_POST['id_municipio'] : "";

	$sql = "DELETE FROM municipios WHERE id_municipio = '$id_municipio'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

?>