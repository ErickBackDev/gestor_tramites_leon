<?php 

	session_start();
	require_once "../conexion.php";

	$cedula = $_POST['cedula'];
	$rif = $_POST['rif'];
	$p_nombre = $_POST['p_nombre'];
	$s_nombre = $_POST['s_nombre'];
	$p_apellido = $_POST['p_apellido'];
	$s_apellido = $_POST['s_apellido'];
	$f_nacimiento = explode("-", $_POST['f_nacimiento']);
	$f_nacimiento = $f_nacimiento[2] . "-" . $f_nacimiento[1] . "-" . $f_nacimiento[0];
	$est_civil = $_POST['est_civil'];
	$sexo = $_POST['sexo'];

	if (isset($_POST['paisNatal'])) {
		$idPaisNatal = $_POST['paisNatal'];
		$consulta = mysqli_query($conectar, "SELECT pais FROM paises WHERE id_pais = '$idPaisNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$paisNatal = $mostrar['pais'];
		}
	}
	
	if (isset($_POST['estadoNatal'])) {
		$idEstadoNatal = $_POST['estadoNatal'];
		$consulta = mysqli_query($conectar, "SELECT estado FROM estados WHERE id_estado = '$idEstadoNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$estadoNatal = $mostrar['estado'];
		}
	}else{
		$estadoNatal = "";
	}

	if (isset($_POST['municipioNatal'])) {
		$idMunicipioNatal = $_POST['municipioNatal'];
		$consulta = mysqli_query($conectar, "SELECT municipio FROM municipios WHERE id_municipio = '$idMunicipioNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$municipioNatal = $mostrar['municipio'];
		}
	}else{
		$municipioNatal = "";
	}

	if (isset($_POST['parroquiaNatal'])) {
		$idParroquiaNatal = $_POST['parroquiaNatal'];
		$consulta = mysqli_query($conectar, "SELECT parroquia FROM parroquias WHERE id_parroquia = '$idParroquiaNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$parroquiaNatal = $mostrar['parroquia'];
		}
	}else{
		$parroquiaNatal = "";
	}

	$espNatal = $_POST['espNatal'];
	$codigoTel = $_POST['codigoTel'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	
	if (isset($_POST['paisRes'])) {
		$idPaisRes = $_POST['paisRes'];
		$consulta = mysqli_query($conectar, "SELECT pais FROM paises WHERE id_pais = '$idPaisRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$paisRes = $mostrar['pais'];
		}
	}

	if (isset($_POST['estadoRes'])) {
		$idEstadoRes = $_POST['estadoRes'];
		$consulta = mysqli_query($conectar, "SELECT estado FROM estados WHERE id_estado = '$idEstadoRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$estadoRes = $mostrar['estado'];
		}
	}else{
		$estadoRes = "";
	}

	if (isset($_POST['municipioRes'])) {
		$idMunicipioRes = $_POST['municipioRes'];
		$consulta = mysqli_query($conectar, "SELECT municipio FROM municipios WHERE id_municipio = '$idMunicipioRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$municipioRes = $mostrar['municipio'];
		}
	}else{
		$municipioRes = "";
	}

	if (isset($_POST['parroquiaRes'])) {
		$idParroquiaRes = $_POST['parroquiaRes'];
		$consulta = mysqli_query($conectar, "SELECT parroquia FROM parroquias WHERE id_parroquia = '$idParroquiaRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$parroquiaRes = $mostrar['parroquia'];
		}
	}else{
		$parroquiaRes = "";
	}
	
	$direccion = $_POST['direccion'];
	$profesion = $_POST['profesion'];
	$exProfesional = $_POST['exProfesional'];
	$exLaboral = $_POST['exLaboral'];

	if (isset($_POST['empleadosCargos'])) {

		$cargo = $_POST['empleadosCargos'];

		$query = mysqli_query($conectar, "SELECT * FROM empleados WHERE cedula = '$cedula'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 2;
		}else{
			$query2 = mysqli_query($conectar, "SELECT * FROM empleados WHERE rif = '$rif'");
			$nr2 = mysqli_num_rows($query2);

			if($nr2==1){
				$data = 3;
			}else{
				if ($cargo==1) {
					$query3 = mysqli_query($conectar, "SELECT * FROM empleados WHERE id_cargo = 1");
					$nr3 = mysqli_num_rows($query3);

					if($nr3==1){
						$data = 4;
					}else{
						$sql="INSERT INTO empleados VALUES(NULL, '$cedula', '$rif', '$p_nombre', '$s_nombre', '$p_apellido', '$s_apellido', '$f_nacimiento', '$est_civil', '$sexo', '$paisNatal', '$estadoNatal', '$municipioNatal', '$parroquiaNatal', '$espNatal', '$codigoTel', '$telefono', '$correo', '$paisRes', '$estadoRes', '$municipioRes', '$parroquiaRes', '$direccion', '$profesion', '$exProfesional', '$exLaboral', '$cargo', NOW())";
						$ejecutar=mysqli_query($conectar,$sql);
						if($ejecutar){
							$asignar = "UPDATE cargos SET asignado = 1 WHERE id_cargo = $cargo";
							$conectar->query($asignar);

							$data = 1;
						}else{
							echo "Hubo Algun Error";
						}
					}
				}else{
					if ($cargo==2) {
						$query4 = mysqli_query($conectar, "SELECT * FROM empleados WHERE id_cargo = 2");
						$nr4 = mysqli_num_rows($query4);

						if($nr4==1){
							$data = 5;
						}else{
							$sql="INSERT INTO empleados VALUES(NULL, '$cedula', '$rif', '$p_nombre', '$s_nombre', '$p_apellido', '$s_apellido', '$f_nacimiento', '$est_civil', '$sexo', '$paisNatal', '$estadoNatal', '$municipioNatal', '$parroquiaNatal', '$espNatal', '$codigoTel', '$telefono', '$correo', '$paisRes', '$estadoRes', '$municipioRes', '$parroquiaRes', '$direccion', '$profesion', '$exProfesional', '$exLaboral', '$cargo', NOW())";
							$ejecutar=mysqli_query($conectar,$sql);
							if($ejecutar){
								$asignar = "UPDATE cargos SET asignado = 1 WHERE id_cargo = $cargo";
								$conectar->query($asignar);

								$data = 1;
							}else{
								echo "Hubo Algun Error";
							}
						}
					}else{
						$sql="INSERT INTO empleados VALUES(NULL, '$cedula', '$rif', '$p_nombre', '$s_nombre', '$p_apellido', '$s_apellido', '$f_nacimiento', '$est_civil', '$sexo', '$paisNatal', '$estadoNatal', '$municipioNatal', '$parroquiaNatal', '$espNatal', '$codigoTel', '$telefono', '$correo', '$paisRes', '$estadoRes', '$municipioRes', '$parroquiaRes', '$direccion', '$profesion', '$exProfesional', '$exLaboral', '$cargo', NOW())";
						$ejecutar=mysqli_query($conectar,$sql);
						if($ejecutar){
							$asignar = "UPDATE cargos SET asignado = 1 WHERE id_cargo = $cargo";
							$conectar->query($asignar);

							$data = 1;
						}else{
							echo "Hubo Algun Error";
						}
					}
				}
			}
		}

	}else {
		$data = 6;
	}

	sleep(1);
	print json_encode($data);
?>