<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM cargos WHERE id_cargo != 3";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>

	<div class="table-responsive">
		<table class="table table-striped table-hover table-primary" id="tablaCargosDataTable">
			<thead class="thead-dark">
				<tr>
					<th class="col-sm-5">Cargo</th>
					<th class="col-sm-5">Acciones</th>
					<th>Asignado</th>
				</tr>
			</thead>
			<tbody style="background-color: #94daff">
			<?php 

				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$idCargo = $row['id_cargo'];
					$asignado = $row['asignado'];
					
			 ?>
				<tr>
					<td class="col-sm-5"><?php echo $row['cargo'] ?></td>
					<td class="col-sm-5">
						<?php 
							if ($idCargo !=1 && $idCargo !=2) {
						?>
								<?php if ($idCargoUser == 1) { ?>
									<span class="btn btn-warning bt-sm" title="Editar" onclick="editarCargo('<?php echo $idCargo ?>')" data-toggle="modal" data-target="#modalModificarCargo">
										<span class="fa-solid fa-file-pen"></span>
									</span>
									<span class="btn btn-danger bt-sm" title="Eliminar" onclick="eliminarCargo('<?php echo $idCargo ?>')">
										<span class="fa-solid fa-delete-left"></span>
									</span>
								<?php }else{ ?>
									<span class="btn btn-outline">
										<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
										<span title="Detalles" onclick="soloDirector()">No autorizado</span>
										<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
									</span>
								<?php } ?>
							<?php
								}else{
							 ?>
						 		<span class="btn btn-outline">
						 			<span class="fa-solid fa-xmark" title="Detalles" onclick="accionCargoDirector()"></span>
						 			<span title="Detalles" onclick="accionCargoDirector()">No hay acciones</span>
						 			<span class="fa-solid fa-xmark" title="Detalles" onclick="accionCargoDirector()"></span>
						 		</span>
						 <?php
							}
						 ?>
					</td>
					<td align="center">
						<?php 
							if ($row['asignado']==0) {
						?>
							<span class="fa-solid fa-xmark" style="color: #dc3545;"></span>
						<?php
							}else{
						?>
							<span class="fa-solid fa-check" style="color: #1c7430;"></span>
						<?php
							}
						 ?>
					</td>
				</tr>
			<?php 
				}
			 ?>
			</tbody>
		</table>
	</div>

<script src="../js/empleados.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCargosDataTable').DataTable({
			responsive: "true",
			dom: 'Bfrtilp',
			buttons: {
				dom: {
					button: {
						className: 'btn'
					}
				},
				buttons: [{
					extend: 'excelHtml5',
					text: '<i class="fa-solid fa-file-excel"></i>',
					titleAttr: 'Exportar a Excel',
					className: 'btn btn-success'
				},
				{
					extend: 'pdfHtml5',
					text: '<i class="fa-solid fa-file-pdf"></i>',
					titleAttr: 'Exportar a PDF',
					className: 'btn btn-danger'
				},
				{
					extend: 'print',
					text: '<i class="fa-solid fa-print"></i>',
					titleAttr: 'Imprimir',
					className: 'btn btn-info'
				}]
			},
			language: {
				url: '../librerias/datatable/español.json'
			}
		});
	});
</script>