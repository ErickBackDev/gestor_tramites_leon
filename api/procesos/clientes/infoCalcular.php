<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$sql = "SELECT cedula, p_nombre, p_apellido, n_actas FROM clientes WHERE cedula = '$cedula'";
	$result = $conectar->query($sql);
 
	$data = $result->fetch_array(MYSQLI_ASSOC);

	print json_encode($data);

?>