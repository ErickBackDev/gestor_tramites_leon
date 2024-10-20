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

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Clientes</h1>

			<?php if ($idCargoUser == 1) { ?>
			<div class="row">
				<div class="col-sm-4">
					<span class="btn btn-primary" data-toggle="modal" data-target="#modalAggClientes" onclick="modalAggCliente()">
						<span class="fa-solid fa-user-plus"></span> Agregar Nuevo Cliente
					</span>
				</div>
			</div><br>
			<?php } ?>
			<b>Te recordamos que los registros de los clientes y los archivos correspondientes a los mismos se gestionan por separado, es decir, en sus respectivas pestañas.</b>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div class="text-center">
						<div class="contenedor-simple-ellipsis" id="simple-ellipsis" style="display: none;">
							<div class="lds-simple-ellipsis">
								<div></div>
								<div></div>
								<div></div>
								<div></div>
							</div>
						</div>
					</div>
					<div id="tablaClientes"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Agregar-->
	<div class="modal fade" id="modalAggClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #204cf9">
					<h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetFormAggClientes()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Asegurese de llenar todos los campos y de ingresar los datos correctamente ya que todos son requeridos y algunos no podrán ser modificados más adelante.</p></h6>
				</div>
				
				<div class="modal-body">
					<form id="frmClientes" method="POST" autocomplete="off" onsubmit="return agregarCliente()">

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
									<input type="text" name="rif" id="rif" class="form-control" required="" minlength="3" maxlength="15" aria-describedby="alertRif">
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
									<input type="text" name="direccion" id="direccion" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80" aria-describedby="alertDireccion">
									<small class="form-text text-muted"><p id="alertDireccion"></p></small>
								</div>
							</div><br>

							<legend>Informacíon de Contacto:</legend>

							<div class="row">
								<div class="col">
									<label> Teléfono Movil o WhatsApp:</label>
									<div class="row">
										<div class="col-sm-5" id="telf">
											<select name="codigoTel" id="codigoTel" class="form-control">
											</select>
										</div>
										<div class="col-sm-7">
											<input type="number" name="telefono" id="telefono" class="form-control" aria-describedby="alertTelefono">
										</div>
									</div>
									<small class="form-text text-muted"><p id="alertTelefono"></p></small>
								</div>
								<div class="col">
									<label> Correo Electrónico:</label>
									<input type="email" name="correo" id="correo" class="form-control" required="" maxlength="80" aria-describedby="alertCorreo">
									<small class="form-text text-muted"><p id="alertCorreo"></p></small>
								</div>
								<div class="col">
									<label> Facebook:</label>
									<input type="text" name="facebook" id="facebook" class="form-control" placeholder="Opcional" maxlength="250">
								</div>
							</div><br>

							<div class="row">
								<div class="col">
									<label> Instagram:</label>
									<input type="text" name="instagram" id="instagram" class="form-control" placeholder="Opcional" maxlength="250">
								</div>
								<div class="col">
									<label> Telegram:</label>
									<input type="text" name="telegram" id="telegram" class="form-control" placeholder="Opcional" maxlength="250">
								</div>
								<div class="col">
									<label> LinkedIn:</label>
									<input type="text" name="likedIn" id="likedIn" class="form-control" placeholder="Opcional" maxlength="250">
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
							
							<legend>Información del Trámite:</legend>

							<div class="row">
								<div class="col">
									<label> Tipo de Actas:</label>
									<div id="cargarActas"></div>
								</div>
								<div class="col">
									<label> Número de Actas:</label>
									<input type="number" name="n_actas" id="n_actas" class="form-control" required="" value="1">
								</div>
								<div class="col">
									<label> Prioridad:</label><br>
									<input type="hidden" name="prioridad" value="0">
									<label><input type="checkbox" name="prioridad" value="1"> Marque solo si es requerida por el cliente.</label><br>
								</div>
							</div><br>

							<div style="text-align: right;">
								<span class="btn btn-primary" onclick="backPart2()">
									<span class="fa-solid fa-arrow-left"></span> Atrás
								</span>
							</div>

						</fieldset>
						<br>
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarAggClientes" onclick="resetFormAggClientes()"> Cerrar</button>
                        	<input id="guardar" type="submit" class="btn btn-primary" value="Guardar" style="display: none;">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Edit -->
	<div class="modal fade" id="modalModificarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="noEditLugar(); resetFormEditCliente();">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar todos los campos a excepción del número de Cedula y el RIF.</p></h6>
				</div><br><br>
				
				<div class="modal-body">
					<form id="frmModificarClientes" method="POST" autocomplete="off" onsubmit="return modificarCliente()">

						<div class="row">
							<div class="col">
								<b>Información Personal:</b>
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Cédula:</label>
								<input type="number" name="cedulaEdit" id="cedulaEdit" class="form-control" readonly="">
							</div>
							<div class="col">
								<label> RIF:</label>
								<input type="text" name="rifEdit" id="rifEdit" class="form-control" readonly="">
							</div>
							<div class="col">
								<label> Primer Nombre:</label>
								<input type="text" name="p_nombreEdit" id="p_nombreEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="30">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Segundo Nombre:</label>
								<input type="text" name="s_nombreEdit" id="s_nombreEdit" class="form-control" onkeyup="mayus(this.id, this.value);" placeholder="Opcional" maxlength="30">
							</div>
							<div class="col">
								<label> Primer Apellido:</label>
								<input type="text" name="p_apellidoEdit" id="p_apellidoEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="30">
							</div>
							<div class="col">
								<label> Segundo Apellido:</label>
								<input type="text" name="s_apellidoEdit" id="s_apellidoEdit" class="form-control" onkeyup="mayus(this.id, this.value);" placeholder="Opcional" maxlength="30">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Sexo:</label><br>
								<div id="sexoEditM"></div>
								<div id="sexoEditF"></div>
								<div id="sexoEditO"></div>
							</div>
							<div class="col">
								<label> Fecha de Nacimiento:</label>
								<input type="hidden" name="f_nacimientoOld" id="f_nacimientoOld">
								<input type="text" name="f_nacimientoEdit" id="f_nacimientoEdit" placeholder="dd-mm-aaaa" required="" readonly="" class="form-control">
							</div>
							<div class="col">
								<label> Estado Civil:</label>
								<select name="est_civilEdit" id="est_civilEdit" class="form-control" required="">
									<option selected="" disabled=""> Seleccione una opción</option>
									<option>Soltero</option>
									<option>Casado</option>
									<option>Divorciado</option>
									<option>Concuvino</option>
									<option>Viudo</option>
								</select>
							</div>
						</div><br>

						<div class="row">
							<div class="col" id="editLugarNatal">
								<b>Lugar de Nacimiento:</b>	<span class="btn btn-link" onclick="editLugarNatal()"> Si desea modificar el lugar de nacimiento haga click aqui</span>
							</div>
							<div class="col" id="noEditLugarNatal" style="display: none;">
								<b>Lugar de Nacimiento:</b>
							</div>
						</div><br>

						<div class="row">

							<input type="hidden" name="paisNatalOld" id="paisNatalOld">
							<input type="hidden" name="estadoNatalOld" id="estadoNatalOld">
							<input type="hidden" name="municipioNatalOld" id="municipioNatalOld">
							<input type="hidden" name="parroquiaNatalOld" id="parroquiaNatalOld">

							<div class="col" id="divPaiNatal">
								<label> Pais:</label>
								<input type="text" name="paisNatalEdit" id="paisNatalEdit" class="form-control" readonly="">
							</div>
							<div class="col" id="divEstNatal">
								<label> Estado:</label>
								<input type="text" name="estadoNatalEdit" id="estadoNatalEdit" class="form-control" placeholder="Opcional" readonly="">
							</div>
							<div class="col" id="divMunNatal">
								<label> Municipio:</label>
								<input type="text" name="municipioNatalEdit" id="municipioNatalEdit" class="form-control" placeholder="Opcional" readonly="">
							</div>
							
							<div class="col" id="paiNatalEdit" style="display: none;">
								<label> Pais:</label>
								<select name="paisNatalEdit" id="paisNatalEdit" class="form-control" required="" onclick="mostrarEstadoNatalEdit(this.value)">
									<?php include "ubicaciones/selectPaisNatalEdit.php" ?>
								</select>
							</div>
							<div class="col" id="estNatalEdit" style="display: none;">
								<label> Estado:</label>
								<select name="estadoNatalEdit" id="estadoNatalEdit" class="form-control" required="">
									<option selected="" disabled="">Seleccione un estado</option>
								</select>
							</div>
							<div class="col" id="munNatalEdit" style="display: none;">
								<label> Municipio:</label>
								<select name="municipioNatalEdit" id="municipioNatalEdit" class="form-control" required="">
									<option selected="" disabled="">Seleccione un municipio</option>
								</select>
							</div>
						</div><br>

						<div class="row">
							<div class="col-sm-4" id="divParNatal">
								<label> Parroquia:</label>
								<input type="text" name="parroquiaNatalEdit" id="parroquiaNatalEdit" class="form-control" placeholder="Opcional" readonly="">
							</div>
							<div class="col-sm-4" id="parNatalEdit" style="display: none;">
								<label> Parroquia:</label>
								<select name="parroquiaNatalEdit" id="parroquiaNatalEdit" class="form-control" required="">
									<option selected="" disabled="">Seleccione una parroquia</option>
								</select>
							</div>
							<div class="col">
								<label> Especificación:</label>
								<input type="text" name="espNatalEdit" id="espNatalEdit" class="form-control" onkeyup="mayus(this.id, this.value);" placeholder="Opcional" maxlength="80">
							</div>
						</div><br>

						<div class="row">
							<div class="col" id="editLugarRes">
								<b>Lugar de Residencia:</b> <span class="btn btn-link" onclick="editLugarRes()"> Si desea modificar el lugar de residencia haga click aqui</span>
							</div>
							<div class="col" id="noEditLugarRes" style="display: none;">
								<b>Lugar de Residencia:</b>
							</div>
						</div><br>

						<div class="row">

							<input type="hidden" name="paisResOld" id="paisResOld">
							<input type="hidden" name="estadoResOld" id="estadoResOld">
							<input type="hidden" name="municipioResOld" id="municipioResOld">
							<input type="hidden" name="parroquiaResOld" id="parroquiaResOld">

							<div class="col" id="divPaiRes">
								<label> Pais:</label>
								<input type="text" name="paisResEdit" id="paisResEdit" class="form-control" readonly="">
							</div>
							<div class="col" id="divEstRes">
								<label> Estado:</label>
								<input type="text" name="estadoResEdit" id="estadoResEdit" class="form-control" placeholder="Opcional" readonly="">
							</div>
							<div class="col" id="divMunRes">
								<label> Municipio:</label>
								<input type="text" name="municipioResEdit" id="municipioResEdit" class="form-control" placeholder="Opcional" readonly="">
							</div>

							<div class="col" id="paiResEdit" style="display: none;">
								<label> Pais:</label>
								<select name="paisResEdit" id="paisResEdit" class="form-control" required="" onclick="mostrarEstadoResEdit(this.value); selectTelfEdit(this.value);">
									<?php include "ubicaciones/selectPaisResEdit.php" ?>
								</select>
							</div>
							<div class="col" id="estResEdit" style="display: none;">
								<label> Estado:</label>
								<select name="estadoResEdit" id="estadoResEdit" class="form-control" required="">
									<option selected="" disabled="">Seleccione un estado</option>
								</select>
							</div>
							<div class="col" id="munResEdit" style="display: none;">
								<label> Municipio:</label>
								<select name="municipioResEdit" id="municipioResEdit" class="form-control" required="">
									<option selected="" disabled="">Seleccione un municipio</option>
								</select>
							</div>
						</div><br>

						<div class="row">
							<div class="col-sm-4" id="divParRes">
								<label> Parroquia:</label>
								<input type="text" name="parroquiaResEdit" id="parroquiaResEdit" class="form-control" placeholder="Opcional" readonly="">
							</div>
							<div class="col-sm-4" id="parResEdit" style="display: none;">
								<label> Parroquia:</label>
								<select name="parroquiaResEdit" id="parroquiaResEdit" class="form-control" required="">
									<option selected="" disabled="">Seleccione una parroquia</option>
								</select>
							</div>
							<div class="col">
								<label> Dirección de Habitación:</label>
								<input type="text" name="direccionEdit" id="direccionEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<b>Información de Contacto:</b>
							</div>
						</div><br>
						
						<div class="row">
							<div class="col">
								<label> Teléfono Movil o WhatsApp:</label>
								<div class="row">
									<div class="col-sm-5" id="telfEdit">
										<select name="codigoTelEdit" id="codigoTelEdit" class="form-control" required="">
										</select>
									</div>
									<div class="col-sm-7">
										<input type="number" name="telefonoEdit" id="telefonoEdit" class="form-control" required="">
									</div>
								</div>
							</div>
							<div class="col">
								<label> Correo Electrónico:</label>
								<input type="email" name="emailEdit" id="emailEdit" class="form-control" required="" maxlength="80">
							</div>
							<div class="col">
								<label> Facebook:</label>
								<input type="text" name="facebookEdit" id="facebookEdit" class="form-control" placeholder="Opcional" maxlength="250">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Instagram:</label>
								<input type="text" name="instagramEdit" id="instagramEdit" class="form-control" placeholder="Opcional" maxlength="250">
							</div>
							<div class="col">
								<label> Telegram:</label>
								<input type="text" name="telegramEdit" id="telegramEdit" class="form-control" placeholder="Opcional" maxlength="250">
							</div>
							<div class="col">
								<label> LinkedIn:</label>
								<input type="text" name="likedInEdit" id="likedInEdit" class="form-control" placeholder="Opcional" maxlength="250">
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<b>Información del Trámite:</b>
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Tipo de Actas:</label>
								<div id="cargarActasEdit"></div>
							</div>
							<div class="col">
								<label> Número de Actas:</label>
								<input type="number" name="n_actasEdit" id="n_actasEdit" class="form-control" required="">
							</div>
							<div class="col">
								<label> Prioridad:</label><br>
								<input type="hidden" name="prioridadEdit" value="0">
								<div id="prioridadEdit"></div>
							</div>
						</div><br>

						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarClientes" onclick="noEditLugar(); resetFormEditCliente();"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Informacion-->
	<div class="modal fade" id="modalInfoClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #94daff">
					<h4 class="modal-title" id="exampleModalLabel">Información del Cliente</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="container">
					<div class="row">
						<div class="col">
							<h6><p style="text-align: justify;">
							Aqui podrá visualizar toda la información correspondiente al cliente.</p></h6>
						</div>
					</div>
				</div>
				
				<div class="modal-body">

					<div class="row">
						<div class="col-sm-6">
							<p><b>Nombre Completo: </b>
								<span id="p_nombreInfo"></span>
								<span id="s_nombreInfo"></span>
								<span id="p_apellidoInfo"></span>
								<span id="s_apellidoInfo"></span>
							</p>
						</div>
						<div class="col">
							<p style="text-align: right;"> <b>Fecha de Registro: </b><span id="fechaInfo"></span></p>
							
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Número de Cédula: </b><span id="cedulaInfo"></span></li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>RIF: </b><span id="rifInfo"></span></li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Estado Civil: </b><span id="est_civilInfo"></span></li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Sexo: </b><span id="sexoInfo"></span></li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Lugar de Nacimiento: </b>
									<span id="parroquiaNatalInfo"></span>
									<span id="municipioNatalInfo"></span>
									<span id="estadoNatalInfo"></span>
									<span id="paisNatalInfo"></span>.
									<span id="espNatalInfo"></span>
								</li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Fecha de Nacimiento: </b><span id="f_nacimientoInfo"></span></li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Lugar de Residencia: </b>
									<span id="parroquiaResInfo"></span>
									<span id="municipioResInfo"></span>
									<span id="estadoResInfo"></span>
									<span id="paisResInfo"></span>.
								</li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Dirección de Habitación: </b><span id="direccionInfo"></span></li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Correo Electrónico: </b><span id="correoInfo"></span></li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Teléfono: </b>+
									<span id="codigoTelInfo"></span>
									<span id="telefonoInfo"></span>
								</li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<span id="facebookInfo"></span>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<span id="instagramInfo"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<span id="telegramInfo"></span>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<span id="likedInInfo"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Número de Actas: </b><span id="n_actasInfo"></span></li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Tipo de Actas: </b><span id="cargarActasInfo"></span></li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<p><span id="descripcionInfo"></span>.</p>
						</div>
						<div class="col">
							<p style="text-align: right;"> <span id="prioridadInfo"></span></p>
						</div>
					</div>
					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnInfoClientes"> Cerrar</button>
				</div>
			</div>
		</div>
	</div>

<?php
	require_once "footer.php";
?>
	
	<script src="../js/multiform.js"></script>
	<script src="../js/calendario.js"></script>
	<script src="../js/ubicaciones.js"></script>
	<script src="../js/clientes.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			// Make the loader visible
			$('#simple-ellipsis').show();

			// Load the table
			$('#tablaClientes').load("clientes/tablaClientes.php", function() {
				// Hide the loader after the table has been loaded
				$('#simple-ellipsis').hide();
			});

			$('#codigoTel').load("ubicaciones/codigosTel.php");
			$('#codigoTelEdit').load("ubicaciones/codigosTelEdit.php");
			$('#cargarActas').load("clientes/selectActa.php");
			$('#cargarActasEdit').load("clientes/selectActaEdit.php");
			$('#cargarActasInfo').load("clientes/infoActa.php");
		});
		
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>