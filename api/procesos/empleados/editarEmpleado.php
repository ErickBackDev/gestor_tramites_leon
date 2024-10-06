<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$sql = "SELECT empleados.cedula AS cedula, empleados.rif AS rif, empleados.p_nombre AS p_nombre, empleados.s_nombre AS s_nombre, empleados.p_apellido AS p_apellido, empleados.s_apellido AS s_apellido, empleados.f_nacimiento AS f_nacimiento, empleados.est_civil AS est_civil, empleados.sexo AS sexo, empleados.paisNatal AS paisNatal, empleados.estadoNatal AS estadoNatal, empleados.municipioNatal AS municipioNatal, empleados.parroquiaNatal AS parroquiaNatal, empleados.espNatal AS espNatal, empleados.codigoTel AS codigoTel, empleados.telefono AS telefono, empleados.correo AS correo, empleados.paisRes AS paisRes, empleados.estadoRes AS estadoRes, empleados.municipioRes AS municipioRes, empleados.parroquiaRes AS parroquiaRes, empleados.direccion AS direccion, empleados.profesion AS profesion, empleados.exProfesional AS exProfesional, empleados.exLaboral AS exLaboral, empleados.id_cargo, empleados.fecha AS fecha, cargos.cargo AS cargo FROM empleados INNER JOIN cargos ON empleados.id_cargo = cargos.id_cargo WHERE cedula = '$cedula'";
	$result = $conectar->query($sql);
	
	$data = $result->fetch_array(MYSQLI_ASSOC);
	print json_encode($data);

 ?>