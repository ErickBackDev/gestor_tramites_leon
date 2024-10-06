<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$sql = "UPDATE clientes SET historial=1 WHERE cedula = '$cedula'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

 ?>