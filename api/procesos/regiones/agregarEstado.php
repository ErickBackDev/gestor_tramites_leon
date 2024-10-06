<?php 

	session_start();
	require_once "../conexion.php";

	$idPais = $_POST['paisEst'];
	$estado = $_POST['estado'];

	$query = mysqli_query($conectar, "SELECT * FROM estados WHERE estado = '$estado' AND id_pais = '$idPais'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = 2;
	}else{
		$sql="INSERT INTO estados VALUES (NULL, '$estado', '$idPais', 'n/d')";
		$ejecutar=mysqli_query($conectar,$sql);

		if($ejecutar){
			$data = 1;
		}else{
			echo "Hubo Algun Error";
		}
	}

	print json_encode($data);
?>