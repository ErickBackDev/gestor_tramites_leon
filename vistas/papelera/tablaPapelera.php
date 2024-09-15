<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT clientes.id_cliente AS id_cliente, CONCAT(clientes.p_nombre,' ',clientes.p_apellido,' C.I. ',clientes.cedula) AS data, clientes.cedula AS cedula, clientes.n_actas AS n_actas, clientes.prioridad AS prioridad, carpetas.id_carpeta AS id_carpeta, carpetas.id_cliente AS id_cliente_carpeta FROM clientes INNER JOIN carpetas ON clientes.id_cliente = carpetas.id_cliente WHERE papelera != 0 ORDER BY clientes.prioridad DESC";
	$result = $conectar->query($sql);
	$data = array();
	$idCargoUser = $_SESSION['id_cargo'];

?>

<div class="table-responsive">
	<table class="table table-striped table-hover table-primary" id="tablaPapeleraDataTable">
		<thead class="thead-dark">
			<tr>
				<th class="col-sm-3">Datos del Cliente</th>
				<th class="col-sm-2">N° de Actas</th>
				<th class="col-sm-2">Tipo de Actas</th>
				<th class="col-sm-2">Inicio / Entrega</th>
				<th class="col-sm-2">Acciones</th>
			</tr>
		</thead>
		<tbody style="background-color: #94daff"><?php 
		
		$pathToScan = "";
		$path = "../../archivos/";
		$pathToScan = $path;

		$scan = scandir($pathToScan);
		
		foreach ($scan as $a) {
			$pathToFile = "".$pathToScan."/".$a."";
			if (is_dir($pathToFile)) {
				$is_directory = true;
			}
		}
		
		while($row = $result->fetch_assoc()){ 

			$files = $row['data'];
			
			$rowcedula = $row['cedula'];
			$sql2 = "SELECT * FROM actas INNER JOIN clientes_actas ON actas.id_acta=clientes_actas.id_acta WHERE clientes_actas.cedula_cliente = '$rowcedula' ORDER BY acta ASC";
			$result2 = $conectar->query($sql2);
			$data2 = array();
				
			while($row2 = $result2->fetch_assoc()){
				$actas = $row2['acta'];
				$data2[] = $actas;
			} 
			
			if(isset($_GET['dir'])) {
				$linkToDir = ''.$_GET['dir'].'/'.$a.'';
			}
			else { $linkToDir = $a; }
			$time = strftime(filemtime("../../archivos/".$linkToDir)); 
			
			$idCliente = $row['id_cliente']; ?>

			<tr>
				<td class="col-sm-3"><?php echo $row['data']; ?></td>
				<td class="col-sm-2"><?php echo $row['n_actas']; ?></td>
				<td class="col-sm-2"><?php echo implode(", ", $data2) ?></td>
				<td class="col-sm-2"><?php echo date('d-m-Y', $time);?> <br> <?php echo date('d-m-Y', $time); ?></td>
				<td class="col-sm-2">
					<?php if ($idCargoUser == 1) { ?>
						<span class="btn btn-success bt-sm" title="Restaurar" onclick="restaurarCarpeta('<?php echo $row['data']; ?>', '<?php echo $idCliente ?>')">
							<span class="fa-solid fa-trash-arrow-up"></span>
						</span>
						<span class="btn btn-danger bt-sm" title="Eliminar" onclick="eliminarPermanente('<?php echo $row['data']; ?>', '<?php echo $idCliente ?>')">
							<span class="fa-solid fa-ban"></span>
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
			<?php } ?>
		</tbody>
	</table>
</div>

<script src="../js/papelera.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaPapeleraDataTable').DataTable({
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