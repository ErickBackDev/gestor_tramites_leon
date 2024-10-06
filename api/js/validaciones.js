function mayus(textboxid, str) {
	// string with alteast one character
	if (str && str.length >= 1)
	{       
		var firstChar = str.charAt(0);
		var remainingStr = str.slice(1);
		str = firstChar.toUpperCase() + remainingStr;
	}
	document.getElementById(textboxid).value = str;
}



function noAutorizado(){
	Swal.fire({
		title: 'Acceso Denegado',
		text: 'No se encuentra autorizado para realizar esta accción.',
		allowOutsideClick: false,
		allowEscapeKey: false
	});
}



function soloDirector(){
    Swal.fire({
        title: 'Acceso Restringido',
        text: 'Está acción solo puede ser realizada por el director.',
        allowOutsideClick: false,
        allowEscapeKey: false
    });
}



function soloContador(){
    Swal.fire({
        title: 'Acceso Restringido',
        text: 'Está acción solo puede ser realizada por el contador.',
        allowOutsideClick: false,
        allowEscapeKey: false
    });
}



function accionCargoDirector(){
	Swal.fire({
		title: 'Cargo del Sistema',
		text: 'Ninguna acción permitida.',
		allowOutsideClick: false,
		allowEscapeKey: false
	});
}



function restablecerDB(){
    Swal.fire({
        title: '¡Advertencia!',
        text: "Esta acción restablecerá por completo la base de datos, es decir, eliminará permanentemente todos los registros, ¿está seguro de continuar?.",
        icon: 'warning',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Continuar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Validar Acción',
                html: '<div class="container col-sm-12"> <h6>Ingrese el código de confirmación para continuar con la acción. Este código se encuentra en el manual de usuario.</h6> <hr> <div class="row"> <div class="col"> <form id="frmCodConfirm" method="POST" autocomplete="off"> <label>Código:</label> <input name="codigo" id="codigo" class="form-control" required=""> <br> <div class="row"> <div class="col-sm-12 text-center"> </div> </div> </form> </div> </div> </div>',
                icon: 'warning',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Continuar',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "procesos/databases/restablecerDB.php",
                        type: "POST",
                        datatype: "json",
                        data: $('#frmCodConfirm').serialize(),
                        beforeSend: function(){
                            document.getElementById('ellipsis').style.display = 'block';
                        },
                        success:function(data){
                            data = data.trim();

                            document.getElementById('ellipsis').style.display = 'none';
                            
                            if (data == 1) {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'Restablecida con Exito!',
                                    text: "Todos los registros han sido eliminados. Ahora deberá comenzar desde cero.",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Ok'});
                            } else if (data == 2) {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'error',
                                    title: 'Código Incorrecto!',
                                    text: "El código ingresado no es correcto. El código se encuentra en el manual de usuario",
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    showCancelButton: false,
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'Reintentar'});
                            } else if (data == 3) {
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
            });
        }
    });
}