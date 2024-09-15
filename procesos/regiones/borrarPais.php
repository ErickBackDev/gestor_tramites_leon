<?php 

	session_start();
	require_once "../conexion.php";

	$id_pais = (isset($_POST['id_pais'])) ? $_POST['id_pais'] : "";

	$sql = "DELETE FROM paises WHERE id_pais = '$id_pais'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

?>