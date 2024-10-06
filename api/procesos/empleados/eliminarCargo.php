<?php 

	session_start();
	require_once "../conexion.php";

	$idCargo = (isset($_POST['idCargo'])) ? $_POST['idCargo'] : "";

	$sql = "DELETE FROM cargos WHERE id_cargo = '$idCargo'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= $nr;
	}else{
		$data= null;
	}

	print json_encode($data);
 ?>