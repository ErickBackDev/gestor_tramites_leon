<!DOCTYPE html>
<html>
<head>
	<title>Gestor</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="../img/folder2.png">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/perfil.css">
	<link rel="stylesheet" type="text/css" href="../css/buttons.css">
	<link rel="stylesheet" type="text/css" href="../css/ellipsis.css">
	<link rel="stylesheet" type="text/css" href="../css/simpleEllipsis.css">
	<link rel="stylesheet" type="text/css" href="../css/regiones.css">
	<link href="../librerias/fontawesome/css/fontawesome.css" rel="stylesheet">
	<link href="../librerias/fontawesome/css/brands.css" rel="stylesheet">
	<link href="../librerias/fontawesome/css/solid.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../librerias/sweetalert/dist/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="../librerias/jquery/jquery-ui-1.13.2.blue.light/jquery-ui.min.css">
	<script src="../librerias/jquery/jquery-latest.js"></script>
	<script src="../librerias/jquery/jquery.min.js"></script>
	<script src="../librerias/jquery/jquery-3.6.0.min.js"></script>
	<script src="../librerias/jquery/jquery-ui-1.13.2.blue.light/jquery-ui.min.js"></script>
	<script src="../librerias/bootstrap4/bootstrap.min.js"></script>
</head>
<body style="background-color: #e9ecef">

	<?php 
		
		$idCargoUser = $_SESSION['id_cargo'];
		$usuario = $_SESSION['usuario'];
	 ?>

	<nav class="navbar navbar-expand-lg navbar-dark static-top" style="background-color: #0184ff"> 
		<div class="container">
			<a class="navbar-brand" href="inicio.php">
				<img src="../img/el_leon.jpg" width="60px" title="Logo de la Sociedad">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarToggleExternalContent">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="inicio.php"> <span class="fa-solid fa-house"> </span> Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="gestor.php"> <span class="fas fa-folder-open"> </span> Gestionar</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="clientes.php"> <span class="fa-solid fa-user"></span> Clientes</a>
					</li>
					<?php if ($idCargoUser == 1 OR $idCargoUser ==2) { ?>
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa-solid fa-cash-register"></span> Registrar</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<?php if ($idCargoUser == 1) { ?>
									<a class="dropdown-item" href="agregarCargos.php"> <span class="fa-solid fa-address-card"></span> Registrar Cargos</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="agregarEmpleados.php"> <span class="fa-solid fa-user-tie"></span> Registrar Empleados</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="agregarActas.php"> <span class="fa-solid fa-clipboard"></span> Registrar Actas</a>
								<?php } ?>
								<?php if ($idCargoUser == 2) { ?>
									<a class="dropdown-item" href="agregarGastos.php"> <span class="fa-solid fa-hand-holding-dollar"></span> Registrar Costos Operacionales</a>
								<?php } ?>
							</div>
						</li>
					<?php } ?>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa-solid fa-eye"></span> Ver</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="verCargos.php"> <span class="fa-solid fa-id-card"></span> Ver Cargos</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="verEmpleados.php"> <span class="fa-solid fa-id-card-clip"></span> Ver Empleados</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="verActas.php"> <span class="fa-solid fa-book"></span> Ver Actas</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="verGastos.php"> <span class="fa-solid fa-magnifying-glass-dollar"></span> Ver Registros Contables</a>
							<a class="dropdown-item" href="histPresupuestos.php"> <span class="fa-solid fa-file-invoice-dollar"></span> Historial de Presupuestos</a>
						</div>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa-solid fa-clipboard-user"></span> Historial</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="clientesFinish.php"> <span class="fa-solid fa-handshake"></span> Clientes Consolidados</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="clientesNoFinish.php"> <span class="fa-solid fa-handshake-slash"> </span> Clientes por Concretar</a>
						</div>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="papelera.php"> <span class="fa-solid fa-trash-can"></span> Papelera</a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa-solid fa-circle-question"></span> Soporte</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php if ($idCargoUser == 1) { ?>
								<a class="dropdown-item" href="../procesos/databases/respaldarDB.php"> <span class="fa-solid fa-database"></span> Respaldar Base de Datos</a>
								<a class="dropdown-item" href="../procesos/databases/sobreescribirDB.php"> <span class="fa-solid fa-database"></span>  Sobreescribir Base de Datos</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="regiones.php"> <span class="fa-solid fa-location-dot"></span> Localizaciones Geográficas</a>
								<div class="dropdown-divider"></div>
							<?php } ?>
							<a class="dropdown-item" href="../procesos/usuarios/manual.pdf" target="_blank"> <span class="fa-solid fa-address-book"></span> Descargar Manual de Usuario</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="contactar.php"> <span class="fas fa-phone"></span> Contactar a Soporte Tecnico</a>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<a class="navbar-brand" href="#" title="Calculadora" data-toggle="modal" data-target="#modalCalculadora">
			<span class="fa-solid fa-calculator" title="Calculadora" onclick="modalCalculadora()"> </span>
		</a>

		<div class="dropdown">
			<div class="d-flex justify-content-center h-100" style="position: relative;">
				<div id="dropbtn" class="image_outer_container">
					<div class="green_icon"></div>
					<div class="image_inner_container">
						<a href="#">
							<?php 
								$idUsuario = $_SESSION['id_usuario'];
								$listar = null;

								if (file_exists("../img/".$idUsuario."/")) {
									$dirImg = opendir("../img/".$idUsuario."/");
									while ($elemento = readdir($dirImg)) {
										if (!is_dir("../img/".$idUsuario."/".$elemento)) {
											echo "<img src='../img/".$idUsuario."/".$elemento."'>";
										}
									}
								}else{
									echo '<img src="../img/juan_b_a.jpg">';
								}
							?>
						</a>
					</div>
				</div>
				<button onclick="myFunction()" class="dropbtn">Dropdown</button>
			</div>
			<div id="myDropdown" class="dropdown-content">
				<a href="#" data-toggle="modal" data-target="#modalModificarPerfil" onclick="editarPerfil('<?php echo $usuario; ?>'); modalEditPerfil();"> <span class="fa-solid fa-user"></span> Editar Perfil</a>
				<?php if ($idCargoUser == 1) { ?>
				<a href="#" data-toggle="modal" data-target="#modalModificarOtrosPerfiles" onclick="modalEditOtrosPerfiles();"> <span class="fa-solid fa-user"></span> Editar Otros Perfiles</a>
				<?php } ?>
				<a href="../logout.php"> <span class="fas fa-power-off"></span> Salir</a>
			</div>
		</div>
	</nav>

	<marquee scrolldelay=80; style="background-color: black; height: 60px; color: white;">
		<h1>
			Sociedad Genealógica "El León de la Cordillera".
		</h1>
	</marquee>

	<!-- Modal Edith Perfil -->
	<div class="modal fade" id="modalModificarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Perfil</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetModalEditPerfil()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar su perfil.</p></h6>
					<hr>
				</div><br><br>
				
				<div class="modal-body">

					<p id="textoValidar">Por favor, complete sus credenciales para validar su perfil y poder efectuar la modificación, ingrese los datos con los que inicio sesión.</p>

					<p id="textoModificar" style="display: none;">A continuación se muestran los datos guardados anteriormente, podrá modificar todos los campos.</p>

					<form id="frmValidarUser" method="POST" autocomplete="off" onsubmit="return validarUser()">

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col">
								<label for="usuario">Usuario:</label>
								<input type="text" name="usuario" id="usuario" class="form-control" required="">
							</div>
							<div class="col-sm-3"></div>
						</div><br>

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col">
								<label for="password">Contraseña:</label>
								<input type="password" name="password" id="password" class="form-control"  required="">
							</div>
							<div class="col-sm-3"></div>
						</div><br>

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col text-center">
								<input type="submit" class="btn btn-primary" value="Validar">
							</div>
							<div class="col-sm-3"></div>
						</div>
					</form>
					<hr>

					<form id="frmModificarPerfil" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return modificarPerfil()" style="display: none;">

						<input type="hidden" name="idUsuario" id="idUsuario">
						<div class="row">
							<div class="col">
								<label>Nombre del Trabajador:</label>
								<input type="text" name="nombreEdit" id="nombreEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
							<div class="col">
								<label>Apellido del Trabajador:</label>
								<input type="text" name="apellidoEdit" id="apellidoEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label>Cargo del Trabajador:</label>
								<input type="hidden" name="cargoOld" id="cargoOld">
								<div id="cargarCargosUser"></div>
							</div>
							<div class="col">
								<label>Correo Electrónico:</label>
								<input type="email" name="correoEdit" id="correoEdit" class="form-control" required="">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<b>Por razones de seguridad no mostramos el nombre de usuario, si no desea modificar dicho campo dejelo en blanco; por otro lado deberá volver a ingresar la contraseña ya sea una nueva o la antigua.</b>
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label>Nombre de Usuario:</label>
								<input type="hidden" name="usuarioOld" id="usuarioOld">
								<input type="text" name="usuarioEdit" id="usuarioEdit" class="form-control">
							</div>
							<div class="col">
								<label>Contraseña o Password:</label>
								<input type="hidden" name="passwordOld" id="passwordOld">
								<input type="password" name="passwordEdit" id="passwordEdit" class="form-control" required="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label>Imagen de Usuario:</label>
								<input type="file" name="archivo" id="archivo" class="form-control" accept="image/*">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<?php 
								$idUsuario = $_SESSION['id_usuario'];
								$listar = null;

								if (file_exists("../img/".$idUsuario."/")) {
									$dirImg = opendir("../img/".$idUsuario."/");
									while ($elemento = readdir($dirImg)) {
										if (!is_dir("../img/".$idUsuario."/".$elemento)) {
											echo "<img width='100%' src='../img/".$idUsuario."/".$elemento."'>";
										}
									}
								}else{
									echo '<img width="100%" src="../img/juan_b_a.jpg">';
								}
								?>
							</div>
							<div class="col">
								<br><br><br>
								Esta es la imagen que se muestra en su perfil.
							</div>
						</div><br>

						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarPerfil" onclick="resetModalEditPerfil()"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Edith Otros Perfiles -->
	<div class="modal fade" id="modalModificarOtrosPerfiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Otros Perfiles</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetModalEditOtrosPerfiles()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar el perfil de todos los usuarios.</p></h6>
					<hr>
				</div><br><br>
				
				<div class="modal-body">

					<p id="textoOtroValidar">Por favor, complete sus credenciales para validar su perfil y poder efectuar la modificación, ingrese los datos con los que inicio sesión.</p>

					<p id="textoOtroModificar" style="display: none;">A continuación se muestran los usuarios registrados, solo podrá modificar los cargos.</p>

					<form id="frmValidarOtroUser" method="POST" autocomplete="off" onsubmit="return validarOtroUser()">

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col">
								<label for="usuario">Usuario:</label>
								<input type="text" name="usuario" id="usuario" class="form-control" required="">
							</div>
							<div class="col-sm-3"></div>
						</div><br>

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col">
								<label for="password">Contraseña:</label>
								<input type="password" name="password" id="password" class="form-control"  required="">
							</div>
							<div class="col-sm-3"></div>
						</div><br>

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col text-center">
								<input type="submit" class="btn btn-primary" value="Validar">
							</div>
							<div class="col-sm-3"></div>
						</div>
					</form>

					<div id="editCargo" style="display: none;">
						<div class="col">
							<h6><p style="text-align: justify;">
							Podrá modificar el cargo del empleado selecionado.</p></h6>
							<hr>
						</div>

						<div>
							<form id="frmModificarCargoOtroUser" method="POST" autocomplete="off" onsubmit="return modificarCargoOtroUser()">
								<input type="hidden" name="idUsuarioEdit" id="idUsuarioEdit">
								<input type="hidden" name="cargoOldEdit" id="cargoOldEdit">
								<div class="row">
									<div class="col">
										<label>Cargo:</label>
										<div id="cargarCargosOtroUser"></div>
									</div>
								</div><br>
								<div>
									<button type="button" class="btn btn-secondary" onclick="noEditCargoOtroUser()" id="btnNoEditCargoOtroUser"> Cerrar</button>
									<input type="submit" class="btn btn-warning" value="Modificar">
								</div>
								<hr>
							</form>
						</div>
					</div>

					<div id="ModificarOtrosPerfiles" style="display: none;"></div>	

						<br>
						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarOtrosPerfiles" onclick="resetModalEditOtrosPerfiles()"> Cerrar</button>
                        </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Calculadora-->
	<div class="modal fade" id="modalCalculadora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #e9ecef">
					<h4 class="modal-title" id="exampleModalLabel">Calculadora</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetCalculadora()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="modal-body">
				
					<div style="text-align:center; ">
						<table align="center">
							<tr>
								<div id="cantidad1" style="text-align: center;"></div>
								<input id="calculador" autofocus type="number" name="btn" style="text-align:right;">
							</tr>
							<tr>
								<td><button id="btnca">CA</button></td>
								<td><button id="btndiv">/</button></td>
								<td><button id="btnmulti">x</button></td>
								<td><button id="btnc">C</button></td>
							</tr>
							<tr>
								<td><button id="btn7">7</button></td>
								<td><button id="btn8">8</button></td>
								<td><button id="btn9">9</button></td>
								<td><button id="btnraiz">&#8730</button></td>
							</tr>
							<tr>
								<td><button id="btn4">4</button></td>
								<td><button id="btn5">5</button></td>
								<td><button id="btn6">6</button></td>
								<td><button id="btnmen">-</button></td>
							</tr>
							<tr>
								<td><button id="btn1">1</button></td>
								<td><button id="btn2">2</button></td>
								<td><button id="btn3">3</button></td>
								<td><button id="btnsum">+</button></td>
							</tr>
							<tr>
								<td><button id="btn0">0</button></td>
								<td><button id="btnpunto">.</button></td>
								<td><button id="btnporce">%</button></td>
								<td><button id="btnigual" onclick="operacionCompleta()">=</button></td>
							</tr>
						</table>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarCalculadora" onclick="resetCalculadora()"> Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#btnc').click(function(){
				$('#calculador').val("");
			});

			$('#btnca').click(function(){
				$('#calculador').val("");
				$('#cantidad1').text("");
			});

			crearCadenaNumero('btn0',0);
			crearCadenaNumero('btn1',1);
			crearCadenaNumero('btn2',2);
			crearCadenaNumero('btn3',3);
			crearCadenaNumero('btn4',4);
			crearCadenaNumero('btn5',5);
			crearCadenaNumero('btn6',6);
			crearCadenaNumero('btn7',7);
			crearCadenaNumero('btn8',8);
			crearCadenaNumero('btn9',9);
			crearCadenaNumero('btnpunto','.');

			crearOperacion("btndiv","/");
			crearOperacion("btnmulti","x");
			crearOperacion("btnsum","+");
			crearOperacion("btnmen","-");
			crearOperacion("btnraiz","v");
			crearOperacion("btnporce","%");
		});
	</script>

	<script type="text/javascript">
		function myFunction() {
			document.getElementById("myDropdown").classList.toggle("show");
		}

		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {
				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
						openDropdown.classList.remove('show');
					}
				}
			}
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#cargarCargosUser').load("empleados/selectCargoUserEdit.php");
			$('#cargarCargosOtroUser').load("empleados/selectCargoOtroUserEdit.php");
			$('#ModificarOtrosPerfiles').load("usuarios/tablaUsuarios.php");
		});
	</script>

	<script src="../js/calculadora.js"></script>	