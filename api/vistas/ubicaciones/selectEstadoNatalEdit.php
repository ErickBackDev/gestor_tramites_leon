<?php 

	require_once "../../procesos/conexion.php";

	$query = mysqli_query($conectar, "SELECT * FROM estados ORDER BY estado ASC");

 ?>
 <label> Estado:</label>
 <select name="estadoNatalEdit" id="estadoNatalEdit" class="form-control" onclick="mostrarMunicipioNatalEdit(this.value)">
 	<option selected="" disabled="">Seleccione un estado</option>
	<?php 
 		while ($mostrar = mysqli_fetch_array($query)) {
 			$idPais = $mostrar['id_pais'];
 			$idEstado = $mostrar['id_estado'];
 			$estado = $mostrar['estado'];
 			if ($idPais == $_GET['pais']) {
	?>
 	 	<option value="<?php echo $idEstado ?>"> <?php echo $estado ?> </option>
	<?php 
			}
 	 	}
	?>
 </select>