<?php 

	session_start();
	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$sql = "DELETE FROM clientes WHERE cedula = '$cedula'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= $nr;
	}else{
		$data= null;
	}

	print json_encode($data);
 ?>