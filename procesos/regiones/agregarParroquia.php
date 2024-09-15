<?php 

	session_start();
	require_once "../conexion.php";

	$parroquia = $_POST['parroquia'];
    $municipioPar = $_POST['municipioPar'];

	$query = mysqli_query($conectar, "SELECT * FROM parroquias WHERE parroquia = '$parroquia' AND id_municipio = '$municipioPar'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = 2;
	}else{
		$sql="INSERT INTO parroquias VALUES(NULL,'$municipioPar','$parroquia')";
		$ejecutar=mysqli_query($conectar,$sql);

		if($ejecutar){
			$data = 1;
		}else{
			echo "Hubo Algun Error";
		}
	}

	print json_encode($data);
?>