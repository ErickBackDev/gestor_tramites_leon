<?php 

	require_once "../conexion.php";
		
	$table_actas = "actas";
	$backup_file_actas  = "../../htdocs/gestor/respaldos/actas.sql";
	$sql_actas = "SELECT * INTO OUTFILE '$backup_file_actas' FROM $table_actas";

	$table_cargos = "cargos";
	$backup_file_cargos = "../../htdocs/gestor/respaldos/cargos.sql";
	$sql_cargos = "SELECT * INTO OUTFILE '$backup_file_cargos' FROM $table_cargos";

	$table_carpetas = "carpetas";
	$backup_file_carpetas = "../../htdocs/gestor/respaldos/carpetas.sql";
	$sql_carpetas = "SELECT * INTO OUTFILE '$backup_file_carpetas' FROM $table_carpetas";

	$table_clientes = "clientes";
	$backup_file_clientes = "../../htdocs/gestor/respaldos/clientes.sql";
	$sql_clientes = "SELECT * INTO OUTFILE '$backup_file_clientes' FROM $table_clientes";

	$table_clientes_actas = "clientes_actas";
	$backup_file_clientes_actas = "../../htdocs/gestor/respaldos/clientes_actas.sql";
	$sql_clientes_actas = "SELECT * INTO OUTFILE '$backup_file_clientes_actas' FROM $table_clientes_actas";

	$table_clientes_gastos = "clientes_gastos";
	$backup_file_clientes_gastos = "../../htdocs/gestor/respaldos/clientes_gastos.sql";
	$sql_clientes_gastos = "SELECT * INTO OUTFILE '$backup_file_clientes_gastos' FROM $table_clientes_gastos";

	$table_empleados = "empleados";
	$backup_file_empleados = "../../htdocs/gestor/respaldos/empleados.sql";
	$sql_empleados = "SELECT * INTO OUTFILE '$backup_file_empleados' FROM $table_empleados";

	$table_estados = "estados";
	$backup_file_estados = "../../htdocs/gestor/respaldos/estados.sql";
	$sql_estados = "SELECT * INTO OUTFILE '$backup_file_estados' FROM $table_estados";

	$table_gastos = "gastos";
	$backup_file_gastos = "../../htdocs/gestor/respaldos/gastos.sql";
	$sql_gastos = "SELECT * INTO OUTFILE '$backup_file_gastos' FROM $table_gastos";

	$table_municipios = "municipios";
	$backup_file_municipios = "../../htdocs/gestor/respaldos/municipios.sql";
	$sql_municipios = "SELECT * INTO OUTFILE '$backup_file_municipios' FROM $table_municipios";

	$table_paises = "paises";
	$backup_file_paises = "../../htdocs/gestor/respaldos/paises.sql";
	$sql_paises = "SELECT * INTO OUTFILE '$backup_file_paises' FROM $table_paises";

	$table_parroquias = "parroquias";
	$backup_file_parroquias = "../../htdocs/gestor/respaldos/parroquias.sql";
	$sql_parroquias = "SELECT * INTO OUTFILE '$backup_file_parroquias' FROM $table_parroquias";

	$table_usuarios = "usuarios";
	$backup_file_usuarios = "../../htdocs/gestor/respaldos/usuarios.sql";
	$sql_usuarios = "SELECT * INTO OUTFILE '$backup_file_usuarios' FROM $table_usuarios";

	mysqli_select_db($conectar, "gestor_leon");
	$actas = mysqli_query($conectar, $sql_actas);
	$cargos = mysqli_query($conectar, $sql_cargos);
	$carpetas = mysqli_query($conectar, $sql_carpetas);
	$clientes = mysqli_query($conectar, $sql_clientes);
	$clientes_actas = mysqli_query($conectar, $sql_clientes_actas);
	$clientes_gastos = mysqli_query($conectar, $sql_clientes_gastos);
	$empleados = mysqli_query($conectar, $sql_empleados);
	$estados = mysqli_query($conectar, $sql_estados);
	$gastos = mysqli_query($conectar, $sql_gastos);
	$municipios = mysqli_query($conectar, $sql_municipios);
	$paises = mysqli_query($conectar, $sql_paises);
	$parroquias = mysqli_query($conectar, $sql_parroquias);
	$usuarios = mysqli_query($conectar, $sql_usuarios);
	
	if(! $cargos ) {
		die('Could not take data backup: ' . mysqli_error($conectar));
	}
	if(! $clientes ) {
		die('Could not take data backup: ' . mysqli_error($conectar));
	}
	if(! $clientes_gastos ) {
		die('Could not take data backup: ' . mysqli_error($conectar));
	}
	if(! $estados ) {
		die('Could not take data backup: ' . mysqli_error($conectar));
	}
	if(! $municipios ) {
		die('Could not take data backup: ' . mysqli_error($conectar));
	}
	if(! $parroquias ) {
		die('Could not take data backup: ' . mysqli_error($conectar));
	}
	
	echo "Datos guardados correctamente\n";
	
	mysqli_close($conectar);
 ?>