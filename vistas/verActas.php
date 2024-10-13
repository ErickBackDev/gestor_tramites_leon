<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container col-sm-6">
			<h1 class="display-4">Actas</h1>
			<b>Te recordamos que si eliminas un acta que se encuentre en algún trámite, todo aquel cliente que este tramitando dicha acta será eliminado automaticamente.</b>
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
			<div id="tablaActas"></div>
		</div>
	</div>

	<!-- Modal Edith -->
	<div class="modal fade" id="modalModificarActa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Acta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar el acta.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarActas" method="POST" autocomplete="off" onsubmit="return modificarActa()">
						<div class="row">
							<div class="col">
								<label>Acta:</label>
								<input type="hidden" name="idActaEdit" id="idActaEdit">
								<input type="hidden" name="actaOld" id="actaOld">
								<input type="text" name="actaEdit" id="actaEdit" class="form-control" onkeyup="mayus(this.id, this.value);" required="">
							</div>
						</div><br>
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarActas"> Cerrar</button>
                        	<input type="submit" class="btn btn-warning" value="Modificar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php require_once "footer.php"; ?>

	<script src="../js/clientes.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			// Make the loader visible
			$('#simple-ellipsis').show();

			// Load the table
			$('#tablaActas').load("clientes/tablaActas.php", function() {
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