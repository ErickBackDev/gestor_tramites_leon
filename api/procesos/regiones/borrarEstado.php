<?php 

	session_start();
	require_once "../conexion.php";

	$id_estado = (isset($_POST['id_estado'])) ? $_POST['id_estado'] : "";

	$sql = "DELETE FROM estados WHERE id_estado = '$id_estado'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

?>