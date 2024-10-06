<?php 

	session_start();
	require_once "../conexion.php";

	$idActa = (isset($_POST['idActa'])) ? $_POST['idActa'] : "";

	$sql = "DELETE FROM actas WHERE id_acta = '$idActa'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= $nr;
	}else{
		$data= null;
	}

	print json_encode($data);
 ?>