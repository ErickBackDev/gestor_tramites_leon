<?php 

	session_start();
	require_once "../../procesos/conexion.php";

	$usuario = $_SESSION['usuario'];

	$query = mysqli_query($conectar, "SELECT * FROM actas ORDER BY acta ASC");

	while ($mostrar = mysqli_fetch_array($query)) {
		$id = $mostrar['id_acta'];
		$acta = $mostrar['acta'];
?>
		<label>
			<input type="checkbox" name="actas[]" value="<?php echo $id ?>"> <?php echo $acta ?>
		</label>
		<br>
<?php 
	}
?>