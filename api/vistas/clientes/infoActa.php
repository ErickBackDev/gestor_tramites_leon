<?php 

	session_start();
	require_once "../../procesos/conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

	$sql = "SELECT * FROM actas INNER JOIN clientes_actas ON actas.id_acta=clientes_actas.id_acta WHERE clientes_actas.cedula_cliente = '$cedula' ORDER BY acta ASC";
	$result = $conectar->query($sql);
	$nr = mysqli_num_rows($result);

	while ($mostrar = mysqli_fetch_array($result)){
		$acta = $mostrar['acta'];

		$nr--;
		if ($nr<1) {
			echo "<span>".$acta."."."</span>";
		}else{
			echo "<span>".$acta.", "."</span>";
		}

	}
?>