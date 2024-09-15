<?php

	session_start();
	require_once "../conexion.php";

	$usuario=$_POST['usuario'];
	$password=sha1($_POST['password']);

	$conusr=mysqli_query($conectar, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
	$nru = mysqli_num_rows($conusr);

	if ($nru==1) {

		$query = mysqli_query($conectar, "SELECT usuarios.id_usuario AS id_usuario, usuarios.nombre AS nombre, usuarios.apellido AS apellido, usuarios.id_cargo AS id_cargo, usuarios.usuario AS usuario, cargos.cargo AS cargo FROM usuarios INNER JOIN cargos ON usuarios.id_cargo=cargos.id_cargo WHERE usuario = '$usuario' AND password = '$password'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			if ($row = $query->fetch_array(MYSQLI_ASSOC)) {
				$_SESSION['id_usuario'] = $row['id_usuario'];
				$_SESSION['usuario'] = $usuario;
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['apellido'] = $row['apellido'];
				$_SESSION['id_cargo'] = $row['id_cargo'];
				$_SESSION['cargo'] = $row['cargo'];
				$data = 1;
			}
		}else{
			$_SESSION['usuario'] = null;
			$data = 3;
		}

	} else {
		$data = 2;
	}

	
	
	print json_encode($data);
?>