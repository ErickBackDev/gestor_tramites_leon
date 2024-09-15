<?php 
	
	session_start();
	$idUsuario = $_SESSION['id_usuario'];
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM usuarios INNER JOIN cargos ON usuarios.id_cargo=cargos.id_cargo WHERE id_usuario != '$idUsuario'";
	$result = $conectar->query($sql);

 ?>

 <div class="table-responsive">
 	<table class="table table-striped table-hover table-primary" id="tablaOtrosUsuarios">
 		<thead class="thead-dark">
 			<tr>
 				<th>Nombre</th>
 				<th>Apellido</th>
 				<th>Cargo</th>
 				<th>Correo</th>
 				<th>Usuario</th>
 				<th>Acciones</th>
 			</tr>
 		</thead>
 		<tbody style="background-color: #94daff">

 			<?php 

 			while($row = $result->fetch_array(MYSQLI_ASSOC)) {

 				?>

 				<tr>
 					<td>
 						<?php echo $row['nombre']; ?>
 					</td>
 					<td>
 						<?php echo $row['apellido']; ?>
 					</td>
 					<td>
 						<?php echo $row['cargo']; ?>
 					</td>
 					<td>
 						<?php echo $row['correo']; ?>
 					</td>
 					<td>
 						<?php echo $row['usuario']; ?>
 					</td>
 					<td style="text-align: center;">
 						<span class="btn btn-warning bt-sm" title="Editar" onclick="editarCargoUser('<?php echo $row['id_usuario']; ?>')">
							<span class="fa-solid fa-user-pen"></span>
						</span>
						<span class="btn btn-success bt-sm" title="Guardar" onclick="borrarCliente('<?php echo $row['cedula']; ?>')" style="display: none;">
							<span class="fa-solid fa-user-xmark"></span>
						</span>
 					</td>
 				</tr>
 				<?php 
 			}
 			?>
 		</tbody>
 	</table>
 </div>

<script src="../js/usuarios.js"></script>
 <script type="text/javascript">
	$(document).ready(function(){
		$('#tablaOtrosUsuarios').DataTable({
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