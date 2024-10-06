<?php 

	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM municipios ORDER BY municipio ASC");

 ?>
 <select name="municipioPar" id="municipioPar" class="form-control" required="">
 	<option selected="" disabled="">Seleccione un municipio</option>
 	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idMunicipio = $mostrar['id_municipio'];
 			$municipio = $mostrar['municipio'];
 	 ?>
 	 			<option value="<?php echo $idMunicipio ?>"> <?php echo $municipio ?> </option>
 	 <?php 
 	 	}
 	  ?>
 </select>