<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
		$idCargoUser = $_SESSION['id_cargo'];
?>

	<div class="tab">
		<button class="tablinks" onclick="mostrarPaises()">Países</button>
        <button class="tablinks" onclick="mostrarEstados()">Estados</button>
        <button class="tablinks" onclick="mostrarMunicipios()">Municipios</button>
        <button class="tablinks" onclick="mostrarParroquias()">Parroquias</button>
    </div>

    <!-- Países -->
    <div id="Paises" class="tabcontent">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Países</h1>

                <div class="row">
                    <div class="col-sm-4">
                    	<?php if ($idCargoUser == 1) { ?>
                    		<span class="btn btn-primary" data-toggle="modal" data-target="#modalAggPaises" onclick="modalAggPais()">
                    			<span class="fa-solid fa-location-dot"></span> Agregar Nuevo País
                    		</span>
                    	<?php } ?> 
                    </div>
                </div><br>
                <b>Te recordamos que al borrar un país se borrarán todos los estados, municipios y parroquias subsecuentes.</b>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="tablaPaises"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar País-->
	<div class="modal fade" id="modalAggPaises" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #204cf9">
					<h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo País</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetFormAggPais()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá agregar un nuevo país.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmPaises" method="post" autocomplete="off" onsubmit="return agregarPais()">
						<div class="row">
							<div class="col">
								<label> Nombre del País:</label>
								<input type="text" name="pais" id="pais" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Código Teléfonico del País:</label>
								<input type="number" name="codigo" id="codigo" class="form-control" placeholder="Solo ingrese los números" required="">
							</div>
						</div><br>
						
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarAggPaises" onclick="resetFormAggPais()"> Cerrar</button>
                        	<input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Edit País -->
	<div class="modal fade" id="modalModificarPaises" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar País</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá modificar el país.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarPaises" method="POST" autocomplete="off" onsubmit="return modificarPais()">

                        <div class="row">
                        	<input type="hidden" name="idPais" id="idPais">
                        	<input type="hidden" name="paisOld" id="paisOld">
                            <div class="col">
								<label> Nombre del País:</label>
								<input type="text" name="paisEdit" id="paisEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Código Teléfonico del País:</label>
								<input type="number" name="codigoEdit" id="codigoEdit" class="form-control" placeholder="Solo ingrese los números" required="">
							</div>
						</div><br>

						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarPaises"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Estados -->
	<div id="Estados" class="tabcontent" style="display: none;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Estados</h1>

                <div class="row">
                    <div class="col-sm-4">
                    	<?php if ($idCargoUser == 1) { ?>
	                        <span class="btn btn-primary"data-toggle="modal" data-target="#modalAggEstados" onclick="modalAggEstado()">
	                            <span class="fa-solid fa-location-dot"></span> Agregar Nuevo Estado
	                        </span>
	                     <?php } ?>
                    </div>
                </div><br>
                <b>Te recordamos que al borrar un estado se borrarán todos los municipios y parroquias subsecuentes.</b>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="tablaEstados"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar Estado-->
	<div class="modal fade" id="modalAggEstados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #204cf9">
					<h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Estado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetFormAggEstado()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá agregar un nuevo estado.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmEstados" method="post" autocomplete="off" onsubmit="return agregarEstado()">
						<div class="row">
							<div class="col">
								<label> Nombre del Estado:</label>
								<input type="text" name="estado" id="estado" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Pais al que pertenece:</label>
								<select name="paisEst" id="paisEst" class="form-control" required="">
									<?php include "ubicaciones/selectPaisNatal.php" ?>
								</select>
							</div>
						</div><br>
						
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarAggEstados" onclick="resetFormAggEstado()"> Cerrar</button>
                        	<input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Edit Estado -->
	<div class="modal fade" id="modalModificarEstados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Estado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá modificar el estado.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarEstados" method="POST" autocomplete="off" onsubmit="return modificarEstado()">

                        <div class="row">
                        	<input type="hidden" name="idPaisEstado" id="idPaisEstado">
                        	<input type="hidden" name="estadoOld" id="estadoOld">
                        	<input type="hidden" name="idEstado" id="idEstado">
                            <div class="col">
								<label> Nombre del Estado:</label>
								<input type="text" name="estadoEdit" id="estadoEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div><br>

						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarEstados"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Municipios -->
    <div id="Municipios" class="tabcontent" style="display: none;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Municipios</h1>

                <div class="row">
                    <div class="col-sm-4">
                    	<?php if ($idCargoUser == 1) { ?>
	                        <span class="btn btn-primary" data-toggle="modal" data-target="#modalAggMunicipios" onclick="modalAggMunicipio()">
	                            <span class="fa-solid fa-location-dot"></span> Agregar Nuevo Municipio
	                        </span>
                        <?php } ?>
                    </div>
                </div><br>
                <b>Te recordamos que al borrar un municipio se borrarán todas las parroquias subsecuentes.</b>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="tablaMunicipios"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar Municipio-->
	<div class="modal fade" id="modalAggMunicipios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #204cf9">
					<h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Municipio</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetFormAggMunicipios()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá agregar un nuevo municipio.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmMunicipios" method="POST" autocomplete="off" onsubmit="return agregarMunicipio()">

						<div class="row">
							<div class="col">
								<label> Nombre del Municipio:</label>
								<input type="text" name="municipio" id="municipio" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Estado al que pertenece:</label>
								<div id="cargarEstadoMun"></div>
							</div>
						</div><br>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarAggMunicipios" onclick="resetFormAggMunicipios()"> Cerrar</button>
							<input type="submit" class="btn btn-primary" value="Guardar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	 <!-- Modal Edit Municipio -->
	<div class="modal fade" id="modalModificarMunicipios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Municipio</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá modificar el municipio.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarMunicipios" method="POST" autocomplete="off" onsubmit="return modificarMunicipio()">

                        <div class="row">
                        	<input type="hidden" name="idMunicipio" id="idMunicipio">
                        	<input type="hidden" name="municipioOld" id="municipioOld">
                        
                            <div class="col">
								<label> Nombre del Municipio:</label>
								<input type="text" name="municipioEdit" id="municipioEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
                            <div class="col">
								<label> Estado al que pertenece::</label>
								<div id="cargarEstadoMunEdit"></div>
							</div>
						</div><br>

						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarMunicipios"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <!-- Parroquias -->
    <div id="Parroquias" class="tabcontent" style="display: none;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Parroquias</h1>

                <div class="row">
                    <div class="col-sm-4">
                    	<?php if ($idCargoUser == 1) { ?>
	                        <span class="btn btn-primary" data-toggle="modal" data-target="#modalAggParroquias" onclick="modalAggParroquia()">
	                            <span class="fa-solid fa-location-dot"></span> Agregar Nueva Parroquia
	                        </span>
                        <?php } ?>
                    </div>
                </div><br>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="tablaParroquias"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar Parroquia-->
    <div class="modal fade" id="modalAggParroquias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header" style="background-color: #204cf9">
    				<h4 class="modal-title" id="exampleModalLabel">Agregar Nueva Parroquia</h4>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetFormAggParroquias()">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div><br>

    			<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá agregar una nueva parroquia.</p></h6>
					<hr>
				</div><br>

    			<div class="modal-body">
    				<form id="frmParroquias" method="POST" autocomplete="off" onsubmit="return agregarParroquia()">

    					<div class="row">
    						<div class="col">
    							<label> Nombre de la Parroquia:</label>
    							<input type="text" name="parroquia" id="parroquia" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
    						</div>
    					</div>
    					<div class="row">
    						<div class="col">
    							<label> Municipio al que pertenece:</label>
    							<div id="cargarMunicipioPar"></div>
    						</div>
    					</div><br>

    					<br>
    					<div class="modal-footer">
    						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarAggParroquias" onclick="resetFormAggParroquias()"> Cerrar</button>
    						<input type="submit" class="btn btn-primary" value="Guardar">
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- Modal Edit Parroquia -->
	<div class="modal fade" id="modalModificarParroquias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Parroquia</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui podrá modificar la parroquia.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarParroquias" method="POST" autocomplete="off" onsubmit="return modificarParroquia()">

                        <div class="row">
                        	<input type="hidden" name="idParroquia" id="idParroquia">
                        	<input type="hidden" name="parroquiaOld" id="parroquiaOld">
                        
                            <div class="col">
								<label> Nombre del Parroquia:</label>
								<input type="text" name="parroquiaEdit" id="parroquiaEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div>
						<div class="row">
                            <div class="col">
								<label> Municipio al que pertenece:</label>
								<div id="cargarMunicipioParEdit"></div>
							</div>
						</div><br>

						<div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarParroquias"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
	require_once "footer.php";
?>
	
	<script src="../js/regiones.js"></script>
	<script src="../js/validaciones.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('#tablaPaises').load("regiones/tablaPaises.php");
			$('#tablaEstados').load("regiones/tablaEstados.php");
            $('#tablaMunicipios').load("regiones/tablaMunicipios.php");
            $('#tablaParroquias').load("regiones/tablaParroquias.php");
            $('#cargarEstadoMun').load("regiones/selectEstadoMun.php");
            $('#cargarEstadoMunEdit').load("regiones/selectEstadoMunEdit.php");
            $('#cargarMunicipioPar').load("regiones/selectMunicipioPar.php");
            $('#cargarMunicipioParEdit').load("regiones/selectMunicipioParEdit.php");
		});
		
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>