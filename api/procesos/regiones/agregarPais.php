<?php 

	session_start();
	require_once "../conexion.php";

	$pais = $_POST['pais'];
	$codigo = $_POST['codigo'];

	$query = mysqli_query($conectar, "SELECT * FROM paises WHERE pais = '$pais'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = 2;
	}else{
		$sql="INSERT INTO paises VALUES (NULL, '$pais', '$codigo')";
		$ejecutar=mysqli_query($conectar,$sql);

		if($ejecutar){
			$data = 1;
		}else{
			echo "Hubo Algun Error";
		}
	}

	print json_encode($data);
?>