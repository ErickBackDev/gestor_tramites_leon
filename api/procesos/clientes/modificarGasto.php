<?php 

	require_once "../conexion.php";

	$idGasto = (isset($_POST['idGastoEdit'])) ? $_POST['idGastoEdit'] : "";
	$gastoOld = (isset($_POST['gastoOld'])) ? $_POST['gastoOld'] : "";
	$gasto = (isset($_POST['gastoEdit'])) ? $_POST['gastoEdit'] : "";
	$precio_dolar = (isset($_POST['precio_dolarEdit'])) ? $_POST['precio_dolarEdit'] : "";

	if ($gasto != $gastoOld) {
		$query = mysqli_query($conectar, "SELECT * FROM gastos WHERE gasto = '$gasto'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE gastos SET gasto='$gasto', precio_dolar='$precio_dolar' WHERE id_gasto = '$idGasto'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE gastos SET gasto='$gasto', precio_dolar='$precio_dolar' WHERE id_gasto = '$idGasto'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	print json_encode($data);

 ?>