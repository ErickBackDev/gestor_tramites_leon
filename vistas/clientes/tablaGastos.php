<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT * FROM gastos";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>
	<button class="btn btn-primary m-2" id="convert-button">Actualizar Precio</button>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-primary" id="tablaPreciosDataTable">
			<thead class="thead-dark">
				<tr>
					<th class="col-sm-3">Gasto</th>
					<th class="col-sm-3">Precio USD</th>
					<th class="col-sm-3">Precio VES</th>
					<th class="col-sm-2">Acciones</th>
				</tr>
			</thead>
			<tbody style="background-color: #94daff">
				<?php 

					while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$idGasto = $row['id_gasto'];
					
				?>
				<tr>
					<td class="col-sm-3"><?php echo $row['gasto'] ?></td>
					<td class="col-sm-3"><?php echo $row['precio_dolar'] ?></td>
					<td class="col-sm-3 result" data-convertion="<?php echo $row['precio_dolar'] ?>"></td>
					<input id="amount" value="<?php echo $row['precio_dolar'] ?>" style="display: none;" readonly></input>
					<input id="from-currency-select" value="USD" style="display: none;" readonly></input>
					<input id="to-currency-select" value="VES" style="display: none;" readonly></input>
					<td class="col-sm-2">
						<?php if ($idCargoUser == 2) { ?>
							<span class="btn btn-warning bt-sm" title="Editar" onclick="editarGasto('<?php echo $idGasto ?>')" data-toggle="modal" data-target="#modalModificarGastos">
								<span class="fa-solid fa-file-pen"></span>
							</span>
							<?php if ($idGasto != 1) { ?>
								<span class="btn btn-danger bt-sm" title="Eliminar" onclick="eliminarGasto('<?php echo $idGasto ?>')">
									<span class="fa-solid fa-delete-left"></span>
								</span>
							<?php } ?>
						<?php }else{ ?>
							<span class="btn btn-outline">
								<span class="fa-solid fa-xmark" title="Detalles" onclick="soloContador()"></span>
								<span title="Detalles" onclick="soloContador()">No autorizado</span>
								<span class="fa-solid fa-xmark" title="Detalles" onclick="soloContador()"></span>
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
	const api = "https://api.exchangerate-api.com/v4/latest/USD";
	const fromDropDown = document.getElementById("from-currency-select");
	const toDropDown = document.getElementById("to-currency-select");

	let convertCurrency = () => {
		//Create References
		//const amount = document.querySelector("#amount").value;
		const fromCurrency = fromDropDown.value;
		const toCurrency = toDropDown.value;

		fetch(api)
		.then((resp) => resp.json())
		.then((data) => {
			let fromExchangeRate = data.rates[fromCurrency];
			let toExchangeRate = data.rates[toCurrency];
			const results = document.querySelectorAll(".result");
			results.forEach(element => {
				const amount = element.getAttribute('data-convertion');
				const convertedAmount = (amount/fromExchangeRate)*toExchangeRate;
				element.innerHTML = convertedAmount;
			});
			//result.innerHTML = `${amount} ${fromCurrency} = ${convertedAmount.toFixed(
			//2
			//)} ${toCurrency}`;
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
		$('#tablaPreciosDataTable').DataTable({
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