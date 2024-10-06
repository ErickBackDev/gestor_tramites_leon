function mostrarEstadoNatal(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("estadoNatal").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectEstadoNatal.php?pais="+str, true);
	conexion.send();
}



function mostrarMunicipioNatal(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("municipioNatal").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectMunicipioNatal.php?estado="+str, true);
	conexion.send();
}



function mostrarParroquiaNatal(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("parroquiaNatal").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectParroquiaNatal.php?municipio="+str, true);
	conexion.send();
}



function mostrarEstadoRes(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("estadoRes").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectEstadoRes.php?pais="+str, true);
	conexion.send();
}



function selectTelf(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("telf").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/codigosTel.php?pais="+str, true);
	conexion.send();
}



function mostrarMunicipioRes(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("municipioRes").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectMunicipioRes.php?estado="+str, true);
	conexion.send();
}



function mostrarParroquiaRes(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("parroquiaRes").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectParroquiaRes.php?municipio="+str, true);
	conexion.send();
}



function mostrarEstadoNatalEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("estNatalEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectEstadoNatalEdit.php?pais="+str, true);
	conexion.send();
}



function mostrarMunicipioNatalEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("munNatalEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectMunicipioNatalEdit.php?estado="+str, true);
	conexion.send();
}



function mostrarParroquiaNatalEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("parNatalEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectParroquiaNatalEdit.php?municipio="+str, true);
	conexion.send();
}



function mostrarEstadoResEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("estResEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectEstadoResEdit.php?pais="+str, true);
	conexion.send();
}



function selectTelfEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("telfEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/codigosTelEdit.php?pais="+str, true);
	conexion.send();
}



function mostrarMunicipioResEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("munResEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectMunicipioResEdit.php?estado="+str, true);
	conexion.send();
}



function mostrarParroquiaResEdit(str){
	var conexion;

	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	}

	if (window.XMLHttpRequest) {
		conexion = new XMLHttpRequest();
	}

	conexion.onreadystatechange=function(){
		if (conexion.readyState == 4 && conexion.status == 200) {
			document.getElementById("parResEdit").innerHTML=conexion.responseText;
		}
	}

	conexion.open("GET", "ubicaciones/selectParroquiaResEdit.php?municipio="+str, true);
	conexion.send();
}



function editLugarNatal(){
    document.getElementById('editLugarNatal').style.display = 'none';
    document.getElementById('noEditLugarNatal').style.display = 'block';

    document.getElementById('divPaiNatal').style.display = 'none';
    document.getElementById('divEstNatal').style.display = 'none';
    document.getElementById('divMunNatal').style.display = 'none';
    document.getElementById('divParNatal').style.display = 'none';

    document.getElementById('paiNatalEdit').style.display = 'block';
    document.getElementById('estNatalEdit').style.display = 'block';
    document.getElementById('munNatalEdit').style.display = 'block';
    document.getElementById('parNatalEdit').style.display = 'block';
}



function editLugarRes(){
    document.getElementById('editLugarRes').style.display = 'none';
    document.getElementById('noEditLugarRes').style.display = 'block';

    document.getElementById('divPaiRes').style.display = 'none';
    document.getElementById('divEstRes').style.display = 'none';
    document.getElementById('divMunRes').style.display = 'none';
    document.getElementById('divParRes').style.display = 'none';

    document.getElementById('paiResEdit').style.display = 'block';
    document.getElementById('estResEdit').style.display = 'block';
    document.getElementById('munResEdit').style.display = 'block';
    document.getElementById('parResEdit').style.display = 'block';
}



function noEditLugar(){
    document.getElementById('editLugarNatal').style.display = 'block';
    document.getElementById('noEditLugarNatal').style.display = 'none';

    document.getElementById('divPaiNatal').style.display = 'block';
    document.getElementById('divEstNatal').style.display = 'block';
    document.getElementById('divMunNatal').style.display = 'block';
    document.getElementById('divParNatal').style.display = 'block';

	document.getElementById('paiNatalEdit').style.display = 'none';
    document.getElementById('estNatalEdit').style.display = 'none';
    document.getElementById('munNatalEdit').style.display = 'none';
    document.getElementById('parNatalEdit').style.display = 'none';

    document.getElementById('editLugarRes').style.display = 'block';
    document.getElementById('noEditLugarRes').style.display = 'none';

    document.getElementById('divPaiRes').style.display = 'block';
    document.getElementById('divEstRes').style.display = 'block';
    document.getElementById('divMunRes').style.display = 'block';
    document.getElementById('divParRes').style.display = 'block';

    document.getElementById('paiResEdit').style.display = 'none';
    document.getElementById('estResEdit').style.display = 'none';
    document.getElementById('munResEdit').style.display = 'none';
    document.getElementById('parResEdit').style.display = 'none';
}