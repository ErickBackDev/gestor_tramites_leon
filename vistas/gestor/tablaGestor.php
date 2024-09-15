<?php 

require_once "../procesos/conexion.php";
$sql = "SELECT clientes.id_cliente AS id_cliente, CONCAT(clientes.p_nombre,' ',clientes.p_apellido,' C.I. ',clientes.cedula) AS data, clientes.cedula AS cedula, clientes.n_actas AS n_actas, clientes.prioridad AS prioridad, clientes.fecha AS fecha, carpetas.id_carpeta AS id_carpeta, carpetas.id_cliente AS id_cliente_carpeta FROM clientes INNER JOIN carpetas ON clientes.id_cliente = carpetas.id_cliente WHERE papelera != 1 ORDER BY clientes.prioridad DESC";
$result = $conectar->query($sql);
$idCargoUser = $_SESSION['id_cargo'];

?>

<div class="row">
<div class="col-sm-12">
	<div class="table-responsive">
		<table class="table table-striped table-hover table-primary" id="tablaGestorDataTable">
			<thead class="thead-dark">
				<?php 
				$is_directory = false;
				foreach ($scan as $a) {
					$pathToFile = "".$pathToScan."/".$a."";
					if (is_dir($pathToFile)) {
						$is_directory = true;
					}
				}
				
				if ($is_directory) {

				?>
				<tr>
					<th class="col-sm-3">Datos del Cliente</th>
					<th class="col-sm-2">N° de Actas</th>
					<th class="col-sm-2">Tipo de Actas</th>
					<th class="col-sm-2">Inicio / Entrega</th>
					<th class="col-sm-2">Acciones</th>
				</tr>
				<?php }else{
					?>
				<tr>
					<th>Nombre del Archivo</th>
					<th>Fecha de Modificación</th>
					<th>Peso</th>
					<th>Acciones</th>
				</tr>
				<?php } ?>
			</thead>
			<tbody style="background-color: #94daff">
			<?php
			
			foreach ($scan as $a) {
		
						
						if ($is_directory) {

							while($row = $result->fetch_assoc()){
								$rowcedula = $row['cedula'];
								$sql2 = "SELECT * FROM actas INNER JOIN clientes_actas ON actas.id_acta=clientes_actas.id_acta WHERE clientes_actas.cedula_cliente = '$rowcedula' ORDER BY acta ASC";
								$result2 = $conectar->query($sql2);
								$data2 = array();
								
									$a = "";
									foreach ($scan as $sc) {
										if(strpos($sc, $row['cedula']) !== false) {
											$a = $sc;
										}
									}
									
								while($row2 = $result2->fetch_assoc()){
									$actas = $row2['acta'];
									$data2[] = $actas;
								}

							if(isset($_GET['dir'])) {
								$linkToDir = ''.$_GET['dir'].'/'.$a.'';
							}
							else { $linkToDir = $a; } 

							$dt = new DateTime($row['fecha']);
						?>
							<tr>
								<td class="col-sm-3">
									<button type="button" class="btn btn-link" title="Ver Archivos">
										<a> <?php echo '<li style="color: black;"><a style="color: black;" href="gestor.php?dir='.$linkToDir.'">'.$a.'</a></li>'; ?> </a>
									</button>
								</td>
								<td class="col-sm-2"><?php echo $row['n_actas']; ?></td>
								<td class="col-sm-2"><?php echo implode(", ", $data2) ?>.</td>
								<td class="col-sm-2">
									<?php echo $dt->format('d-m-Y').' / ';
									$dt->add(new DateInterval('P6M'));
									echo $dt->format('d-m-Y'); ?>
								</td>
								<td class="col-sm-2" style="text-align: center;"> <?php 
								$idCliente = $row['id_cliente'];
									if ($idCargoUser == 1) {
										if ($row['prioridad'] == 0) { ?>
											<span class="btn btn-outline-warning bt-sm" title="Prioridad" onclick="actualizarPrioridad('<?php echo $idCliente ?>')">
												<span class="fa-solid fa-triangle-exclamation"></span>
											</span>
										<?php }else{ ?>
											<span class="btn btn-warning bt-sm" title="Prioridad" onclick="actualizarPrioridad('<?php echo $idCliente ?>')">
												<span class="fa-solid fa-triangle-exclamation"></span>
											</span>
										<?php } ?>
										<span class="btn btn-primary bt-sm" title="Calcular Presupuesto" data-toggle="modal" data-target="#modalCalcPresupuesto" onclick="infoCalcular('<?php echo $row['cedula']; ?>')">
											<span class="fa-solid fa-sack-dollar"></span>
										</span><br>
										<span class="btn btn-danger bt-sm" title="Vaciar Carpeta" onclick="vaciarCarpeta('<?php echo $row['data']; ?>')">
											<span class="fa-solid fa-folder-open"></span>
										</span>
										<span class="btn btn-danger bt-sm" title="Mover a la Papelera" onclick="eliminarCarpeta('<?php echo $row['data']; ?>', '<?php echo $idCliente ?>')">
											<span class="fa-solid fa-trash-can"></span>
										</span>
								<?php
									 }else{
								 ?>
										 <span class="btn btn-outline">
										 	<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
										 	<span title="Detalles" onclick="soloDirector()">No autorizado</span>
										 	<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
										 </span>
								<?php 
									}
								?>

								</td>
								<?php
								
								}
								}
						else {
						
							if(isset($_GET['dir'])) {
								$linkToFile = ''.$_GET['dir'].'/'.$a.'';
							}
							else { $linkToFile = $a; }
							$time = strftime(filemtime("../archivos/".$linkToFile));
							$filep = "../archivos/".$linkToFile;
							$filesz = filesize($filep);
							if($filesz<1000) {
								$size = round($filesz / 1024 / 1024, 3)." Mb";
							}else{
								$size = round($filesz / 1024, 1)." Kb";
							}
							$rutaDescarga = "../archivos/".$linkToFile;
						?>
							<tr>
								<td>
									<button type="button" class="btn btn-link" title="Ver Archivos">
										<?php echo '<li style="color: black;"><a href="../archivos/'.$linkToFile.'" target="_blank" style="color: black;">'.$a.'</a></li>'; ?> </a>
									</button>
								</td>
								<td><?php echo date('d-m-Y', $time); ?></td>
								<td><?php echo $size; ?></td>
								<td style="text-align: center;"> 
									<?php
										if ($idCargoUser == 1) { 
									?>
										<a class="btn btn-info bt-sm" title="Descargar" href="<?php echo $rutaDescarga;?>" download="<?php echo $a;?>">
											<span class="fa-solid fa-download"></span>
										</a>
										<span class="btn btn-danger bt-sm" title="Eliminar" onclick="eliminarArchivo('<?php echo $linkToFile ?>')">
											<span class="fa-solid fa-ban"></span>
										</span>
									<?php
										}else{
									?>
										<span class="btn btn-outline">
										 	<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
										 	<span title="Detalles" onclick="soloDirector()">No autorizado</span>
										 	<span class="fa-solid fa-xmark" title="Detalles" onclick="soloDirector()"></span>
										</span>
									<?php 
										}
									 ?>
								</td>
								<?php
						
						 ?>
							 <?php
						}
					}
							?>
						</tr>
			<?php	
					
					
			?>
			</tbody>
		</table>
	</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#tablaGestorDataTable').DataTable({
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