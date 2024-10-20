<?php 

	session_start();
	require_once "../conexion.php";

	$id_cliente = $_POST['archivosCliente'];
	$usuario = $_SESSION['usuario'];
	$cliente = mysqli_query($conectar, "SELECT id_cliente, cedula, p_nombre, p_apellido FROM clientes WHERE id_cliente=$id_cliente");
	
	$carpeta = mysqli_query($conectar, "SELECT id_cliente FROM carpetas WHERE id_cliente = '$id_cliente'");
	$nr = mysqli_num_rows($carpeta);
	
	if(!$nr==1){
		$sql = "INSERT INTO carpetas VALUES(NULL, '$id_cliente', 0, NOW())";
		$ejecutar = mysqli_query($conectar,$sql);
	}

	while ($mostrar = mysqli_fetch_array($cliente)) {
		$id = $mostrar['id_cliente'];
		$nombre = $mostrar['p_nombre'];
		$apellido = $mostrar['p_apellido'];
		$cedula = $mostrar['cedula'];
		$dataclient = $nombre . ' ' . $apellido . ' C.I. ' . $cedula;
			
		foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {		
			if ($_FILES['archivos']['name'][$key]) {
				
				$filename = $_FILES['archivos']['name'][$key];
				$nombre_final = date('d-m-y'). '-'. date('H-i-s'). '-'. $filename;
				$carpeta = '../../archivos/' . $dataclient . '/';
				$ruta = $carpeta . $nombre_final;
					
				if(!file_exists($carpeta)){
					mkdir($carpeta,0777,true);
				}
					
				if($_FILES['archivos']['size'] > 0){
					if (move_uploaded_file($_FILES['archivos']['tmp_name'][$key], $ruta)) {
						$data = 1;
					}
				}else{
					$data = null;
				}
			}
		}
	}

	print json_encode($data);

?>