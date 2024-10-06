<?php 

	require_once "../conexion.php";

	$idCargo = (isset($_POST['idCargo'])) ? $_POST['idCargo'] : "";

	$sql = "SELECT * FROM cargos WHERE id_cargo = '$idCargo'";
	$result = $conectar->query($sql);
	
	$data = $result->fetch_array(MYSQLI_ASSOC);
	print json_encode($data);

 ?>