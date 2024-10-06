<?php 

	require_once "../conexion.php";

	$idCargo = (isset($_POST['idCargo'])) ? $_POST['idCargo'] : "";

	$sql = "SELECT * FROM cargos WHERE id_cargo = $idCargo";
	$result = $conectar->query($sql);

	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($row['asignado']==0) {
			$sql = "UPDATE cargos SET asignado=1 WHERE id_cargo = '$idCargo'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= $nr;
			}else{
				$data= null;
			}
		}else{
			$sql = "UPDATE cargos SET asignado=0 WHERE id_cargo = '$idCargo'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= $nr;
			}else{
				$data= null;
			}
		}
	}

	print json_encode($data);

 ?>