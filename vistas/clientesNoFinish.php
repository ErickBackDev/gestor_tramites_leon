<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Clientes por Concretar</h1>
			<b>Te recordamos que si eliminas un cliente que tenga archivos en algún trámite, toda la carpeta correspondiente será eliminada automaticamente.</b>
			<hr>
			<div class="row">
				<div class="col-sm-12">
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
					<div id="tablaClientesCangrejos"></div>
				</div>
			</div>
		</div>
	</div>

	

	
<?php
	require_once "footer.php";
?>

	<script type="text/javascript">
		$(document).ready(function(){
			// Make the loader visible
			$('#simple-ellipsis').show();

			// Load the table
			$('#tablaClientesCangrejos').load("clientes/tablaClientesCangrejos.php", function() {
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