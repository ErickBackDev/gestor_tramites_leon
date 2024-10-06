<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/registro.png">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap-css.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/sweetalert/dist/sweetalert2-css.min.css">
</head>
<body>
	<div class="container">
		<h1 style="text-align: center">Registro de Usuario</h1>
		<p style="text-align: center;"><b>Te recordamos que solo puede haber un director y un contador registrados en el sistema y estos serán quienes tendrán el control del mismo, todo aquel usuario que se registre por fuera de estos dos cargos solo tendrá permisos de lectura.</b></p>
		<hr>

		<form id="frmRegistro" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return registrar()">
			
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col">
					<label for="nombre">Nombre del Trabajador:</label>
					<input type="text" name="nombre" id="nombre" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
				</div>
				<div class="col">
					<label for="apellido">Apellido del Trabajador:</label>
					<input type="text" name="apellido" id="apellido" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col">
					<label for="cargoUser">Cargo del Trabajador:</label>
					<div id="cargarCargosUser"></div>
				</div>
				<div class="col">
					<label for="correo">Correo Electrónico:</label>
					<input type="email" name="correo" id="correo" class="form-control" required="">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col">
					<label for="usuario">Nombre de Usuario:</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">
				</div>
				<div class="col">
					<label for="password">Contraseña o Password:</label>
					<input type="password" name="password" id="password" class="form-control" required="">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col">
					<label for="archivo">Imagen de Usuario:</label>
					<input type="file" name="archivo" id="archivo" class="form-control" accept="image/*" aria-describedby="imgAviso">
					<small id="imgAviso" class="form-text text-muted">
						La imagen de usuario no es obligatoria.
					</small>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col text-left">
					<input class="btn btn-success" type="submit" value="Registrar">
				</div>
				<div class="col text-left">
					<a href="login.php" class="btn btn-primary">Ingresar</a><br>
				</div>
				<div class="col text-right">
					<a href="inicio.php" class="btn btn-secondary">Volver</a><br>
				</div>
				<div class="col text-right">
					<input class="btn btn-danger" type="reset" value="Limpiar">
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div>

<script src="librerias/jquery/jquery-3.6.0.min.js"></script>
<script src="librerias/sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="js/usuarios.js"></script>
<script src="js/validaciones.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#cargarCargosUser').load("vistas/empleados/selectCargoUser.php");
		});
	</script>

</body>
</html>