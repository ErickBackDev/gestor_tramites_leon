<?php 

	require_once "../conexion.php";

	$id_parroquia = (isset($_POST['idParroquia'])) ? $_POST['idParroquia'] : "";
	$parroquiaOld = (isset($_POST['parroquiaOld'])) ? $_POST['parroquiaOld'] : "";
    $parroquia = (isset($_POST['parroquiaEdit'])) ? $_POST['parroquiaEdit'] : "";
    $municipioParId = (isset($_POST['municipioParEdit'])) ? $_POST['municipioParEdit'] : "";

	if ($parroquia != $parroquiaOld) {
		$query = mysqli_query($conectar, "SELECT * FROM parroquias WHERE parroquia = '$parroquia' AND id_municipio = '$municipioParId'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE parroquias SET parroquia='$parroquia', id_municipio='$municipioParId'  WHERE id_parroquia = '$id_parroquia'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE parroquias SET parroquia='$parroquia', id_municipio='$municipioParId'  WHERE id_parroquia = '$id_parroquia'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	print json_encode($data);

?>