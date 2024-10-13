<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Historial de Presupuestos</h1>
			<hr>
			<div class="text-center">
				<div class="contenedor-simple-ellipsis" id="simple-ellipsis" style="display: none;">
					<div class="lds-simple-ellipsis">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
			</div>
			<div id="tablaPresupuestos"></div>
		</div>
	</div>

<?php require_once "footer.php"; ?>

	<script type="text/javascript">
		$(document).ready(function(){
			// Make the loader visible
			$('#simple-ellipsis').show();

			// Load the table
			$('#tablaPresupuestos').load("clientes/tablaHistPresupuestos.php", function() {
				// Hide the loader after the table has been loaded
				$('#simple-ellipsis').hide();
			});
		});
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>