<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM paises";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>

<div class="table-responsive">
	<table class="table table-striped table-hover table-primary" id="tablaPaisesDataTable">
		<thead class="thead-dark">
			<tr>
				<th class="col-sm-5">País</th>
				<th class="col-sm-4">Código Teléfonico</th>
				<th class="col-sm-3">Acciones</th>
			</tr>
		</thead>
		<tbody style="background-color: #94daff">

		<?php 

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		 ?>

			<tr>
				<td class="col-sm-5">
					<span><?php echo $row['pais']; ?></span>
				</td>
				<td class="col-sm-4">
					<span>+<?php echo $row['codigo']; ?></span>
				</td>
				<td class="col-sm-3" style="text-align: center;">
					<?php if ($idCargoUser == 1) { ?>
					<span class="btn btn-warning bt-sm" title="Editar" onclick="editarPais('<?php echo $row['id_pais']; ?>'); modalEditPais();" data-toggle="modal" data-target="#modalModificarPaises">
						<span class="fa-solid fa-file-pen"></span>
					</span>
					<span class="btn btn-danger bt-sm" title="Eliminar" onclick="borrarPais('<?php echo $row['id_pais']; ?>')">
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

<script src="../js/regiones.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPaisesDataTable').DataTable({
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