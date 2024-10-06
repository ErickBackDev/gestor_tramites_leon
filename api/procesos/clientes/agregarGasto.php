<?php 

	session_start();
	require_once "../conexion.php";

	$gasto = $_POST['gasto'];
	$precio_dolar = $_POST['precio_dolar'];

	$query = mysqli_query($conectar, "SELECT * FROM gastos WHERE gasto = '$gasto'");
	$nr = mysqli_num_rows($query);

	if($nr==1){
		$data = $nr;
	}else{
		$sql="INSERT INTO gastos VALUES(NULL, '$gasto', '$precio_dolar', NULL)";
		$ejecutar=mysqli_query($conectar,$sql);
		if(!$ejecutar){
			echo "Hubo Algun Error";
		}else{
			$data = null;
		}
	}

	print json_encode($data);
?>