<?php 

	session_start();
	require_once "../conexion.php";

	$municipio = $_POST['municipio'];
    $estadoMun = $_POST['estadoMun'];

	$query = mysqli_query($conectar, "SELECT * FROM municipios WHERE municipio = '$municipio' AND id_estado = '$estadoMun'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = 2;
	}else{
		$sql="INSERT INTO municipios VALUES(NULL,'$estadoMun','$municipio')";
		$ejecutar=mysqli_query($conectar,$sql);

		if($ejecutar){
			$data = 1;
		}else{
			echo "Hubo Algun Error";
		}
	}

	print json_encode($data);
?>