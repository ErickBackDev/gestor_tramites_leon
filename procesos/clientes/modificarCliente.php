<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedulaEdit'])) ? $_POST['cedulaEdit'] : "";
	$rif = (isset($_POST['rifEdit'])) ? $_POST['rifEdit'] : "";
	$p_nombre = (isset($_POST['p_nombreEdit'])) ? $_POST['p_nombreEdit'] : "";
	$s_nombre = (isset($_POST['s_nombreEdit'])) ? $_POST['s_nombreEdit'] : "";
	$p_apellido = (isset($_POST['p_apellidoEdit'])) ? $_POST['p_apellidoEdit'] : "";
	$s_apellido = (isset($_POST['s_apellidoEdit'])) ? $_POST['s_apellidoEdit'] : "";
	$sexo = (isset($_POST['sexoEdit'])) ? $_POST['sexoEdit'] : "";

	$f_nacimientoOld = (isset($_POST['f_nacimientoOld'])) ? $_POST['f_nacimientoOld'] : "";
	$f_nacimiento = (isset($_POST['f_nacimientoEdit'])) ? $_POST['f_nacimientoEdit'] : "";

	if ($f_nacimiento != $f_nacimientoOld) {
		$f_nacimiento = explode("-", (isset($_POST['f_nacimientoEdit'])) ? $_POST['f_nacimientoEdit'] : "");
		$f_nacimiento = $f_nacimiento[2] . "-" . $f_nacimiento[1] . "-" . $f_nacimiento[0];
	}else{
		$f_nacimiento = $f_nacimientoOld;
	}

	$est_civil = (isset($_POST['est_civilEdit'])) ? $_POST['est_civilEdit'] : "";

	$paisNatalOld = (isset($_POST['paisNatalOld'])) ? $_POST['paisNatalOld'] : "";
	$paisNatalEdit = (isset($_POST['paisNatalEdit'])) ? $_POST['paisNatalEdit'] : "";

	if ($paisNatalEdit != $paisNatalOld) {
		$idPaisNatal = $paisNatalEdit;
		$consulta = mysqli_query($conectar, "SELECT pais FROM paises WHERE id_pais = '$idPaisNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$paisNatal = $mostrar['pais'];
		}
	}else{
		$paisNatal = $paisNatalOld;
	}

	$estadoNatalOld = (isset($_POST['estadoNatalOld'])) ? $_POST['estadoNatalOld'] : "";
	$estadoNatalEdit = (isset($_POST['estadoNatalEdit'])) ? $_POST['estadoNatalEdit'] : "";

	if ($estadoNatalEdit != $estadoNatalOld) {
		$idEstadoNatal = $estadoNatalEdit;
		$consulta = mysqli_query($conectar, "SELECT estado FROM estados WHERE id_estado = '$idEstadoNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$estadoNatal = $mostrar['estado'];
		}
	}else{
		$estadoNatal = $estadoNatalOld;
	}

	$municipioNatalOld = (isset($_POST['municipioNatalOld'])) ? $_POST['municipioNatalOld'] : "";
	$municipioNatalEdit = (isset($_POST['municipioNatalEdit'])) ? $_POST['municipioNatalEdit'] : "";

	if ($municipioNatalEdit != $municipioNatalOld) {
		$idMunicipioNatal = $municipioNatalEdit;
		$consulta = mysqli_query($conectar, "SELECT municipio FROM municipios WHERE id_municipio = '$idMunicipioNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$municipioNatal = $mostrar['municipio'];
		}
	}else{
		$municipioNatal = $municipioNatalOld;
	}

	$parroquiaNatalOld = (isset($_POST['parroquiaNatalOld'])) ? $_POST['parroquiaNatalOld'] : "";
	$parroquiaNatalEdit = (isset($_POST['parroquiaNatalEdit'])) ? $_POST['parroquiaNatalEdit'] : "";

	if ($parroquiaNatalEdit != $parroquiaNatalOld) {
		$idParroquiaNatal = $parroquiaNatalEdit;
		$consulta = mysqli_query($conectar, "SELECT parroquia FROM parroquias WHERE id_parroquia = '$idParroquiaNatal'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$parroquiaNatal = $mostrar['parroquia'];
		}
	}else{
		$parroquiaNatal = $parroquiaNatalOld;
	}
	
	$espNatal = (isset($_POST['espNatalEdit'])) ? $_POST['espNatalEdit'] : "";
	$codigoTel = (isset($_POST['codigoTelEdit'])) ? $_POST['codigoTelEdit'] : "";
	$telefono = (isset($_POST['telefonoEdit'])) ? $_POST['telefonoEdit'] : "";
	$correo = (isset($_POST['emailEdit'])) ? $_POST['emailEdit'] : "";
	$facebook = (isset($_POST['facebookEdit'])) ? $_POST['facebookEdit'] : "";
	$instagram = (isset($_POST['instagramEdit'])) ? $_POST['instagramEdit'] : "";
	$telegram = (isset($_POST['telegramEdit'])) ? $_POST['telegramEdit'] : "";
	$likedIn = (isset($_POST['likedInEdit'])) ? $_POST['likedInEdit'] : "";

	$paisResOld = (isset($_POST['paisResOld'])) ? $_POST['paisResOld'] : "";
	$paisResEdit = (isset($_POST['paisResEdit'])) ? $_POST['paisResEdit'] : "";

	if ($paisResEdit != $paisResOld) {
		$idPaisRes = $paisResEdit;
		$consulta = mysqli_query($conectar, "SELECT pais FROM paises WHERE id_pais = '$idPaisRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$paisRes = $mostrar['pais'];
		}
	}else{
		$paisRes = $paisResOld;
	}

	$estadoResOld = (isset($_POST['estadoResOld'])) ? $_POST['estadoResOld'] : "";
	$estadoResEdit = (isset($_POST['estadoResEdit'])) ? $_POST['estadoResEdit'] : "";

	if ($estadoResEdit != $estadoResOld) {
		$idEstadoRes = $estadoResEdit;
		$consulta = mysqli_query($conectar, "SELECT estado FROM estados WHERE id_estado = '$idEstadoRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$estadoRes = $mostrar['estado'];
		}
	}else{
		$estadoRes = $estadoResOld;
	}

	$municipioResOld = (isset($_POST['municipioResOld'])) ? $_POST['municipioResOld'] : "";
	$municipioResEdit = (isset($_POST['municipioResEdit'])) ? $_POST['municipioResEdit'] : "";

	if ($municipioResEdit != $municipioResOld) {
		$idMunicipioRes = $municipioResEdit;
		$consulta = mysqli_query($conectar, "SELECT municipio FROM municipios WHERE id_municipio = '$idMunicipioRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$municipioRes = $mostrar['municipio'];
		}
	}else{
		$municipioRes = $municipioResOld;
	}

	$parroquiaResOld = (isset($_POST['parroquiaResOld'])) ? $_POST['parroquiaResOld'] : "";
	$parroquiaResEdit = (isset($_POST['parroquiaResEdit'])) ? $_POST['parroquiaResEdit'] : "";

	if ($parroquiaResEdit != $parroquiaResOld) {
		$idParroquiaRes = $parroquiaResEdit;
		$consulta = mysqli_query($conectar, "SELECT parroquia FROM parroquias WHERE id_parroquia = '$idParroquiaRes'");
		while ($mostrar = mysqli_fetch_array($consulta)) {
			$parroquiaRes = $mostrar['parroquia'];
		}
	}else{
		$parroquiaRes = $parroquiaResOld;
	}

	$direccion = (isset($_POST['direccionEdit'])) ? $_POST['direccionEdit'] : "";
	$n_actas = (isset($_POST['n_actasEdit'])) ? $_POST['n_actasEdit'] : "";
	$prioridad = (isset($_POST['prioridadEdit'])) ? $_POST['prioridadEdit'] : "";

	$sql = "UPDATE clientes SET rif='$rif', p_nombre='$p_nombre', s_nombre='$s_nombre', p_apellido='$p_apellido', s_apellido='$s_apellido', f_nacimiento='$f_nacimiento', est_civil='$est_civil', sexo='$sexo', paisNatal='$paisNatal', estadoNatal='$estadoNatal', municipioNatal='$municipioNatal', parroquiaNatal='$parroquiaNatal', espNatal='$espNatal', codigoTel='$codigoTel', telefono='$telefono', correo='$correo', facebook='$facebook', instagram='$instagram', telegram='$telegram', likedIn='$likedIn', paisRes='$paisRes', estadoRes='$estadoRes', municipioRes='$municipioRes', parroquiaRes='$parroquiaRes', direccion='$direccion', n_actas='$n_actas', prioridad='$prioridad' WHERE cedula = '$cedula'";
	$resultado = $conectar->query($sql);

	if($resultado){
		$borrar = "DELETE FROM clientes_actas WHERE cedula_cliente = '$cedula'";
		$conectar->query($borrar);
		foreach ($_POST['actas'] as $idActa) {
			$acta = "INSERT INTO clientes_actas VALUES(NULL, '$cedula', '$idActa')";
			mysqli_query($conectar,$acta);
		}
		$data= 1;
	}else{
		$data= null;
	}

	sleep(1);
	print json_encode($data);

 ?>