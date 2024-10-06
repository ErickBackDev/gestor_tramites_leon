<?php 

	require_once "../conexion.php";

	$link = (isset($_POST['Dir'])) ? $_POST['Dir'] : "";
	$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : "";

	function moverCarpetas($dOrigen, $dDestino) {
		$contOrigen = scandir($dOrigen);
		$link = (isset($_POST['Dir'])) ? $_POST['Dir'] : "";
		foreach($contOrigen as $actas) {
			if(in_array($actas, ['.', '..'])) {
				continue; // Omitir no procesables
			}
			// Verificar que destino existe
			if(!is_dir("$dDestino/$link")) {
				mkdir("$dDestino/$link", 0777, true);
			}
			// Es archivo, mover
			rename("$dOrigen/$actas", "$dDestino/$link/$actas");
		}
	}

	$sql = "UPDATE carpetas SET papelera=0 WHERE id_cliente = '$idCliente'";
	$resultado = $conectar->query($sql);

	$dorigen = "../../archivos/papelera/$link";
	$dfinal = "../../archivos";

	if($resultado){
		moverCarpetas($dorigen, $dfinal);
		rmdir($dorigen);
		$data= 1;
	}else{
		$data= null;
	}

	print json_encode($data);

 ?>