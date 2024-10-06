<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
		$idCargoUser = $_SESSION['id_cargo'];

?>

	<div class="container col-sm-6">
		<div class="jumbotron jumbotron-fluid" style="background-color: white;">
			<div class="container">
				<h1>Registrar Costos Operacionales</h1>
				<p>Añada registros contables para poder calcular el presupuesto de un cliente cuando sea requerido.</p>
				<hr>
				<form method="POST" id="frmGastos" autocomplete="off" onsubmit="return agregarGasto()">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Gasto:</label>
								<input class="form-control" type="text" name="gasto" id="gasto" placeholder="Descripción" onkeyup="mayus(this.id, this.value);" required="" maxlength="20">
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Precio:</label>
								<input class="form-control" type="number" name="precio_dolar" id="precio_dolar" placeholder="Monto en $" required="">
							</div>
						</div>
					</div>
					<hr>
					<center>
						<?php if ($idCargoUser == 2) { ?>
							<input class="btn btn-success" type="submit" value="Guardar datos">
						<?php } else { ?>
							<span class="btn btn-success" onclick="noAutorizado()">Guardar datos</span>
						<?php } ?>
						<input class="btn btn-danger" type="reset" value="Limpiar">
					</center>
				</form>
			</div>
		</div>
	</div>
	

<?php

	require_once "footer.php";

?>

	<script src="../js/clientes.js"></script>

<?php
	
	} else {
		header("location:../accesodenegado.php");
	}

?>