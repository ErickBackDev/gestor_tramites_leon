<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "header.php";
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container col-sm-8">
			<h1 class="display-4">Costos Operacionales</h1>
			<hr>
			<div id="tablaGastos"></div>
		</div>
	</div>

	<!-- Modal Edith -->
	<div class="modal fade" id="modalModificarGastos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ffc107">
					<h4 class="modal-title" id="exampleModalLabel">Modificar Costo Operacional</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Podrá modificar todos los campos.</p></h6>
					<hr>
				</div><br>
				
				<div class="modal-body">
					<form id="frmModificarGastos" method="POST" autocomplete="off"  onsubmit="return modificarGasto()">
						<div class="row">
							<div class="col">
								<label>Gasto:</label>
								<input type="hidden" name="idGastoEdit" id="idGastoEdit">
								<input type="hidden" name="gastoOld" id="gastoOld">
								<input class="form-control" type="text" name="gastoEdit" id="gastoEdit" onkeyup="mayus(this.id, this.value);" required="">
								
								<label>Precio:</label>
								<input class="form-control" type="number" name="precio_dolarEdit" id="precio_dolarEdit" required="">
							</div>
						</div><br>
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnModificarGastos"> Cerrar</button>
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
			$('#tablaGastos').load("clientes/tablaGastos.php");
		});
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>