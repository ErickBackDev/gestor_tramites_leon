<?php 

	require_once "../conexion.php";

	$idGasto = (isset($_POST['idGasto'])) ? $_POST['idGasto'] : "";

	$sql = "SELECT * FROM gastos WHERE id_gasto = '$idGasto'";
	$result = $conectar->query($sql);
	
	$data = $result->fetch_array(MYSQLI_ASSOC);
	print json_encode($data);

 ?>