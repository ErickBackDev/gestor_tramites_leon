<?php 

	require_once "../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM paises ORDER BY pais ASC");

 ?>

 	<option selected="" disabled="" value="0">Seleccione un pais</option>
	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idPais = $mostrar['id_pais'];
 			$pais = $mostrar['pais'];
	?>
 	 	<option value="<?php echo $idPais ?>"> <?php echo $pais ?> </option>
	<?php 
 	 	}
	?>