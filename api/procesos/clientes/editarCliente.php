<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$sql = "SELECT clientes.id_cliente AS id_cliente, clientes.cedula AS cedula, clientes.rif AS rif, clientes.p_nombre AS p_nombre, clientes.s_nombre AS s_nombre, clientes.p_apellido AS p_apellido, clientes.s_apellido AS s_apellido, clientes.f_nacimiento AS f_nacimiento, clientes.est_civil AS est_civil, clientes.sexo AS sexo, clientes.paisNatal AS paisNatal, clientes.estadoNatal AS estadoNatal, clientes.municipioNatal AS municipioNatal, clientes.parroquiaNatal AS parroquiaNatal, clientes.espNatal AS espNatal, clientes.codigoTel AS codigoTel, clientes.telefono AS telefono, clientes.correo AS correo, clientes.facebook AS facebook, clientes.instagram AS instagram, clientes.telegram AS telegram, clientes.likedIn AS likedIn, clientes.paisRes AS paisRes, clientes.estadoRes AS estadoRes, clientes.municipioRes AS municipioRes, clientes.parroquiaRes AS parroquiaRes, clientes.direccion AS direccion, clientes.n_actas AS n_actas, clientes.prioridad AS prioridad, clientes.fecha AS fecha, clientes.descripcion AS descripcion FROM clientes WHERE cedula = '$cedula'";
	$result = $conectar->query($sql);
	
	$sql2 = "SELECT * FROM actas INNER JOIN clientes_actas ON actas.id_acta=clientes_actas.id_acta WHERE clientes_actas.cedula_cliente = '$cedula' ORDER BY acta ASC";
	$result2 = $conectar->query($sql2);
	$data2 = array();
 
	$data = $result->fetch_array(MYSQLI_ASSOC);
	while($row = $result2->fetch_array(MYSQLI_ASSOC)) {
		$data2[] = $row;
	}

	$response = (object) ["data"=>$data, "actas"=>$data2];
	print json_encode($response);

?>