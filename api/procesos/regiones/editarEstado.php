<?php 

	require_once "../conexion.php";

	$id_estado = (isset($_POST['id_estado'])) ? $_POST['id_estado'] : "";

	$sql = "SELECT * FROM estados WHERE id_estado = '$id_estado'";
	$result = $conectar->query($sql);
 
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$response = (object) ["data"=>$data];
	print json_encode($response);

?>