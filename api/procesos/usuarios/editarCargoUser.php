<?php 

	require_once "../conexion.php";

	$idUsuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : "";

	$sql = "SELECT * FROM usuarios WHERE id_usuario = '$idUsuario'";
	$result = $conectar->query($sql);
	
	$data = $result->fetch_array(MYSQLI_ASSOC);
	print json_encode($data);

 ?>