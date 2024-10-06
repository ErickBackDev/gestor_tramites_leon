<?php 

	session_start();
	require_once "../../procesos/conexion.php";

	$usuario = $_SESSION['usuario'];
	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";
	$p_nombre = (isset($_POST['p_nombre'])) ? $_POST['p_nombre'] : "";
	$p_apellido = (isset($_POST['p_apellido'])) ? $_POST['p_apellido'] : "";

	$query = mysqli_query($conectar, "SELECT id_cliente, cedula, p_nombre, p_apellido FROM clientes WHERE historial != 1 ORDER BY p_nombre, cedula ASC");

 ?>

 <select name="archivosCliente" id="archivosCliente" class="form-control">
 	<option selected="" disabled="">Seleccione un cliente</option>
 	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$p_nombre = $mostrar['p_nombre'];
 			$p_apellido = $mostrar['p_apellido'];
 			$cedula = $mostrar['cedula'];
			$id = $mostrar['id_cliente'];
 	 ?>
 	 	<option value="<?php echo $id ?>"> <?php echo $p_nombre, ' ', $p_apellido, ' C.I. ', $cedula ?> </option>
 	 <?php 
 	 	}
 	  ?>
 </select>