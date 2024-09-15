<?php 

	session_start();
	require_once "../conexion.php";

	$link = (isset($_POST['linkToDir'])) ? $_POST['linkToDir'] : "";
    $idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : "";

    function eliminarDir($ruta){
		foreach (glob($ruta."/*") as $elemento) {
			if (is_dir($elemento)) {
				eliminarDir($elemento);
			}else{
				unlink($elemento);
			}
		}
		rmdir($ruta);
	}

	$ruta = "../../archivos/papelera/".$link;

	$sql = "DELETE FROM carpetas WHERE id_cliente = '$idCliente'";
	$resultado = $conectar->query($sql);

	if($resultado){
		eliminarDir($ruta);
		$data = 1;
	}else{
		$data = null;
	}

	print json_encode($data);

 ?>