<?php

	session_start();
	if (isset($_SESSION['usuario'])) {
	
	require_once "header.php";
	$idCargoUser = $_SESSION['id_cargo'];
	
?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Gestor de Trámites</h1>

			<?php
			$pathToScan = "";
			$path = "../archivos/";
			$pathToScan = $path;
			$dir = false;
			if(isset($_GET['dir'])) {
				$_GET['dir'] = htmlspecialchars($_GET['dir']);
				$dir = "".$path."/".$_GET['dir']."";
				if(is_dir($dir)) {
					$pathToScan = $dir;
				}
			}
			$scan = scandir($pathToScan);
			$scan = array_diff($scan, array('.', '..'));
			if($pathToScan != $path) {
				echo '<a href="gestor.php">Mis Archivos</a>'."->";
				echo '<a href="#">'.$_GET['dir'].'</a>';
			}else{
				echo '<a href="gestor.php">Mis Archivos</a>';
			}
			?><br><br>

			<?php if ($idCargoUser == 1) { ?>
				<span class="btn btn-primary" data-toggle="modal" data-target="#modalAggArchivos" onclick="modalAggArchivos()" >
					<span class="fa-solid fa-file-circle-plus"></span> Agregar Archivos
			</span><br><br>
			<?php } ?> 
			<b>Te recordamos que los archivos correspondientes a los clientes y los registros de los mismos se gestionan por separado, es decir, en sus respectivas pestañas.</b>
			<hr>
			
			<div id="tablaGestorTramites"><?php require "gestor/tablaGestor.php" ?></div>
		</div>
	</div>

	<!-- Modal Agreggar-->
	<div class="modal fade" id="modalAggArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #204cf9">
					<h4 class="modal-title" id="exampleModalLabel">Agregar Archivos</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetFormAggFile()">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					Aqui prodrá guardar los archivos correspondientes a cada cliente en carpetas.</p></h6>
				</div><br><br>
				
				<div class="modal-body">
				<?php if($pathToScan != $path) { ?>
					<form id="frmArchivos" enctype="multipart/form-data" method="post" onsubmit="return agregarArchivosGestorCarpeta('<?php echo $pathToScan ?>')" >
						<label>Cliente</label>
						<select class="form-control">
							<option selected="" disabled=""><?php echo $_GET['dir']; ?></option>
						</select>
						<input type="text" name="ruta" id="ruta" class="form-control" value="<?php echo $pathToScan ?>" style="display: none;">
						
					<?php } else { ?> 
						<form id="frmArchivos" enctype="multipart/form-data" method="post" onsubmit="return agregarArchivosGestor()" >
							<label>Cliente</label>
							<div id="cargarClientes"></div>
					<?php } ?>
						<label>Selecciona Archivos</label>
						<input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="" required="">
					
					
						<br>
                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarAggArchivos" onclick="resetFormAggFile()"> Cerrar</button>
                        	<input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Calcular Presupuesto-->
	<div class="modal fade" id="modalCalcPresupuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #204cf9">
					<h4 class="modal-title" id="exampleModalLabel">Calculo de Presupuesto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div><br>

				<div class="col">
					<h6><p style="text-align: justify;">
					A continuación se mostrara el precio para el trabajo del cliente seleccionado.</p></h6>
				</div><br><br>
				
				<?php $_POST['action'] = null; ?>
				<div class="modal-body">
					<form id="frmCalcPresupuesto" method="POST" autocomplete="off" onsubmit="calcPresupuesto()">
					<input id="from-currency-select" value="USD" style="display: none;" readonly></input>
					<input id="to-currency-select" value="VES" style="display: none;" readonly></input>
						<div class="row">
							<div class="col">
								<label> Cédula:</label>
								<input type="number" name="cedula" id="cedula" class="form-control" value="" readonly="">
							</div>
							<div class="col">
								<label> Nombre:</label>
								<input type="text" name="nombre" id="nombre" class="form-control" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Apellido:</label>
								<input type="text" name="apellido" id="apellido" class="form-control" readonly="">
							</div>
							<div class="col">
								<label> Número de Actas:</label>
								<input type="number" name="n_actas" id="n_actas" class="form-control" readonly="">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Tipo de Actas:</label>
								<input type="text" name="t_actas" id="t_actas" class="form-control" readonly="">
							</div>
							<div class="col">
								<label> Gasto en Aranceles:</label>
								<input type="number" name="aranceles" id="aranceles" class="form-control" readonly="" aria-describedby="aran">
					<small id="aran" class="form-text text-muted">
						Monto presentado en dólares $.
					</small>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label> Gasto en Viaticos:</label> <br>
								<?php
								$sql3 = "SELECT id_gasto, gasto, precio_dolar FROM gastos WHERE id_gasto!=1";
								$result3 = $conectar->query($sql3);
								$index = 0;
								while($viaticos = $result3->fetch_array(MYSQLI_ASSOC)) {
									$index = $index + 1; ?>

									<input type="text" name="id_gasto[]" id="id_gasto-<?php echo $index ?>" class="form-control" value="<?php echo $viaticos['id_gasto'] ?>" style="display: none;">									

									<label> <?php echo $viaticos['gasto']; ?> </label>
									<input type="number" name="viaticos[]" id="viaticos-<?php echo $index ?>" class="form-control" value="<?php echo $viaticos['precio_dolar']; ?>" required="" aria-describedby="viati">
					<small id="viati" class="form-text text-muted">
						Monto presentado en dólares $.
					</small> <?php
								} ?>
							</div>
							<div class="col">
								<label> Precio Final:</label>
								<input type="number" name="precioF" id="precioF" class="form-control amount1" value="a" readonly="" aria-describedby="finall">
								<p id="result1"></p>
							</div>
						</div><br>

                        <div class="modal-footer">
                        	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarCalcPresupuesto"> Cerrar</button>
                        	<button type="button" class="btn btn-success" title="Imprimir"><span class="fa-solid fa-print"></span></button>
							<button type="button" class="btn btn-warning" title="Calcular" id="convert-button" onclick="realizarCalc(<?php echo $index ?>)">Calcular</button>
							<input type="submit" name="action" class="btn btn-primary" value="Guardar">
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once "footer.php"; ?>

	<script src="../js/gestor.js"></script>
	<script type="text/javascript">
		const api = "https://api.exchangerate-api.com/v4/latest/USD";
		const fromDropDown = document.getElementById("from-currency-select");
		const toDropDown = document.getElementById("to-currency-select");

		let convertCurrency = () => {
			//Create References
			const amount = document.querySelector(".amount1").value;
			const fromCurrency = fromDropDown.value;
			const toCurrency = toDropDown.value;

			fetch(api)
			.then((resp) => resp.json())
			.then((data) => {
				let fromExchangeRate = data.rates[fromCurrency];
				let toExchangeRate = data.rates[toCurrency];
				const convertedAmount = (amount / fromExchangeRate) * toExchangeRate;
				result1.innerHTML = `${amount} ${fromCurrency} = ${convertedAmount.toFixed(
				2
				)} ${toCurrency}`;
				console.log(results);
			})
			.catch(error => {
				console.log("here");
				console.error(error);
			});
		};

		document
			.querySelector("#convert-button")
			.addEventListener("click", convertCurrency);
		//window.addEventListener("load", convertCurrency);
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#cargarClientes').load("clientes/selectCliente.php");
		});
	</script>
	<script>
		function agregarArchivosGestor(){
			var formData = new FormData(document.getElementById('frmArchivos'));
			$.ajax({
				url: "../procesos/gestor/guardarArchivos.php",
				type: "POST",
				datatype: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
					data = data.trim();

					if (data == 1){
						$('#frmArchivos')[0].reset();
						$('#btnCerrarAggArchivos').click();
						Swal.fire({
							position: 'top-center',
							icon: 'success',
							title: 'Agregado con Exito!',
							text: "El archivo se ha subido correctamente!",
							allowOutsideClick: false,
							allowEscapeKey: false,
							showConfirmButton: false});
						recargar = function recargar(){
							location.reload();
						}
						setTimeout(recargar, 2000);
					} else {
						Swal.fire({
							position: 'top-center',
							icon: 'error',
							title: 'Fallo al Agregar!',
							allowOutsideClick: false,
							allowEscapeKey: false,
							showConfirmButton: false,
							timer: 2000});
					}
				}
			});
			return false;
		}
	</script>
	<script>
		function agregarArchivosGestorCarpeta(){
			var formData = new FormData(document.getElementById('frmArchivos'));
			$.ajax({
				url: "../procesos/gestor/guardarArchivosCarpeta.php",
				type: "POST",
				datatype: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(data){
					data = data.trim();

					if (data == 1){
						$('#frmArchivos')[0].reset();
						$('#btnCerrarAggArchivos').click();
						Swal.fire({
							position: 'top-center',
							icon: 'success',
							title: 'Agregado con Exito!',
							text: "El archivo se ha subido correctamente!",
							allowOutsideClick: false,
							allowEscapeKey: false,
							showConfirmButton: false});
						recargar = function recargar(){
							location.reload();
						}
						setTimeout(recargar, 2000);
					} else {
						Swal.fire({
							position: 'top-center',
							icon: 'error',
							title: 'Fallo al Agregar!',
							allowOutsideClick: false,
							allowEscapeKey: false,
							showConfirmButton: false,
							timer: 2000});
					}
				}
			});
			return false;
		}
	</script>
	<script type="text/javascript">
		function actualizarPrioridad(idCliente){
			idCliente = parseInt(idCliente);
			$.ajax({
				url: "../procesos/clientes/actualizarPrioridad.php",
				type: "POST",
				datatype: "json",
				data: "idCliente=" + idCliente,
				success:function(data){
					data = data.trim();

					if (data == 1){
						Swal.fire({
							position: 'top-center',
							icon: 'error',
							title: 'Fallo al Actualizar!',
							allowOutsideClick: false,
							allowEscapeKey: false,
							showConfirmButton: false,
							timer: 2000});
					} else {
						location.reload();
					}
				}
			});
		}
	</script>
	<script type="text/javascript">
		function infoCalcular(cedula){
		cedula = parseInt(cedula);
		$.ajax({
			url: "../procesos/clientes/infoCalcular.php",
			type: "POST",
			datatype: "json",
			data: "cedula=" + cedula,
			success:function(data){
				data = jQuery.parseJSON(data);
		
				$('#cedula').val(data['cedula']);
				$('#nombre').val(data['p_nombre']);
				$('#apellido').val(data['p_apellido']);
				$('#n_actas').val(data['n_actas']);

				$.ajax({
					url: "clientes/infoActaCalc.php",
					type: "POST",
					datatype: "json",
					data: "cedula=" + cedula,
					success:function(data){
						$('#t_actas').val(data);
					}
				});

				$.ajax({
					url: "../procesos/clientes/calcularAranceles.php",
					type: "POST",
					datatype: "json",
					data: "cedula=" + cedula,
					success:function(data){
						$('#aranceles').val(data);
					}
				});
			}
		});
	}
	</script>
	<script type="text/javascript">
		function realizarCalc(index){
	    const indexFinal = index;
	    let i = 1;
	    var arrValue = 0;
	    while (i < +indexFinal + 1) {
	        const value = $('#viaticos-'+i).val()
	        arrValue = arrValue + Number(value);
	        i++;
	    }
	    precio = arrValue + Number($('#aranceles').val());
	    $('#precioF').val(precio);
	}
	</script>
	<script type="text/javascript">
		function vaciarCarpeta(linkToDir){
	    Swal.fire({
	        title: '¿Vaciar la Carpeta?',
	        text: "No podrá revertir esta acción.",
	        icon: 'warning',
	        allowOutsideClick: false,
	        allowEscapeKey: false,
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Si, Vaciar',
	        cancelButtonText: 'Cancelar'
	    }).then((result) => {
	        if (result.isConfirmed) {
	            $.ajax({
	                url: "../procesos/gestor/vaciarCarpeta.php",
	                type: "POST",
					datatype: "json",
					data: {linkToDir: linkToDir},
	                success:function(data){
						data = data.trim();

						if (data == 1) {
							Swal.fire({
								position: 'top-center',
								icon: 'success',
								title: 'Vaciada con Exito!',
								text: "La carpeta ha sido vaciada con exito.",
								allowOutsideClick: false,
								allowEscapeKey: false,
								showConfirmButton: false});
							recargar = function recargar(){
								location.reload();
							}
							setTimeout(recargar, 2000);                    
						} else {
							Swal.fire({
								position: 'top-center',
								icon: 'error',
								title: 'Fallo al Vaciar!',
								allowOutsideClick: false,
								allowEscapeKey: false,
								showConfirmButton: false,
								timer: 2000});
							}
						}
	            });
	        }
	    })
	}
	</script>
	<script type="text/javascript">
		function eliminarCarpeta(linkToDir, idCliente){
			idCliente = parseInt(idCliente);
			Swal.fire({
				title: '¿Mover a Papelera?',
				text: "En caso de que la necesites podrás restaurarla.",
				icon: 'warning',
				allowOutsideClick: false,
				allowEscapeKey: false,
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Eliminar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "../procesos/gestor/borrarCarpeta.php",
						type: "POST",
						datatype: "json",
						data: {linkToDir: linkToDir, idCliente: idCliente},
						success:function(data){
							data = data.trim();

							if (data == 1) {
								Swal.fire({
									position: 'top-center',
									icon: 'success',
									title: 'Movida con Exito!',
									text: "La carpeta ha sido movida a la papelera.",
									allowOutsideClick: false,
									allowEscapeKey: false,
									showConfirmButton: false});
								recargar = function recargar(){
									location.reload();
								}
								setTimeout(recargar, 2000);                    
							} else {
								Swal.fire({
									position: 'top-center',
									icon: 'error',
									title: 'Fallo al Mover!',
									allowOutsideClick: false,
									allowEscapeKey: false,
									showConfirmButton: false,
									timer: 2000});
							}
						}
					});    
				}
			})
		}
	</script>
	<script type="text/javascript">
		function eliminarArchivo(linkToFile){
			Swal.fire({
				title: '¿Eliminar?',
				text: "Si eliminas este Archivo, se borrará permanentemente.",
				icon: 'warning',
				allowOutsideClick: false,
				allowEscapeKey: false,
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Eliminar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "../procesos/gestor/eliminarArchivo.php",
						type: "POST",
						datatype: "json",
						data: "linkToFile=" + linkToFile,
						success:function(data){
							data = data.trim();

							if (data == 1) {
								Swal.fire({
									position: 'top-center',
									icon: 'success',
									title: 'Eliminado con Exito!',
									text: "El archivo ha sido eliminado con éxito.",
									allowOutsideClick: false,
									allowEscapeKey: false,
									showConfirmButton: false});
								recargar = function recargar(){
									location.reload();
								}
								setTimeout(recargar, 2000);                      
							} else {
								Swal.fire({
									position: 'top-center',
									icon: 'error',
									title: 'Fallo al Eliminar!',
									allowOutsideClick: false,
									allowEscapeKey: false,
									showConfirmButton: false,
									timer: 2000});
							}
						}
					});    
				}
			})
		}
	</script>

<?php

	} else {
		header("location:../accesodenegado.php");
	}

?>