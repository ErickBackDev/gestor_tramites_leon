<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="contenedor" id="ellipsis" style="display: none;">
		<div class="lds-ellipsis">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Empleados</h1>
			<hr>
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
			<div id="tablaEmpleados"></div>
		</div>
	</div>

	<!-- Modal Edit -->
	<div class="modal fade" id="modalModificarEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Empleado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="noEditLugar(); resetFormEditEmpleado();">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar todos los campos a excepción del número de Cedula y el RIF.</p></h6>
				</div><br><br>
				
				<div class="modal-body">
					<form id="frmModificarEmpleados" method="POST" autocomplete="off" onsubmit="return modificarEmpleado()">

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
								<input type="text" name="estadoNatalEdit" id="estadoNatalEdit" class="form-control" readonly="">
							</div>
							<div class="col" id="divMunNatal">
								<label> Municipio:</label>
								<input type="text" name="municipioNatalEdit" id="municipioNatalEdit" class="form-control" readonly="">
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
								<input type="text" name="parroquiaNatalEdit" id="parroquiaNatalEdit" class="form-control" readonly="">
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
								<input type="text" name="estadoResEdit" id="estadoResEdit" class="form-control" readonly="">
							</div>
							<div class="col" id="divMunRes">
								<label> Municipio:</label>
								<input type="text" name="municipioResEdit" id="municipioResEdit" class="form-control" readonly="">
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
								<input type="text" name="parroquiaResEdit" id="parroquiaResEdit" class="form-control" readonly="">
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
								<b>Informacíon de Contacto:</b>
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
						</div><br>

						<div class="row">
							<div class="col">
								<b>Información Laboral:</b>
							</div>
						</div><br>

						<div class="row">
							<div class="col">
								<label> Profesión:</label>
								<input type="text" name="profesionEdit" id="profesionEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
							</div>
							<div class="col">
								<label> Experiencia Profesional:</label>
								<input type="text" name="exProfesionalEdit" id="exProfesionalEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
							</div>
							<div class="col">
								<label> Experiencia Laboral:</label>
								<input type="text" name="exLaboralEdit" id="exLaboralEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="" maxlength="80">
							</div>
							<div class="col">
								<label> Cargo:</label>
								<input type="hidden" name="cargoEmpleado" id="cargoEmpleado">
								<div id="cargarCargos"></div>
							</div>
						</div><br>

                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarEmpleados" onclick="noEditLugar(); resetFormEditEmpleado()"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Informacion-->
	<div class="modal fade" id="modalInfoEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #94daff">
					<h4 class="modal-title" id="exampleModalLabel">Información Empleado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="container">
					<div class="row">
						<div class="col">
							<h6><p style="text-align: justify;">
							Aqui podrá visualizar toda la información correspondiente al empleado.</p></h6>
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
								<p><li><b>Profesión: </b><span id="profesionInfo"></span></li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Experiencia Profesional: </b><span id="exProfesionalInfo"></span></li></p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="col">
								<p><li><b>Experiencia Laboral: </b><span id="exLaboralInfo"></span></li></p>
							</div>
						</div>
						<div class="col">
							<div class="col">
								<p><li><b>Cargo: </b><span id="cargoInfo"></span></li></p>
							</div>
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnInfoEmpleados"> Cerrar</button>
				</div>
			</div>
		</div>
	</div>

<?php require_once "footer.php"; ?>

	<script src="../js/calendario.js"></script>
	<script src="../js/ubicaciones.js"></script>
	<script src="../js/empleados.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			// Make the loader visible
			$('#simple-ellipsis').show();

			// Load the table
			$('#tablaEmpleados').load("empleados/tablaEmpleados.php", function() {
				// Hide the loader after the table has been loaded
				$('#simple-ellipsis').hide();
			});
			
			$('#codigoTelEdit').load("ubicaciones/codigosTelEdit.php");
			$('#cargarCargos').load("empleados/selectCargo.php");
		});
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>