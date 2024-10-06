<!DOCTYPE html>
<html>
<head>
	<title>Recuperación</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/recuperacion.png">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/ellipsis.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap-css.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="librerias/sweetalert/dist/sweetalert2-css.min.css">
</head>
<body style="background-color: #e9ecef">

	<div class="contenedor" id="ellipsis" style="display: none;">
		<div class="lds-ellipsis">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Solución de Problemas</h1>
			Si presenta problemas con el software intente probar una de las siguientes opciones.
			<hr>
			<div class="row">
				<div class="col">
					Si experimenta problemas en la pestaña de registro, inicio de sesión o se muestra un mensaje de error en la base de datos, puede probar esta opción.
				</div>
				<div class="col">
					<span class="btn btn-primary btn-lg btn-block" onclick="restablecerDB()">
						Pulse Aqui <span class="fa-solid fa-share"></span>
					</span>
					<!-- DROP DATABASE `gestor_leon`; -->
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					En caso de inconvenientes solo con el usuario registrado como director, puede probar esta opción.
				</div>
				<div class="col">
					<span class="btn btn-primary btn-lg btn-block" onclick="eliminarUserDirector()">
						Pulse Aqui <span class="fa-solid fa-share"></span>
					</span>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					En caso de inconvenientes solo con el usuario registrado como contador, puede probar esta opción.
				</div>
				<div class="col">
					<span class="btn btn-primary btn-lg btn-block" onclick="eliminarUserContador()">
						Pulse Aqui <span class="fa-solid fa-share"></span>
					</span>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					En caso de inconvenientes con los usuarios registrados, puede probar esta opción.
				</div>
				<div class="col">
					<span class="btn btn-primary btn-lg btn-block" onclick="eliminarUsuarios()">
						Pulse Aqui <span class="fa-solid fa-share"></span>
					</span>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col text-center">
					<a href="inicio.php" class="btn btn-secondary">Volver</a><br>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<p align="center">
				Aplicación Web Desarrollada por Erickson Graterol. <br>
				GESTOR DE TRÁMITES ADMINISTRATIVOS "EL LEÓN DE LA CORDILLERA" - SINCE 2021 - Todos los Derechos Reservados. <br>
				Estado Trujillo, Venezuela. <br>
				Inf: 0424-7212439. <br>
			</p>
		</div>
	</div>

	<script src="librerias/jquery/jquery-3.6.0.min.js"></script>
	<script src="librerias/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script src="js/usuarios.js"></script>
	<script src="js/validaciones.js"></script>

</body>
</html>