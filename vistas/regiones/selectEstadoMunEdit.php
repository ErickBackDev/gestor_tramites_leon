<?php 

	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM estados ORDER BY estado ASC");

 ?>
 <select name="estadoMunEdit" id="estadoMunEdit" class="form-control" required="">

 	<option selected="" disabled="">Seleccione un estado</option>
	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idEstado = $mostrar['id_estado'];
 			$estado = $mostrar['estado'];
	?>
 	 	<option value="<?php echo $idEstado ?>"> <?php echo $estado ?> </option>
	<?php 
 	 	}
	?>
 </select>