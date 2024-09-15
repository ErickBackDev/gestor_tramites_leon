<?php 

	session_start();
	require_once "../conexion.php";

	$cargo = $_POST['cargo'];

	$query = mysqli_query($conectar, "SELECT * FROM cargos WHERE cargo = '$cargo'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = $nr;
	}else{
		$sql="INSERT INTO cargos VALUES(NULL, '$cargo', NULL, 0)";
		$ejecutar=mysqli_query($conectar,$sql);
		if(!$ejecutar){
			echo "Hubo Algun Error";
		}else{
			$data = null;
		}
	}

	print json_encode($data);
?>