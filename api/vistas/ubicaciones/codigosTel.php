<?php 

	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM paises ORDER BY codigo ASC");

 ?>
<select name="codigoTel" id="codigoTel" class="form-control" required="">
	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idPais = $mostrar['id_pais'];
 			$codigo = $mostrar['codigo'];
 			if ($idPais == $_GET['pais']) {
	?>
 	 	<option selected="" value="<?php echo $codigo ?>"> +<?php echo $codigo ?> </option>
	<?php 
			}
	?>
		<option value="<?php echo $codigo ?>"> +<?php echo $codigo ?> </option>
	<?php 
 	 	}
	?>
 </select>