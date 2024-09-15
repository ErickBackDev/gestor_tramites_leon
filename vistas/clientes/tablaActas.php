<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM actas";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>

	<div class="table-responsive">
		<table class="table table-striped table-hover table-primary" id="tablaActasDataTable">
			<thead class="thead-dark">
				<tr>
					<th class="col-sm-6">Acta</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody style="background-color: #94daff">
			<?php 

				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$idActa = $row['id_acta'];
					
			 ?>
				<tr>
					<td class="col-sm-6"><?php echo $row['acta'] ?></td>
					<td>
						<?php if ($idCargoUser == 1) { ?>
							<span class="btn btn-warning bt-sm" title="Editar" onclick="editarActa('<?php echo $idActa ?>')" data-toggle="modal" data-target="#modalModificarActa">
								<span class="fa-solid fa-file-pen"></span>
							</span>
							<span class="btn btn-danger bt-sm" title="Eliminar" onclick="eliminarActa('<?php echo $idActa ?>')">
								<span class="fa-solid fa-delete-left"></span>
							</span>
						<?php }else{ ?>
							<span class="btn btn-outline">
								<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
								<span title="Detalles" onclick="soloDirector()">No autorizado</span>
								<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
							</span>
						<?php } ?>
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
		$('#tablaActasDataTable').DataTable({
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