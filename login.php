<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<meta charset="UTF-8">
    <link rel="shortcut icon" href="img/login.png">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/sweetalert/dist/sweetalert2.min.css">
</head>
<body background="img/fondo_login.jpg">
	<div class="wrapper fadeInDown">
        <div id="formContent">

            <div class="fadeIn first">
                <img src="img/folder1.png" id="icon" alt="User Icon" />
                <h1>Gestor de Tramites</h1>
                <h3>"El León De La Cordillera"</h3>
            </div>

            <p>Por favor, complete sus credenciales para iniciar sesión.</p>
            <form id="frmLogin" method="POST" autocomplete="off" onsubmit="return ingresar()">
                <input type="text" name="usuario" id="usuario" class="fadeIn second" placeholder="&#128100 Usuario" required="">
                <input type="password" name="password" id="password" class="fadeIn third" placeholder="&#128273 Contraseña" required="">
                <input type="submit" id="btnLogin" class="fadeIn fourth, btn btn-primary" value="Ingresar">
                <div id="formFooter">
                    <a href="registro.php" id="btnRegister" class="btn btn-link">Registrarse</a>o
                    <a class="btn btn-link" id="btnResetPassword" onclick="recovery()">Recuperar Contraseña</a><br>
                    <a href="inicio.php" id="btnPrev" class="btn btn-secondary">Volver</a><br>
                </div>
            </form>        
        </div>
    </div>

<script src="librerias/jquery/jquery-3.6.0.min.js"></script>
<script src="librerias/sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="js/usuarios.js"></script>

</body>
</html>