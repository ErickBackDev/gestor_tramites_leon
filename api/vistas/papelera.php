<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
		$idCargoUser = $_SESSION['id_cargo'];
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Papelera</h1>
				<?php if ($idCargoUser == 1) { ?>
					<br>
					<span class="btn btn-primary" onclick="vaciarPapelera()">
						<span class="fa-solid fa-recycle"></span> Vaciar la Papelera
					</span>
				<?php } ?>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div id="tablaPapelera"></div>
				</div>
			</div>
		</div>
	</div>

	
<?php
	require_once "footer.php";
?>

<script src="../js/papelera.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPapelera').load("papelera/tablaPapelera.php");
	});
</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>