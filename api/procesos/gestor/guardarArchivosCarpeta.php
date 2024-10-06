<?php 

	session_start();
	require_once "../conexion.php";

	$link = (isset($_POST['ruta'])) ? $_POST['ruta'] : "";
    
	$usuario = $_SESSION['usuario'];
			
	foreach ($_FILES['archivos']['tmp_name'] as $key => $tmp_name) {		
		if ($_FILES['archivos']['name'][$key]) {
				
			$filename = $_FILES['archivos']['name'][$key];
			$nombre_final = date('d-m-y'). '-'. date('H-i-s'). '-'. $filename;
			$ruta = '../' . $link . '/' . $nombre_final;
					
			if($_FILES['archivos']['size'] > 0){
				if (move_uploaded_file($_FILES['archivos']['tmp_name'][$key], $ruta)) {
					$data = 1;
				}
			}else{
				$data = null;
			}
		}
	}

	print json_encode($data);

?>