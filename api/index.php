<?php 
	header("Content-Type: text/html"); // Definir el encabezado para que funcione en el entorno de vercel
	include 'inicio.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>



	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
		Swal.fire({
			title: "Bienvenido!",
			allowOutsideClick: false,
			allowEscapeKey: false
			});
	</script>

</body>
</html>