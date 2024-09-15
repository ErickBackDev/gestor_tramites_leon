<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
		$idCargoUser = $_SESSION['id_cargo'];

?>

	<div class="container col-sm-6">
		<div class="jumbotron jumbotron-fluid" style="background-color: white;">
			<div class="container">
				<h1>Registro de Actas</h1>
				<p>Añada actas para poder realizar los trámites de los clientes.</p>
				<hr>
				<form method="POST" id="frmActas" autocomplete="off" onsubmit="return agregarActa()">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Acta:</label>
								<input class="form-control" type="text" name="acta" id="acta" placeholder="Ejemplo: Visa" onkeyup="mayus(this.id, this.value);" required="" maxlength="20">
							</div>
						</div>
					</div>
					<hr>
					<center>
						<?php if ($idCargoUser == 1) { ?>
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