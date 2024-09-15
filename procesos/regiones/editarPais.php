<?php 

	require_once "../conexion.php";

	$id_pais = (isset($_POST['id_pais'])) ? $_POST['id_pais'] : "";

	$sql = "SELECT * FROM paises WHERE id_pais = '$id_pais'";
	$result = $conectar->query($sql);
 
	$data = $result->fetch_array(MYSQLI_ASSOC);

	$response = (object) ["data"=>$data];
	print json_encode($response);

?>