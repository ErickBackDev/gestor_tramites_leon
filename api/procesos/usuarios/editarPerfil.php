<?php 

	require_once "../conexion.php";

	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
	$result = $conectar->query($sql);
	
	$data = $result->fetch_array(MYSQLI_ASSOC);
	print json_encode($data);

 ?>