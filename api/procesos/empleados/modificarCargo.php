<?php 

	require_once "../conexion.php";

	$idCargo = (isset($_POST['idCargoEdit'])) ? $_POST['idCargoEdit'] : "";
	$cargoOld = (isset($_POST['cargoOld'])) ? $_POST['cargoOld'] : "";
	$cargo = (isset($_POST['cargoEdit'])) ? $_POST['cargoEdit'] : "";

	if ($cargo != $cargoOld) {
		$query = mysqli_query($conectar, "SELECT * FROM cargos WHERE cargo = '$cargo'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE cargos SET cargo='$cargo' WHERE id_cargo = '$idCargo'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE cargos SET cargo='$cargo' WHERE id_cargo = '$idCargo'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	

	print json_encode($data);

 ?>