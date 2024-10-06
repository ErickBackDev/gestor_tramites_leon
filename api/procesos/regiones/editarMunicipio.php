<?php 

	require_once "../conexion.php";

	$id_municipio = (isset($_POST['id_municipio'])) ? $_POST['id_municipio'] : "";

	$sql = "SELECT * FROM municipios INNER JOIN estados ON municipios.id_estado=estados.id_estado WHERE id_municipio = '$id_municipio'";
	$result = $conectar->query($sql);
 
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$response = (object) ["data"=>$data];
	print json_encode($response);

?>