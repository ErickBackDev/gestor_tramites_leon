<?php 

	require_once "../conexion.php";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";

    $n_actas = mysqli_query($conectar, "SELECT cedula, n_actas FROM clientes WHERE cedula='$cedula'");

    $aranceles = mysqli_query($conectar, "SELECT id_gasto, gasto, precio_dolar FROM gastos WHERE id_gasto=1");

    while ($mostrar = mysqli_fetch_array($aranceles)) {
		$id_aranceles = $mostrar['id_gasto'];
		$nombre_aranceles = $mostrar['gasto'];
		$precio_aranceles = $mostrar['precio_dolar'];
	}

	while ($mostrar2 = mysqli_fetch_array($n_actas)) {
		$n_actas_c = $mostrar2['n_actas'];
	}

    $data = $precio_aranceles * $n_actas_c;

	print json_encode($data);

 ?>