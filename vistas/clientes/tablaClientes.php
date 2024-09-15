<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM clientes WHERE historial != 1";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>

<div class="table-responsive">
	<table class="table table-striped table-hover table-primary" id="tablaClientesDataTable">
		<thead class="thead-dark">
			<tr>
				<th class="col-sm-1">Cedula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Dirección</th>
				<th class="col-sm-3">Correo</th>
				<th class="col-sm-1">Teléfono</th>
				<th class="col-sm-2">Acciones</th>
			</tr>
		</thead>
		<tbody style="background-color: #94daff">

		<?php 

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {

		 ?>

			<tr>
				<td class="col-sm-1">
					<a class="btn btn-link" title="Información" onclick="infoCliente('<?php echo $row['cedula']; ?>')" data-toggle="modal" data-target="#modalInfoClientes">
						<span><?php echo $row['cedula']; ?></span>
					</a>
				</td>
				<td>
					<a class="btn btn-link" title="Información" onclick="infoCliente('<?php echo $row['cedula']; ?>')" data-toggle="modal" data-target="#modalInfoClientes">
						<span><?php echo $row['p_nombre']; ?></span>
					</a>
				</td>
				<td>
					<a class="btn btn-link" title="Información" onclick="infoCliente('<?php echo $row['cedula']; ?>')" data-toggle="modal" data-target="#modalInfoClientes">
						<span><?php echo $row['p_apellido']; ?></span>
					</a>
				</td>
				<td>
					<a class="btn btn-link" title="Información" onclick="infoCliente('<?php echo $row['cedula']; ?>')" data-toggle="modal" data-target="#modalInfoClientes">
						<span><?php echo $row['direccion']; ?></span>
					</a>
				</td>
				<td class="col-sm-3">
					<a class="btn btn-link" title="Información" onclick="infoCliente('<?php echo $row['cedula']; ?>')" data-toggle="modal" data-target="#modalInfoClientes">
						<span><?php echo $row['correo']; ?></span>
					</a>
				</td>
				<td class="col-sm-1">
					<a class="btn btn-link" title="Información" onclick="infoCliente('<?php echo $row['cedula']; ?>')" data-toggle="modal" data-target="#modalInfoClientes">
						<span>+<?php echo $row['codigoTel'];?>  <?php echo $row['telefono']; ?></span>
					</a>
				</td>
				<td class="col-sm-2" style="text-align: center;">
					<?php if ($idCargoUser == 1) { ?>
						<span class="btn btn-warning bt-sm" title="Editar" onclick="editarCliente('<?php echo $row['cedula']; ?>'); modalEditCliente();" data-toggle="modal" data-target="#modalModificarClientes">
							<span class="fa-solid fa-user-pen"></span>
						</span>
						<span class="btn btn-danger bt-sm" title="Eliminar" onclick="borrarCliente('<?php echo $row['cedula']; ?>')">
							<span class="fa-solid fa-user-xmark"></span>
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

<script src="../js/clientes.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaClientesDataTable').DataTable({
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
