<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";
	$motivo = (isset($_POST['motivo'])) ? $_POST['motivo'] : "";

	if ($motivo == '') {
	 	$motivo = 'No Especificado';
	}

	$sql = "UPDATE clientes SET consolidado=0, descripcion = '$motivo' WHERE cedula = '$cedula'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

 ?>