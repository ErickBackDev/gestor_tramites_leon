<?php

	session_start();
	require_once "../conexion.php";

	$usuario=$_POST['usuario'];
	$password=sha1($_POST['password']);

	if ($usuario==$_SESSION['usuario']) {
		$query = mysqli_query($conectar, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");
		$nr = mysqli_num_rows($query);

		if($nr==1){
			$data = 1;
		}else{
			$data = null;
		}	
	}
	
	print json_encode($data);
?>