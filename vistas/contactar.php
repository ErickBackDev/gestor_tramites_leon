<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>
	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Contacto</h1>
			<h5>Si ya leiste el manual de usuario y tienes problemas con el sotfware contacta al desarrollador.</h5>
			<hr style="background-color: black">
			<div class="container">
				<div class="row">
					<div class="col-sm-6" align="center">
						<img src="../img/erickson.jpg" width="52%">
					</div>
					<div class="col-sm-6">
						<h6>Erickson Graterol C.I: 28.078.150</h6>
						<hr>
						Número de Teléfono y WhatsApp:<br>
						0424-7212439
						<hr>
						Correo Electrónico:<br>
						erickson17graterol@gmail.com
						<hr>
						Facebook:<br>
						www.facebook.com/erickson
						<hr>
						Dirección de Habitación:<br>
						Parroquia El Carmen, Segunda Sabana, Sector Valle Verde I, Calle Jumangal III. Boconó estado Trujillo.
					</div>
				</div>
			</div>
			<hr style="background-color: black">
		</div>
	</div>

	<script src="../js/usuarios.js"></script>

<?php

	require_once "footer.php";
	} else {
		header("location:../accesodenegado.php");
	}

?>