<?php 

	require_once "../conexion.php";

	$id_municipio = (isset($_POST['idMunicipio'])) ? $_POST['idMunicipio'] : "";
	$municipioOld = (isset($_POST['municipioOld'])) ? $_POST['municipioOld'] : "";
    $municipio = (isset($_POST['municipioEdit'])) ? $_POST['municipioEdit'] : "";
    $estadoMunId = (isset($_POST['estadoMunEdit'])) ? $_POST['estadoMunEdit'] : "";

	if ($municipio != $municipioOld) {
		$query = mysqli_query($conectar, "SELECT * FROM municipios WHERE municipio = '$municipio' AND id_estado = '$estadoMunId'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$sql = "UPDATE municipios SET municipio='$municipio', id_estado='$estadoMunId'  WHERE id_municipio = '$id_municipio'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= 1;
			}else{
				$data= 3;
			}
		}
	}else{
		$sql = "UPDATE municipios SET municipio='$municipio', id_estado='$estadoMunId'  WHERE id_municipio = '$id_municipio'";
		$resultado = $conectar->query($sql);

		if($resultado){
			$data= 1;
		}else{
			$data= 3;
		}
	}

	print json_encode($data);

?>