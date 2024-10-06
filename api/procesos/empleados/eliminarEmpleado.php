<?php 

	session_start();
	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$consulta = "SELECT id_cargo FROM empleados WHERE cedula = '$cedula'";
	$result = $conectar->query($consulta);

	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$idCargo = $row['id_cargo'];
	}

	$sql = "DELETE FROM empleados WHERE cedula = '$cedula'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$query = mysqli_query($conectar, "SELECT id_cargo FROM empleados WHERE id_cargo = '$idCargo'");
		$nr = mysqli_num_rows($query);

		if ($nr < 1) {
			$quitar = "UPDATE cargos SET asignado = 0 WHERE id_cargo = $idCargo";
			$conectar->query($quitar);
		}
		
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);
 ?>