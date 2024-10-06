<?php 

	require_once "../conexion.php";

	$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : "";

	$sql = "SELECT * FROM clientes WHERE id_cliente = $idCliente";
	$result = $conectar->query($sql);

	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($row['prioridad']==0) {
			$sql = "UPDATE clientes SET prioridad=1 WHERE id_cliente = '$idCliente'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= $nr;
			}else{
				$data= null;
			}
		}else{
			$sql = "UPDATE clientes SET prioridad=0 WHERE id_cliente = '$idCliente'";
			$resultado = $conectar->query($sql);

			if($resultado){
				$data= $nr;
			}else{
				$data= null;
			}
		}
	}

	print json_encode($data);

 ?>