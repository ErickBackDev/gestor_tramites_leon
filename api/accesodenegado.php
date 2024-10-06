<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" href="img/login.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<?php 

	include 'login.php';

 ?>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
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