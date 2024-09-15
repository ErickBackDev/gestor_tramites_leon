<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM municipios INNER JOIN estados ON municipios.id_estado=estados.id_estado";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>

<div class="table-responsive">
	<table class="table table-striped table-hover table-primary" id="tablaMunicipiosDataTable">
		<thead class="thead-dark">
			<tr>
				<th class="col-sm-1">Municipio</th>
				<th class="col-sm-2">Estado</th>
                <th class="col-sm-2">Acciones</th>
			</tr>
		</thead>
		<tbody style="background-color: #94daff">

		<?php 

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		 ?>

			<tr>
				<td class="col-sm-1">
					<span><?php echo $row['municipio']; ?></span>
				</td>
                <td class="col-sm-1">
					<span><?php echo $row['estado']; ?></span>
				</td>
				<td class="col-sm-2" style="text-align: center;">
					<span class="btn btn-warning bt-sm" title="Editar"
					<?php if ($idCargoUser == 1) { ?>
						 onclick="editarMunicipio('<?php echo $row['id_municipio']; ?>'); modalEditMunicipio();" data-toggle="modal" data-target="#modalModificarMunicipios"
					<?php } else { ?>
						onclick="noAutorizado()"
					<?php } ?> >
						<span class="fa-solid fa-file-pen"></span>
					</span>
					<span class="btn btn-danger bt-sm" title="Eliminar"
					<?php if ($idCargoUser == 1) { ?>
						 onclick="borrarMunicipio('<?php echo $row['id_municipio']; ?>')"
					<?php } else { ?>
						onclick="noAutorizado()"
					<?php } ?>>
						<span class="fa-solid fa-delete-left"></span>
					</span>
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
		$('#tablaMunicipiosDataTable').DataTable({
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
