<?php

	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM parroquias ORDER BY parroquia ASC");

 ?>
 <label> Parroquia:</label>
 <select name="parroquiaRes" id="parroquiaRes" class="form-control">
 	<option selected="" disabled="">Seleccione una parroquia</option>
 	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idMunicipio = $mostrar['id_municipio'];
 			$idParroquia = $mostrar['id_parroquia'];
 			$parroquia = $mostrar['parroquia'];
 			if ($idMunicipio == $_GET['municipio']) {
 	 ?>
 	 			<option value="<?php echo $idParroquia ?>"> <?php echo $parroquia ?> </option>
 	 <?php 
 	 		}
 	 	}
 	  ?>
 </select>
 <small class="form-text text-muted">
 	<p>La Parroquia no es Obligatoria.</p>
 </small>