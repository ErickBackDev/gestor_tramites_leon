<?php 

	session_start();
	require_once "../conexion.php";

    $cedula = $_POST['cedula'];

    $viaticos = new ArrayIterator($_POST['viaticos']);
    $id_gasto = new ArrayIterator($_POST['id_gasto']);

    $it = new MultipleIterator;
    $it->attachIterator($viaticos);
    $it->attachIterator($id_gasto);

    foreach($it as $values) {
        $presupuesto = "INSERT INTO clientes_gastos VALUES(NULL, '$cedula', '$values[1]', '$values[0]', NULL)";
        $ejecutar = mysqli_query($conectar,$presupuesto);
    }

    if($ejecutar){
        $data = 1;
    }else{
        $data = null;
    }

	print json_encode($data);
?>