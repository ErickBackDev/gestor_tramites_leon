function agregarActa(){
    $.ajax({
        url: "../procesos/clientes/agregarActa.php",
        type: "POST",
        datatype: "json",
        data: $('#frmActas').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#frmActas')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Acta Existente!',
                    text: 'Esta acta ya esta registrada en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            } else {
                $('#frmActas')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregada con Exito!',
                    text: "El acta ha sido agregada correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function editarActa(idActa){
    idActa = parseInt(idActa);
    $.ajax({
        url: "../procesos/clientes/editarActa.php",
        type: "POST",
        datatype: "json",
        data: "idActa=" + idActa,
        success:function(data){
            data = jQuery.parseJSON(data);
            
            $('#idActaEdit').val(data['id_acta']);
            $('#actaOld').val(data['acta']);
            $('#actaEdit').val(data['acta']);
        }
    });
}



function modificarActa(){
    $.ajax({
        url: "../procesos/clientes/modificarActa.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarActas').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#tablaActas').load("clientes/tablaActas.php");
                $('#btnModificarActas').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificada con Exito!',
                    text: "El acta ha sido actualizada!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                
            }
            if (data == 2){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Acta Existente!',
                    text: 'Esta acta ya esta registrada en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                
            }
            if (data == 3) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Fallo al Modificar!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2000});
            }
        }
    });
    return false;
}



function eliminarActa(idActa){
    idActa = parseInt(idActa);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Una vez eliminada no podrá recuperarse!!!.",
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
                url: "../procesos/clientes/eliminarActa.php",
                type: "POST",
                datatype: "json",
                data: "idActa=" + idActa,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Fallo al Eliminar!',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2000});
                    } else {
                        $('#tablaActas').load("clientes/tablaActas.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminada con Exito!',
                            text: "El acta ha sido eliminada.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
                    }
                }
            });
        }
    });
}



function agregarGasto(){
    $.ajax({
        url: "../procesos/clientes/agregarGasto.php",
        type: "POST",
        datatype: "json",
        data: $('#frmGastos').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#frmGastos')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Costo Operacional Existente!',
                    text: 'Este costo operacional ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            } else {
                $('#frmGastos')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El costo operacional ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function editarGasto(idGasto){
    idGasto = parseInt(idGasto);
    $.ajax({
        url: "../procesos/clientes/editarGasto.php",
        type: "POST",
        datatype: "json",
        data: "idGasto=" + idGasto,
        success:function(data){
            data = jQuery.parseJSON(data);
            
            $('#idGastoEdit').val(data['id_gasto']);
            $('#gastoOld').val(data['gasto']);
            $('#gastoEdit').val(data['gasto']);
            $('#precio_dolarEdit').val(data['precio_dolar']);
        }
    });
}



function modificarGasto(){
    $.ajax({
        url: "../procesos/clientes/modificarGasto.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarGastos').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#tablaGastos').load("clientes/tablaGastos.php");
                $('#btnModificarGastos').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "El costo operacional ha sido actualizado!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 2){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Costo Operacional Existente!',
                    text: 'Este costo operacional ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 3) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Fallo al Modificar!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2000});
            }
        }
    });
    return false;
}



function eliminarGasto(idGasto){
    idGasto = parseInt(idGasto);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Una vez eliminado no podrá recuperarse!!!.",
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
                url: "../procesos/clientes/eliminarGasto.php",
                type: "POST",
                datatype: "json",
                data: "idGasto=" + idGasto,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Fallo al Eliminar!',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2000});
                    } else {
                        $('#tablaGastos').load("clientes/tablaGastos.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El costo operacional ha sido eliminado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
                    }
                }
            });
        }
    });
}



function modalAggCliente(){
    $('#modalAggClientes').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function resetFormAggClientes(){
    $('#frmClientes')[0].reset();
    document.getElementById('part1').style.display = 'block';
    document.getElementById('part2').style.display = 'none';
    document.getElementById('part3').style.display = 'none';
    document.getElementById('guardar').style.display = 'none';
    document.getElementById('step3').className = document.getElementById('step3').className.replace( /(?:^|\s)active(?!\S)/g , '' );
    document.getElementById('step1').className += " active";
    $('#alertCedula').text('En caso de ser cédula extranjera ingrese simplemente los números.');
    $('#alertRif').text('En caso de no poseer rif, ingrese la cédula.');
    $('#alertP_nombre').text('');
    $('#alertP_apellido').text('');
    $('#alertSexo').text('');
    $('#alertF_nacimiento').text('');
    $('#alertEst_civil').text('');
    $('#alertPaisNatal').text('');
    $('#alertPaisRes').text('');
    $('#alertDireccion').text('');
    $('#alertTelefono').text('');
    $('#alertCorreo').text('');
}



function agregarCliente(){
    $.ajax({
        url: "../procesos/clientes/agregarCliente.php",
        type: "POST",
        datatype: "json",
        data: $('#frmClientes').serialize(),
        beforeSend: function(){
            document.getElementById('ellipsis').style.display = 'block';
        },
        success:function(data){
            data = data.trim();

            document.getElementById('ellipsis').style.display = 'none';

            if (data == 1){
                resetFormAggClientes();
                $('#tablaClientes').load("clientes/tablaClientes.php");
                $('#btnCerrarAggClientes').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El cliente ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cliente Existente!',
                    text: 'Este cliente ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 3) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'RIF Existente!',
                    text: 'Ya hay un cliente registrado con este RIF en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 4) {
                resetFormAggClientes();
                $('#tablaClientes').load("clientes/tablaClientes.php");
                $('#btnCerrarAggClientes').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'warning',
                    title: 'El Cliente fue Agregado!',
                    text: "Pero no se le agrego ningún acta, debido a que ninguna fue seleccionada!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: true});
            }
        }
    });
    return false;
}



function modalEditCliente(){
    $('#modalModificarClientes').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function editarCliente(cedula){
    cedula = parseInt(cedula);
    $('.actaCheckbox').each(function(){
        $(this).prop('checked', false);
    })
    $.ajax({
        url: "../procesos/clientes/editarCliente.php",
        type: "POST",
        datatype: "json",
        data: "cedula=" + cedula,
        success:function(response){
            response = jQuery.parseJSON(response);
            
            const data = response.data;
            const actas = response.actas;
    
            $('#cedulaEdit').val(data['cedula']);
            $('#rifEdit').val(data['rif']);
            $('#p_nombreEdit').val(data['p_nombre']);
            $('#s_nombreEdit').val(data['s_nombre']);
            $('#p_apellidoEdit').val(data['p_apellido']);
            $('#s_apellidoEdit').val(data['s_apellido']);
            
            if (data['sexo']=='Masculino') {
                $('#sexoEditM').html('<label><input type="radio" checked="checked" name="sexoEdit" id="sexoEdit" value="Masculino" required=""> Masculino</label><br>');
            }else{
                $('#sexoEditM').html('<label><input type="radio" name="sexoEdit" id="sexoEdit" value="Masculino" required=""> Masculino</label><br>');
            }
            if (data['sexo']=='Femenino') {
                $('#sexoEditF').html('<label><input type="radio" checked="checked" name="sexoEdit" id="sexoEdit" value="Femenino" required=""> Femenino</label><br>');
            }else{
                $('#sexoEditF').html('<label><input type="radio" name="sexoEdit" id="sexoEdit" value="Femenino" required=""> Femenino</label><br>');    
            }
            if (data['sexo']=='Otro') {
                $('#sexoEditO').html('<label><input type="radio" checked="checked" name="sexoEdit" id="sexoEdit" value="Otro" required=""> Otro</label><br>');
            }else{
                $('#sexoEditO').html('<label><input type="radio" name="sexoEdit" id="sexoEdit" value="Otro" required=""> Otro</label><br>');
            }

            $('#f_nacimientoOld').val(data['f_nacimiento']);
            $('#f_nacimientoEdit').val(data['f_nacimiento']);
            $('#est_civilEdit').val(data['est_civil']);
            $('#paisNatalOld').val(data['paisNatal']);
            $('#paisNatalEdit').val(data['paisNatal']);
            $('#estadoNatalOld').val(data['estadoNatal']);
            $('#estadoNatalEdit').val(data['estadoNatal']);
            $('#municipioNatalOld').val(data['municipioNatal']);
            $('#municipioNatalEdit').val(data['municipioNatal']);
            $('#parroquiaNatalOld').val(data['parroquiaNatal']);
            $('#parroquiaNatalEdit').val(data['parroquiaNatal']);
            $('#espNatalEdit').val(data['espNatal']);      
            $('#codigoTelEdit').val(data['codigoTel']);
            $('#telefonoEdit').val(data['telefono']);
            $('#emailEdit').val(data['correo']);
            $('#facebookEdit').val(data['facebook']);
            $('#instagramEdit').val(data['instagram']);
            $('#telegramEdit').val(data['telegram']);
            $('#likedInEdit').val(data['likedIn']);
            $('#paisResOld').val(data['paisRes']);
            $('#paisResEdit').val(data['paisRes']);
            $('#estadoResOld').val(data['estadoRes']);
            $('#estadoResEdit').val(data['estadoRes']);
            $('#municipioResOld').val(data['municipioRes']);
            $('#municipioResEdit').val(data['municipioRes']);
            $('#parroquiaResOld').val(data['parroquiaRes']);
            $('#parroquiaResEdit').val(data['parroquiaRes']);
            $('#direccionEdit').val(data['direccion']);
                
            for(i=0;i<actas.length;i++){
                const acta = actas[i];
                
                $('#clientesActasEdit_'+acta.id_acta).each(function(){
                    $(this).prop('checked', true);
                })
            }

            $('#n_actasEdit').val(data['n_actas']);

            if (data['prioridad']==1) {
                $('#prioridadEdit').html('<label><input type="checkbox" checked="checked" name="prioridadEdit" value="1"> Marque solo si es requerida por el cliente.</label><br>');
            }else{
                $('#prioridadEdit').html('<label><input type="checkbox" name="prioridadEdit" value="1"> Marque solo si es requerida por el cliente.</label><br>');
            }

        }
    });
}



function resetFormEditCliente(){
    $('#frmModificarClientes')[0].reset();
}



function modificarCliente(){
    $.ajax({
        url: "../procesos/clientes/modificarCliente.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarClientes').serialize(),
        beforeSend: function(){
            document.getElementById('ellipsis').style.display = 'block';
        },
        success:function(data){
            data = data.trim();

            document.getElementById('ellipsis').style.display = 'none';

            if (data == 1){
                $('#tablaClientes').load("clientes/tablaClientes.php");
                $('#btnModificarClientes').click();
                $('#frmModificarClientes')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "Los datos del cliente fueron actualizados!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            } else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Fallo al Modificar!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2000});
            }
        }
    });
    return false;
}



function infoCliente(cedula){
    cedula = parseInt(cedula);
    $.ajax({
        url: "../procesos/clientes/editarCliente.php",
        type: "POST",
        datatype: "json",
        data: "cedula=" + cedula,
        success:function(response){
            response = jQuery.parseJSON(response);
            
            const data = response.data;
            const actas = response.actas;
            
            $('#p_nombreInfo').text(data['p_nombre']);
            $('#s_nombreInfo').text(data['s_nombre']);
            $('#p_apellidoInfo').text(data['p_apellido']);
            $('#s_apellidoInfo').text(data['s_apellido']);
            $('#fechaInfo').html(data['fecha']);
            $('#cedulaInfo').html(data['cedula']);
            $('#rifInfo').html(data['rif']);
            $('#est_civilInfo').text(data['est_civil']);
            $('#sexoInfo').text(data['sexo']);
            $('#paisNatalInfo').text(data['paisNatal']);

            if (data['estadoNatal'] != '') {
                $('#estadoNatalInfo').text('Estado '+data['estadoNatal']+'.');
            }else {
                $('#estadoNatalInfo').text('');
            }

            if (data['municipioNatal'] != '') {
                $('#municipioNatalInfo').text(data['municipioNatal']+',');
            }else {
                $('#municipioNatalInfo').text('');
            }

            if (data['parroquiaNatal'] != '') {
                $('#parroquiaNatalInfo').text('Paroquia '+data['parroquiaNatal']+',');
            }else {
                $('#parroquiaNatalInfo').text('');
            }

            $('#espNatalInfo').text(data['espNatal']);
            $('#f_nacimientoInfo').html(data['f_nacimiento']);
            $('#paisResInfo').text(data['paisRes']);

            if (data['estadoRes'] != '') {
                $('#estadoResInfo').text('Estado '+data['estadoRes']+'.');
            }else {
                $('#estadoResInfo').text('');
            }

            if (data['municipioRes'] != '') {
                $('#municipioResInfo').text(data['municipioRes']+',');
            }else {
                $('#municipioResInfo').text('');
            }

            if (data['parroquiaRes'] != '') {
                $('#parroquiaResInfo').text('Paroquia '+data['parroquiaRes']+',');
            }else {
                $('#parroquiaResInfo').text('');
            }

            $('#direccionInfo').html(data['direccion']);
            $('#correoInfo').html(data['correo']);
            $('#codigoTelInfo').html(data['codigoTel']);
            $('#telefonoInfo').html(data['telefono']);

            if (data['facebook'] != '') {
                $('#facebookInfo').html('<p><li><b>Facebook: </b><span>'+data['facebook']+'</span></li></p>');
            }else{
                $('#facebookInfo').html('');
            }

            if (data['instagram'] != '') {
                $('#instagramInfo').html('<p><li><b>Instagram: </b><span>'+data['instagram']+'</span></li></p>');
            }else{
                $('#instagramInfo').html('');
            }

            if (data['telegram'] != '') {
                $('#telegramInfo').html('<p><li><b>Telegram: </b><span>'+data['telegram']+'</span></li></p>');
            }else{
                $('#telegramInfo').html('');
            }

            if (data['likedIn'] != '') {
                $('#likedInInfo').html('<p><li><b>LinkedIn: </b><span>'+data['likedIn']+'</span></li></p>');
            }else{
                $('#likedInInfo').html('');
            }

            $('#n_actasInfo').html(data['n_actas']);

            $.ajax({
                url: "clientes/infoActa.php",
                type: "POST",
                datatype: "json",
                data: "cedula=" + cedula,
                success:function(data){
                    $('#cargarActasInfo').html(data);
                }
            });

            if (data['prioridad']==1) {
                $('#prioridadInfo').html('Requiere Prioridad.');
            }else{
                $('#prioridadInfo').html('No Requiere Prioridad.');
            }

            $('#descripcionInfo').html(data['descripcion']);

        }
    });
}



function borrarCliente(cedula){
    cedula = parseInt(cedula);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Si eliminas este cliente, se moverá al historial.",
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
                url: "../procesos/clientes/borrarCliente.php",
                type: "POST",
                datatype: "json",
                data: "cedula=" + cedula,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            title: '¿Realizado?',
                            text: "Indique el estado final del trámite.",
                            icon: 'warning',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Consolidado',
                            cancelButtonText: 'Por Concretar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "../procesos/clientes/clienteConsolidado.php",
                                    type: "POST",
                                    datatype: "json",
                                    data: "cedula=" + cedula,
                                    success:function(data){
                                        data = data.trim();
                                        if (data == 1) {
                                            $('#tablaClientes').load("clientes/tablaClientes.php");
                                            Swal.fire({
                                                position: 'top-center',
                                                icon: 'success',
                                                title: 'Eliminado con Exito!',
                                                text: "El cliente ha sido movido al historial de clientes consolidados.",
                                                allowOutsideClick: false,
                                                allowEscapeKey: false,
                                                showConfirmButton: false,
                                                timer: 2500});                        
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
                            } else {
                                Swal.fire({
                                    title: 'Motivo',
                                    html: '<div class="container col-sm-12"> <h6>Indique el motivo por el cual no se pudo realizar el trámite.</h6> <hr> <div class="row"> <div class="col"> <form id="frmMovCan" method="POST" autocomplete="off"> <label>Motivo:</label> <textarea name="motivo" id="motivo" class="form-control" onkeyup="mayus(this.id, this.value);" required=""></textarea> <br> <div class="row"> <div class="col-sm-12 text-center">  </div> </div> </form> </div> </div> </div>',
                                    icon: 'question',
                                    allowOutsideClick: false,
                                    allowEscapeKey: false,
                                    showCancelButton: false,
                                    confirmButtonColor: '#d33',
                                    confirmButtonText: 'Continuar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "../procesos/clientes/clienteCangrejo.php",
                                            type: "POST",
                                            datatype: "json",
                                            data: $('#frmMovCan').serialize() + "&cedula=" + cedula,
                                            success:function(data){
                                                data = data.trim();
                                                if (data == 1) {
                                                    $('#tablaClientes').load("clientes/tablaClientes.php");
                                                    Swal.fire({
                                                        position: 'top-center',
                                                        icon: 'success',
                                                        title: 'Eliminado con Exito!',
                                                        text: "El cliente ha sido movido al historial de clientes por concretar.",
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                        showConfirmButton: false,
                                                        timer: 2500});                        
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
                                });
                            }
                        });    
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
    });
}



function restaurarCliente(cedula){
    cedula = parseInt(cedula);
    Swal.fire({
        title: '¿Restaurar?',
        text: "El cliente será restaurado.",
        icon: 'warning',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Restaurar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../procesos/clientes/restaurarCliente.php",
                type: "POST",
                datatype: "json",
                data: "cedula=" + cedula,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        $('#tablaClientesConsolidados').load("clientes/tablaClientesConsolidados.php");
                        $('#tablaClientesCangrejos').load("clientes/tablaClientesCangrejos.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Restaurado con Exito!',
                            text: "El cliente ha sido restaurado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
                    } else {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Fallo al Restaurar!',
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



function eliminarCliente(cedula){
    cedula = parseInt(cedula);
    Swal.fire({
        title: '¿Eliminar?',
        text: "El cliente será eliminado permanentemente.",
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
                url: "../procesos/clientes/eliminarCliente.php",
                type: "POST",
                datatype: "json",
                data: "cedula=" + cedula,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Fallo al Eliminar!',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2000});
                    } else {
                        $('#tablaClientesConsolidados').load("clientes/tablaClientesConsolidados.php");
                        $('#tablaClientesCangrejos').load("clientes/tablaClientesCangrejos.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El cliente ha sido eliminado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
                    }
                }
            });
        }
    });
}