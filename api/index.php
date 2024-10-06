<?php 
	header("Content-Type: text/html"); // Definir el encabezado para que funcione en el entorno de vercel
	include 'inicio.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="librerias/sweetalert/dist/sweetalert2-css.min.css">
</head>
<body>



	<script src="librerias/sweetalert/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		Swal.fire({
			title: "Bienvenido!",
			allowOutsideClick: false,
			allowEscapeKey: false
			});
	</script>

</body>
</html>