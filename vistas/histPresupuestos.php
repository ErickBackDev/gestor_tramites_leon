<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Historial de Presupuestos</h1>
			<hr>
			<div id="tablaPresupuestos"></div>
		</div>
	</div>

<?php require_once "footer.php"; ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaPresupuestos').load("clientes/tablaHistPresupuestos.php");
		});
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>