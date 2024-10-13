<?php

	session_start();
	require_once "../../procesos/conexion.php";
	$sql = "SELECT clientes_gastos.cedula_cliente as cedula_cliente, clientes_gastos.precio_dolar as precio_dolar, YEAR(clientes_gastos.fecha) as año, MONTH(clientes_gastos.fecha) as mes, CONCAT(clientes.p_nombre,' ',clientes.p_apellido,' C.I. ',clientes.cedula) AS data, gastos.gasto as gasto FROM clientes_gastos INNER JOIN clientes ON clientes.cedula = clientes_gastos.cedula_cliente INNER JOIN gastos ON gastos.id_gasto = clientes_gastos.id_gasto";
	$result = $conectar->query($sql);
	$idCargoUser = $_SESSION['id_cargo'];

?>

	<span class="btn btn-primary mb-3" id="convert-button">Actualizar Precio</span>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-primary" id="tablaPresupuestosDataTable">
			<thead class="thead-dark">
				<tr>
					<th>Año</th>
					<th>Mes</th>
					<th>Datos del Cliente</th>
					<th>Viatico</th>
					<th>Precio USD</th>
					<th>Precio VES</th>
				</tr>
			</thead>
			<tbody style="background-color: #94daff">
				<?php 

					while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					
				?>
				<tr>
					<td class="col-sm-3"><?php echo $row['año'] ?></td>
					<td class="col-sm-3"><?php echo $row['mes'] ?></td>
					<td class="col-sm-3"><?php echo $row['data'] ?></td>
					<td class="col-sm-3"><?php echo $row['gasto'] ?></td>
					<td class="col-sm-3"><?php echo $row['precio_dolar'] ?></td>
					<td class="col-sm-3 result" data-convertion="<?php echo $row['precio_dolar'] ?>"></td>
					<input id="amount" value="<?php echo $row['precio_dolar'] ?>" style="display: none;" readonly></input>
					<input id="from-currency-select" value="USD" style="display: none;" readonly></input>
					<input id="to-currency-select" value="VES" style="display: none;" readonly></input>
				</tr>
				<?php 
					}
				 ?>
			</tbody>
		</table>
	</div>

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
		$('#tablaPresupuestosDataTable').DataTable({
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