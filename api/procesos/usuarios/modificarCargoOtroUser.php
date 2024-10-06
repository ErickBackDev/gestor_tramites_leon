<?php 

	require_once "../conexion.php";

	$idUsuario = (isset($_POST['idUsuarioEdit'])) ? $_POST['idUsuarioEdit'] : "";
	$cargoOld = (isset($_POST['cargoOldEdit'])) ? $_POST['cargoOldEdit'] : "";
	$cargo = (isset($_POST['cargoOtroUserEdit'])) ? $_POST['cargoOtroUserEdit'] : "";

	if ($cargo != $cargoOld) {
		if ($cargo==1) {
			$query2 = mysqli_query($conectar, "SELECT * FROM usuarios WHERE id_cargo = 1");
			$nr2 = mysqli_num_rows($query2);

			if($nr2==1){
				$data = 2;
			}else{
				$sql = "UPDATE usuarios SET id_cargo='$cargo' WHERE id_usuario = '$idUsuario'";
				$resultado = $conectar->query($sql);

				if($resultado){
					$data= 1;
				}else{
					$data= 4;
				}
			}
		}else{
			if ($cargo==2) {
				$query3 = mysqli_query($conectar, "SELECT * FROM usuarios WHERE id_cargo = 2");
				$nr3 = mysqli_num_rows($query3);

				if($nr3==1){
					$data = 3;
				}else{
					$sql = "UPDATE usuarios SET id_cargo='$cargo' WHERE id_usuario = '$idUsuario'";
					$resultado = $conectar->query($sql);

					if($resultado){
						$data= 1;
					}else{
						$data= 4;
					}
				}
			}else{
				$sql = "UPDATE usuarios SET id_cargo='$cargo' WHERE id_usuario = '$idUsuario'";
				$resultado = $conectar->query($sql);

				if($resultado){
					$data= 1;
				}else{
					$data= 4;
				}
			}
		}
	}else{
		$sql = "UPDATE usuarios SET id_cargo='$cargo' WHERE id_usuario = '$idUsuario'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 4;
		}
	}

	print json_encode($data);

 ?>