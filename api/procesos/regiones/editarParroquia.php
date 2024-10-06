<?php 

	require_once "../conexion.php";

	$id_parroquia = (isset($_POST['id_parroquia'])) ? $_POST['id_parroquia'] : "";

	$sql = "SELECT * FROM parroquias INNER JOIN municipios ON parroquias.id_municipio=municipios.id_municipio WHERE id_parroquia = '$id_parroquia'";
	$result = $conectar->query($sql);
 
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$response = (object) ["data"=>$data];
	print json_encode($response);

?>