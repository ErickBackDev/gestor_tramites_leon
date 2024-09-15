<?php 

	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM municipios ORDER BY municipio ASC");

 ?>
 <label> Municipio:</label>
 <select name="municipioRes" id="municipioRes" class="form-control" onclick="mostrarParroquiaRes(this.value)">
 	<option selected="" disabled="">Seleccione un municipio</option>
 	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idEstado = $mostrar['id_estado'];
 			$idMunicipio = $mostrar['id_municipio'];
 			$municipio = $mostrar['municipio'];
 			if ($idEstado == $_GET['estado']) {
 	 ?>
 	 			<option value="<?php echo $idMunicipio ?>"> <?php echo $municipio ?> </option>
 	 <?php 
 	 		}
 	 	}
 	  ?>
 </select>
 <small class="form-text text-muted">
 	<p>El Municipio no es Obligatorio.</p>
 </small>