<?php 

	session_start();
	require_once "../conexion.php";

	$id_parroquia = (isset($_POST['id_parroquia'])) ? $_POST['id_parroquia'] : "";

	$sql = "DELETE FROM parroquias WHERE id_parroquia = '$id_parroquia'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

?>