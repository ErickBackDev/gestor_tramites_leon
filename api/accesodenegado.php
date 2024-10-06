<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" href="img/login.png">
	<link rel="stylesheet" type="text/css" href="librerias/sweetalert/dist/sweetalert2-css.min.css">
</head>
<body>

<?php 

	include 'login.php';

 ?>

	<script src="librerias/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		Swal.fire({
			position: 'bottom-end',
			icon: 'error',
			title: 'Acesso Denagado!',
			text: 'Debes iniciar sesion para poder acceder.',
			toast: true,
			showConfirmButton: false,
			timer: 6000
		});
	</script>

</body>
</html>