<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container col-sm-6">
			<h1 class="display-4">Cargos</h1>
			<b>Te recordamos que si eliminas un cargo que se encuentre asignado, todo aquel empleado que lo este ocupando será eliminado automaticamente.</b>
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
			<div id="tablaCargos"></div>
		</div>
	</div>

	<!-- Modal Edith -->
	<div class="modal fade" id="modalModificarCargo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Cargo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar el cargo.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarCargos" method="POST" autocomplete="off" onsubmit="return modificarCargo()">
						<input type="hidden" name="idCargoEdit" id="idCargoEdit">
						<input type="hidden" name="cargoOld" id="cargoOld">
						<div class="row">
							<div class="col">
								<label>Cargo:</label>
								<input type="text" name="cargoEdit" id="cargoEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div><br>
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarCargos"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php require_once "footer.php"; ?>

	<script src="../js/empleados.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			// Make the loader visible
			$('#simple-ellipsis').show();

			// Load the table
			$('#tablaCargos').load("empleados/tablaCargos.php", function() {
				// Hide the loader after the table has been loaded
				$('#simple-ellipsis').hide();
			});
		});
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>