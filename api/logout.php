<?php 

	session_start();
	unset($_SESSION['usuario']);
	unset($_SESSION['nombre']);
	unset($_SESSION['apellido']);
	unset($_SESSION['id_cargo']);
	unset($_SESSION['cargo']);
	session_destroy();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="shortcut icon" href="img/home.png">
	<link rel="stylesheet" type="text/css" href="librerias/sweetalert/dist/sweetalert2.min.css">
</head>
<body>

<?php 

	include 'inicio.php';

 ?>

	<script src="librerias/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		Swal.fire({
			position: 'top-end',
			title: 'Sesión Finalizada!',
			text: 'Gracias por usar el gestor de tramites.',
			footer: '<p><b>Desarrollado por: </b><br> Ing. Erickson Graterol</p>',
			toast: true,
			showConfirmButton: false,
			timer: 8000
		});
	</script>

</body>
</html>