<?php 

	session_start();
	require_once "../conexion.php";

	$idGasto = (isset($_POST['idGasto'])) ? $_POST['idGasto'] : "";

	$sql = "DELETE FROM gastos WHERE id_gasto = '$idGasto'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$data= $nr;
	}else{
		$data= null;
	}

	print json_encode($data);
 ?>