<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Clientes Consolidados</h1>
			<b>Te recordamos que si eliminas un cliente que tenga archivos en algún trámite, toda la carpeta correspondiente será eliminada automaticamente.</b>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div id="tablaClientesConsolidados"></div>
				</div>
			</div>
		</div>
	</div>

	

	
<?php
	require_once "footer.php";
?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaClientesConsolidados').load("clientes/tablaClientesConsolidados.php");
		});
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>