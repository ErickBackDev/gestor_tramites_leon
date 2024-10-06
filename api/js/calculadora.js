function modalCalculadora(){
    $('#modalCalculadora').modal({
        backdrop: false,
        keyboard: false
    });
    $('#modalCalculadora').draggable({});
}



function crearCadenaNumero(control,valor){
	$('#' + control).click(function(){
		var valorActual=$('#calculador').val();
		cadena = valorActual + valor;
		$('#calculador').val(cadena);
	});
}



function crearOperacion(control,operacion){
	$('#' + control).click(function(){
		valorActual=$('#calculador').val();
		$('#cantidad1').text(valorActual+" "+operacion);
		$('#calculador').val("");
	});
}



function operacionCompleta(){
	valorActual=$('#calculador').val();
	cantidadGuardada=$('#cantidad1').text();
	tipo=cantidadGuardada.split(" ");

	switch(tipo[1]){
		case "+":
			resultado=parseInt(tipo[0]) + parseInt(valorActual);
			$('#cantidad1').text(tipo[0]+" "+"+"+" "+valorActual);
			$('#calculador').val(resultado);
		break;

		case "-":
			resultado=parseInt(tipo[0]) - parseInt(valorActual);
			$('#cantidad1').text(tipo[0]+" "+"-"+" "+valorActual);
			$('#calculador').val(resultado);
		break;

		case "x":
			resultado=parseInt(tipo[0]) * parseInt(valorActual);
			$('#cantidad1').text(tipo[0]+" "+"x"+" "+valorActual);
			$('#calculador').val(resultado);
		break;

		case "/":
			resultado=parseInt(tipo[0]) / parseInt(valorActual);
			$('#cantidad1').text(tipo[0]+" "+"/"+" "+valorActual);
			$('#calculador').val(resultado);
		break;

		case "v":
            resultado= Math.sqrt(parseInt(tipo[0]));
			$('#cantidad1').text("V"+" "+tipo[0]);
			$('#calculador').val(resultado);
        break;

        case "%":
            count1 = parseInt(tipo[0]) / parseInt(valorActual);
            resultado = count1 * 100;
            $('#cantidad1').text(tipo[0]+" "+"%"+" "+valorActual);
			$('#calculador').val(resultado);
        break;
	}
}



function resetCalculadora(){
    $('#calculador').val("");
    $('#cantidad1').text("");
}