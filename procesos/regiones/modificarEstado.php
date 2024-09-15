<?php 

	require_once "../conexion.php";

	$idPais = (isset($_POST['idPaisEstado'])) ? $_POST['idPaisEstado'] : "";
	$id_estado = (isset($_POST['idEstado'])) ? $_POST['idEstado'] : "";
	$estadoOld = (isset($_POST['estadoOld'])) ? $_POST['estadoOld'] : "";
    $estado = (isset($_POST['estadoEdit'])) ? $_POST['estadoEdit'] : "";

	if ($estado != $estadoOld) {
		$query = mysqli_query($conectar, "SELECT * FROM estados WHERE estado = '$estado' AND id_pais = '$idPais'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE estados SET estado='$estado' WHERE id_estado = '$id_estado'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE estados SET estado='$estado' WHERE id_estado = '$id_estado'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	print json_encode($data);

 ?>