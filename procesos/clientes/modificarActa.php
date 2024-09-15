<?php 

	require_once "../conexion.php";

	$idActa = (isset($_POST['idActaEdit'])) ? $_POST['idActaEdit'] : "";
	$actaOld = (isset($_POST['actaOld'])) ? $_POST['actaOld'] : "";
	$acta = (isset($_POST['actaEdit'])) ? $_POST['actaEdit'] : "";

	if ($acta != $actaOld) {
		$query = mysqli_query($conectar, "SELECT * FROM actas WHERE acta = '$acta'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE actas SET acta='$acta' WHERE id_acta = '$idActa'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE actas SET acta='$acta' WHERE id_acta = '$idActa'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	

	print json_encode($data);

 ?>