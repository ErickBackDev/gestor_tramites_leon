<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
		$idCargoUser = $_SESSION['id_cargo'];

?>

	<style>
		/* Make circles that indicate the steps of the form: */
		.step {
			height: 50px;
			width: 50px;
			margin: 0 2px;
			background-color: #bbbbbb;
			border: none;
			border-radius: 50%;
			display: inline-block;
			opacity: 0.5;
			padding: 2.5px;
		}

		/* Mark the active step: */
		.step.active {
			background-color: #4fa3c9;
			opacity: 2;
		}

		#step1, #step2, #step3 {
			color: white;
			font-size: 30px;
		}

	</style>

	<div class="contenedor" id="ellipsis" style="display: none;">
		<div class="lds-ellipsis">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>

	<div class="container col-sm-9">
		<div class="jumbotron jumbotron-fluid" style="background-color: white;">
			<div class="container">
				<h1>Registro de Empleados</h1>
				<p>Asegurese de ingresar todos los datos correctamente ya que algunos no podrán ser modificados más adelante.</p>
				<hr>
				<form method="POST" id="frmEmpleados" autocomplete="off" onsubmit="return agregarEmpleado()">

					<div style="text-align:center;margin-top:40px;">
						<span id="step1" class="step active">1</span>
						<span id="step2" class="step">2</span>
						<span id="step3" class="step">3</span>
					</div>

					<fieldset id="part1" style="display: block;">

						<legend>Información Personal:</legend>

						<div class="row">
							<div class="col">
								<label> Cédula:</label>
								<input type="number" name="cedula" id="cedula" class="form-control" required="" aria-describedby="alertCedula">
								<small class="form-text text-muted">
									<p id="alertCedula">En caso de ser cédula extranjera ingrese simplemente los números.</p>
								</small>
							</div>
							<div class="col">
								<label> RIF:</label>
								<input type="text" name="rif" id="rif" class="form-control" required="" minlength="3" maxlength="12" aria-describedby="alertRif">
								<small class="form-text text-muted">
									<p id="alertRif">En caso de no poseer rif, ingrese la cédula.</p>
								</small>
							</div>
							<div class="col">
								<label> Primer Nombre:</label>
								<input type="text" name="p_nombre" id="p_nombre" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="30" aria-describedby="alertP_nombre">
								<small class="form-text text-muted"><p id="alertP_nombre"></p></small>
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Segundo Nombre:</label>
								<input type="text" name="s_nombre" id="s_nombre" class="form-control" onkeyup="mayus(this.id, this.value);" placeholder="Opcional" maxlength="30">
							</div>
							<div class="col">
								<label> Primer Apellido:</label>
								<input type="text" name="p_apellido" id="p_apellido" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="30" aria-describedby="alertP_apellido">
								<small class="form-text text-muted"><p id="alertP_apellido"></p></small>
							</div>
							<div class="col">
								<label> Segundo Apellido:</label>
								<input type="text" name="s_apellido" id="s_apellido" class="form-control" onkeyup="mayus(this.id, this.value);" placeholder="Opcional" maxlength="30">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Sexo:</label><br>
								<label><input type="radio" name="sexo" id="masculino" value="Masculino" aria-describedby="alertSexo"> Masculino</label><br>
								<label><input type="radio" name="sexo" id="femenino" value="Femenino" aria-describedby="alertSexo"> Femenino</label><br>
								<label><input type="radio" name="sexo" id="otro" value="Otro" aria-describedby="alertSexo"> Otro</label><br>
								<small class="form-text text-muted"><p id="alertSexo"></p></small>
							</div>
							<div class="col">
								<label> Fecha de Nacimiento:</label>
								<input type="text" name="f_nacimiento" id="f_nacimiento" class="form-control" placeholder="dd-mm-aaaa" required="" readonly="" aria-describedby="alertF_nacimiento">
								<small class="form-text text-muted"><p id="alertF_nacimiento"></p></small>
							</div>
							<div class="col">
								<label> Estado Civil:</label>
								<select name="est_civil" id="est_civil" class="form-control" aria-describedby="alertEst_civil">
									<option selected="" disabled="" value="0"> Seleccione una opción</option>
									<option>Soltero</option>
									<option>Casado</option>
									<option>Divorciado</option>
									<option>Concuvino</option>
									<option>Viudo</option>
								</select>
								<small class="form-text text-muted"><p id="alertEst_civil"></p></small>
							</div>
						</div><br>

						<div style="text-align: right;">
							<span class="btn btn-primary" onclick="goPart2()">
								Siguiente <span class="fa-solid fa-arrow-right"></span>
							</span>
						</div>

					</fieldset>

					<fieldset id="part2" style="display: none;">

						<legend>Lugar de Nacimiento:</legend>

						<div class="row">
							<div class="col">
								<label> Pais:</label>
								<select name="paisNatal" id="paisNatal" class="form-control" aria-describedby="alertPaisNatal" onclick="mostrarEstadoNatal(this.value)">
									<?php include "ubicaciones/selectPaisNatal.php" ?>
								</select>
								<small class="form-text text-muted"><p id="alertPaisNatal"></p></small>
							</div>
							<div class="col" id="estadoNatal">
								<label> Estado:</label>
								<select name="estadoNatal" id="estadoNatal" class="form-control">
									<option selected="" disabled="">Seleccione un estado</option>
								</select>
								<small class="form-text text-muted">
									<p>El Estado no es Obligatorio.</p>
								</small>
							</div>
							<div class="col" id="municipioNatal">
								<label> Municipio:</label>
								<select name="municipioNatal" id="municipioNatal" class="form-control">
									<option selected="" disabled="">Seleccione un municipio</option>
								</select>
								<small class="form-text text-muted">
									<p>El Municipio no es Obligatorio.</p>
								</small>
							</div>
						</div><br>
						
						<div class="row">
							<div class="col-sm-4" id="parroquiaNatal">
								<label> Parroquia:</label>
								<select name="parroquiaNatal" id="parroquiaNatal" class="form-control">
									<option selected="" disabled="">Seleccione una parroquia</option>
								</select>
								<small class="form-text text-muted">
									<p>La Parroquia no es Obligatoria.</p>
								</small>
							</div>
							<div class="col">
								<label> Especificación:</label>
								<input type="text" name="espNatal" id="espNatal" class="form-control" onkeyup="mayus(this.id, this.value);" placeholder="Opcional" maxlength="80">
							</div>
						</div><br>

						<legend>Lugar de Residencia:</legend>

						<div class="row">
							<div class="col">
								<label> Pais:</label>
								<select name="paisRes" id="paisRes" class="form-control" aria-describedby="alertPaisRes" onclick="mostrarEstadoRes(this.value); selectTelf(this.value);">
									<?php include "ubicaciones/selectPaisRes.php" ?>
								</select>
								<small class="form-text text-muted"><p id="alertPaisRes"></p></small>
							</div>
							<div class="col" id="estadoRes">
								<label> Estado:</label>
								<select name="estadoRes" id="estadoRes" class="form-control">
									<option selected="" disabled="">Seleccione un estado</option>
								</select>
								<small class="form-text text-muted">
									<p>El Estado no es Obligatorio.</p>
								</small>
							</div>
							<div class="col" id="municipioRes">
								<label> Municipio:</label>
								<select name="municipioRes" id="municipioRes" class="form-control">
									<option selected="" disabled="">Seleccione un municipio</option>
								</select>
								<small class="form-text text-muted">
									<p>El Municipio no es Obligatorio.</p>
								</small>
							</div>
						</div><br>

						<div class="row">
							<div class="col-sm-4" id="parroquiaRes">
								<label> Parroquia:</label>
								<select name="parroquiaRes" id="parroquiaRes" class="form-control">
									<option selected="" disabled="">Seleccione una parroquia</option>
								</select>
								<small class="form-text text-muted">
									<p>La Parroquia no es Obligatoria.</p>
								</small>
							</div>
							<div class="col">
								<label> Dirección de Habitación:</label>
								<input type="text" name="direccion" id="direccion" class="form-control" aria-describedby="alertDireccion" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
								<small class="form-text text-muted"><p id="alertDireccion"></p></small>
							</div>
						</div><br>

						<legend>Informacíon de Contacto:</legend>

						<div class="row">
							<div class="col">
								<label> Teléfono Movil o WhatsApp:</label>
								<div class="row">
									<div class="col-sm-5" id="telf">
										<select name="codigoTel" id="codigoTel" class="form-control" required="">
										</select>
									</div>
									<div class="col-sm-7">
										<input type="number" name="telefono" id="telefono" class="form-control" aria-describedby="alertTelefono">
										<small class="form-text text-muted"><p id="alertTelefono"></p></small>
									</div>
								</div>
							</div>
							<div class="col">
								<label> Correo Electrónico:</label>
								<input type="email" name="correo" id="correo" class="form-control" required="" maxlength="80" aria-describedby="alertCorreo">
								<small class="form-text text-muted"><p id="alertCorreo"></p></small>
							</div>
						</div><br>

						<div style="text-align: right;">
							<span class="btn btn-primary" onclick="backPart1()">
								<span class="fa-solid fa-arrow-left"></span> Atrás
							</span>
							<span class="btn btn-primary" onclick="goPart3()">
								Siguiente <span class="fa-solid fa-arrow-right"></span>
							</span>
						</div>

					</fieldset>

					<fieldset id="part3" style="display: none;">

						<legend>Información Laboral:</legend>

						<div class="row">
							<div class="col">
								<label> Profesión:</label>
								<input type="text" name="profesion" id="profesion" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
							</div>
							<div class="col">
								<label> Experiencia Profesional:</label>
								<input type="text" name="exProfesional" id="exProfesional" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
							</div>
							<div class="col">
								<label> Experiencia Laboral:</label>
								<input type="text" name="exLaboral" id="exLaboral" class="form-control" onkeyup="mayus(this.id, this.value);" required=""  maxlength="80">
							</div>
							<div class="col">
								<label> Cargo:</label>
								<div id="cargarCargos"></div>
							</div>
						</div><br>

						<div style="text-align: right;">
							<span class="btn btn-primary" onclick="backPart2()">
								<span class="fa-solid fa-arrow-left"></span> Atrás
							</span>
						</div>

					</fieldset><br>

					<div class="row">
						<div class="col-sm-6 text-right">
							<input class="btn btn-danger" type="reset" value="Limpiar">
						</div>
						<div class="col-sm-6 text-left">
							<?php if ($idCargoUser == 1 or $idCargoUser == 2) { ?>
								<input id="guardar" class="btn btn-success" type="submit" value="Guardar datos" style="display: none;">
							<?php } else { ?>
								<input id="guardar" class="btn btn-success" type="button" value="Guardar datos" onclick="noAutorizado()" style="display: none;"> 
							<?php } ?>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

<?php require_once "footer.php"; ?>

	<script src="../js/multiform.js"></script>
	<script src="../js/calendario.js"></script>
	<script src="../js/ubicaciones.js"></script>
	<script src="../js/empleados.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#codigoTel').load("ubicaciones/codigosTel.php");
			$('#cargarCargos').load("empleados/selectCargo.php");
		});
	</script>

<?php
	
	} else {
		header("location:../accesodenegado.php");
	}

?>