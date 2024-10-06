<?php 

	require_once "../conexion.php";

	$link = (isset($_POST['linkToDir'])) ? $_POST['linkToDir'] : "";
	$id = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : "";

	function moverCarpetas($dOrigen, $dDestino) {
		$contOrigen = scandir($dOrigen);
		$link = (isset($_POST['linkToDir'])) ? $_POST['linkToDir'] : "";
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

	function dir_is_empty($dOrigen) {
		$handle = opendir($dOrigen);
		while (false !== ($entry = readdir($handle))) {
		  if ($entry != "." && $entry != "..") {
			closedir($handle);
			return false;
		  }
		}
		closedir($handle);
		return true;
	  }

	$sql = "UPDATE carpetas SET papelera=1 WHERE id_cliente = '$id'";
	$resultado = $conectar->query($sql);

	$dorigen = "../../archivos/$link";
	$dfinal = "../../archivos/papelera";

	if($resultado){
		if(dir_is_empty($dorigen) == true) {
			mkdir("$dfinal/$link", 0777, true);
			rmdir($dorigen);
			$data= 1;
		} else {
			moverCarpetas($dorigen, $dfinal);
			rmdir($dorigen);
			$data= 1;
		}
	}else{
		$data= null;
	}

	print json_encode($data);

 ?>