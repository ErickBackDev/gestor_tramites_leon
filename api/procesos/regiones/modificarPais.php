<?php 

	require_once "../conexion.php";

	$id_pais = (isset($_POST['idPais'])) ? $_POST['idPais'] : "";
	$paisOld = (isset($_POST['paisOld'])) ? $_POST['paisOld'] : "";
    $pais = (isset($_POST['paisEdit'])) ? $_POST['paisEdit'] : "";
    $codigo = (isset($_POST['codigoEdit'])) ? $_POST['codigoEdit'] : "";

    if ($pais != $paisOld) {
		$query = mysqli_query($conectar, "SELECT * FROM paises WHERE pais = '$pais'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE paises SET pais='$pais', codigo='$codigo' WHERE id_pais = '$id_pais'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE paises SET pais='$pais', codigo='$codigo' WHERE id_pais = '$id_pais'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	print json_encode($data);

 ?>