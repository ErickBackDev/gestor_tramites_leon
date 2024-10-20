<?php 

	session_start();
	require_once "../conexion.php";

	$acta = $_POST['acta'];

	$query = mysqli_query($conectar, "SELECT * FROM actas WHERE acta = '$acta'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = $nr;
	}else{
		$sql="INSERT INTO actas VALUES(NULL, '$acta', NOW())";
		$ejecutar=mysqli_query($conectar,$sql);
		if(!$ejecutar){
			echo "Hubo Algun Error";
		}else{
			$data = null;
		}
	}

	print json_encode($data);
?>