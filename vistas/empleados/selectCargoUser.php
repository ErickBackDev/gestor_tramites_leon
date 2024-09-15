<?php 

	session_start();
	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM cargos ORDER BY cargo ASC");

 ?>

 <select name="cargosUser" id="cargosUser" class="form-control" required="">
 	<option selected="" disabled="">Seleccione una opción</option>
 	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$id = $mostrar['id_cargo'];
 			$cargo = $mostrar['cargo'];
 	 ?>
 	 	<option value="<?php echo $id ?>"> <?php echo $cargo ?> </option>
 	 <?php 
 	 	}
 	  ?>
 </select>