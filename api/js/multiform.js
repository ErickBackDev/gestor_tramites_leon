function goPart2(){

	validarCedula();

	function validarCedula() {
		var cedula = document.getElementById('cedula');
		if (cedula.value.length<5 || cedula.value.length>15) {
			$('#alertCedula').text('Debe ingresar un valor entre 5 y 15 digitos.');
			document.getElementById('alertCedula').style.color = 'red';
			cedula.focus();
		}else{
			$('#alertCedula').text('');
			validarRif();
		}
	}

	function validarRif() {
		var rif = document.getElementById('rif');
		if (rif.value.length<5 || rif.value.length>15) {
			$('#alertRif').text('Debe ingresar un valor entre 5 y 15 digitos.');
			document.getElementById('alertRif').style.color = 'red';
			rif.focus();
		}else{
			$('#alertRif').text('');
			validarNombre();
		}
	}

	function validarNombre() {
		var p_nombre = document.getElementById('p_nombre');
		if (p_nombre.value.length<3 || p_nombre.value.length>20) {
			$('#alertP_nombre').text('Debe ingresar un valor entre 3 y 20 digitos.');
			document.getElementById('alertP_nombre').style.color = 'red';
			p_nombre.focus();
		}else{
			$('#alertP_nombre').text('');
			validarApellido();
		}
	}

	function validarApellido() {
		var p_apellido = document.getElementById('p_apellido');
		if (p_apellido.value.length<3 || p_apellido.value.length>20) {
			$('#alertP_apellido').text('Debe ingresar un valor entre 3 y 20 digitos.');
			document.getElementById('alertP_apellido').style.color = 'red';
			p_apellido.focus();
		}else{
			$('#alertP_apellido').text('');
			validarSexo();
		}
	}

	function validarSexo() {
		var masculino = document.getElementById('masculino');
		var femenino = document.getElementById('femenino');
		var otro = document.getElementById('otro');
		if (masculino.checked || femenino.checked || otro.checked) {
			$('#alertSexo').text('');
			validarFecha();
		}else{
			$('#alertSexo').text('Debe selecionar una opción.');
			document.getElementById('alertSexo').style.color = 'red';
		}
	}

	function validarFecha() {
		var fecha = document.getElementById('f_nacimiento');
		if (fecha.value.length == 0) {
			$('#alertF_nacimiento').text('Debe selecionar un fecha.');
			document.getElementById('alertF_nacimiento').style.color = 'red';
			fecha.focus();
		}else{
			$('#alertF_nacimiento').text('');
			validarEstCivil();
		}
	}

	function validarEstCivil() {
		var estCivil = document.getElementById('est_civil');
		if (estCivil.value == 0 || estCivil.value == "") {
			$('#alertEst_civil').text('Debe selecionar una opción.');
			document.getElementById('alertEst_civil').style.color = 'red';
			estCivil.focus();
		}else{
			$('#alertEst_civil').text('');
			document.getElementById('part1').style.display = 'none';
			document.getElementById('part2').style.display = 'block';
			document.getElementById("step1").className = document.getElementById("step1").className.replace( /(?:^|\s)active(?!\S)/g , '' );
			document.getElementById("step2").className += " active";
		}
	}
	
}



function backPart1(){
	document.getElementById('part1').style.display = 'block';
	document.getElementById('part2').style.display = 'none';
	document.getElementById("step2").className = document.getElementById("step2").className.replace( /(?:^|\s)active(?!\S)/g , '' );
	document.getElementById("step1").className += " active";
}



function goPart3(){

	validarPaisNatal();

	function validarPaisNatal() {
		var paisNatal = document.getElementById('paisNatal');
		if (paisNatal.value == 0 || paisNatal.value == "") {
			$('#alertPaisNatal').text('Debe selecionar una opción.');
			document.getElementById('alertPaisNatal').style.color = 'red';
			paisNatal.focus();
		}else{
			$('#alertPaisNatal').text('');
			validarPaisRes();
		}
	}

	function validarPaisRes() {
		var paisRes = document.getElementById('paisRes');
		if (paisRes.value == 0 || paisRes.value == "") {
			$('#alertPaisRes').text('Debe selecionar una opción.');
			document.getElementById('alertPaisRes').style.color = 'red';
			paisRes.focus();
		}else{
			$('#alertPaisRes').text('');
			validarDireccion();
		}
	}

	function validarDireccion() {
		var direccion = document.getElementById('direccion');
		if (direccion.value.length<3 || direccion.value.length>80) {
			$('#alertDireccion').text('Debe ingresar un valor entre 3 y 80 digitos.');
			document.getElementById('alertDireccion').style.color = 'red';
			direccion.focus();
		}else{
			$('#alertDireccion').text('');
			validarTelefono();
		}
	}

	function validarTelefono() {
		var telefono = document.getElementById('telefono');
		if (telefono.value.length<7 || telefono.value.length>20) {
			$('#alertTelefono').text('Debe ingresar un valor entre 7 y 20 digitos.');
			document.getElementById('alertTelefono').style.color = 'red';
			telefono.focus();
		}else{
			$('#alertTelefono').text('');
			validarCorreo();
		}
	}

	function validarCorreo() {
		var correo = document.getElementById('correo');
		var validCorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if (!validCorreo.test(correo.value)) {
			$('#alertCorreo').text('Debe ingresar un correo valido.');
			document.getElementById('alertCorreo').style.color = 'red';
			correo.focus();
		}else{
			$('#alertCorreo').text('');
			document.getElementById('part2').style.display = 'none';
			document.getElementById('part3').style.display = 'block';
			document.getElementById('guardar').style.display = 'block';
			document.getElementById("step2").className = document.getElementById("step2").className.replace( /(?:^|\s)active(?!\S)/g , '' );
			document.getElementById("step3").className += " active";
		}
	}

}



function backPart2(){
	document.getElementById('part2').style.display = 'block';
	document.getElementById('part3').style.display = 'none';
	document.getElementById('guardar').style.display = 'none';
	document.getElementById("step3").className = document.getElementById("step3").className.replace( /(?:^|\s)active(?!\S)/g , '' );
	document.getElementById("step2").className += " active";
}