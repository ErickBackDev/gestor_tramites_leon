<?php 

	require_once "../conexion.php";

	$idActa = (isset($_POST['idActa'])) ? $_POST['idActa'] : "";

	$sql = "SELECT * FROM actas WHERE id_acta = '$idActa'";
	$result = $conectar->query($sql);
	
	$data = $result->fetch_array(MYSQLI_ASSOC);
	print json_encode($data);

 ?>