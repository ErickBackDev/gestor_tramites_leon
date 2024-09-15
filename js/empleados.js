function agregarCargo(){
    $.ajax({
        url: "../procesos/empleados/agregarCargo.php",
        type: "POST",
        datatype: "json",
        data: $('#frmCargos').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#frmCargos')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cargo Existente!',
                    text: 'Este cargo ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            } else {
                $('#frmCargos')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El cargo ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function asignarCargo(idCargo){
    idCargo = parseInt(idCargo);
    $.ajax({
        url: "../procesos/empleados/asignarCargo.php",
        type: "POST",
        datatype: "json",
        data: "idCargo=" + idCargo,
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#tablaCargos').load("empleados/tablaCargos.php");
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Fallo al Actualizar!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2000});
            } else {
                $('#tablaCargos').load("empleados/tablaCargos.php");
            }
        }
    });
}



function editarCargo(idCargo){
    idCargo = parseInt(idCargo);
    $.ajax({
        url: "../procesos/empleados/editarCargo.php",
        type: "POST",
        datatype: "json",
        data: "idCargo=" + idCargo,
        success:function(data){
            data = jQuery.parseJSON(data);
            
            $('#idCargoEdit').val(data['id_cargo']);
            $('#cargoOld').val(data['cargo']);
            $('#cargoEdit').val(data['cargo']);
        }
    });
}



function modificarCargo(){
    $.ajax({
        url: "../procesos/empleados/modificarCargo.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarCargos').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#tablaCargos').load("empleados/tablaCargos.php");
                $('#btnModificarCargos').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "El cargo ha sido actualizado!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 2){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cargo Existente!',
                    text: 'Este cargo ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 3){
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



function eliminarCargo(idCargo){
    idCargo = parseInt(idCargo);
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
                url: "../procesos/empleados/eliminarCargo.php",
                type: "POST",
                datatype: "json",
                data: "idCargo=" + idCargo,
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
                        $('#tablaCargos').load("empleados/tablaCargos.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El cargo ha sido eliminado.",
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



function resetFormAggEmpleados(){
    $('#frmEmpleados')[0].reset();
    document.getElementById('part1').style.display = 'block';
    document.getElementById('part2').style.display = 'none';
    document.getElementById('part3').style.display = 'none';
    document.getElementById('guardar').style.display = 'none';
    document.getElementById("step3").className = document.getElementById("step3").className.replace( /(?:^|\s)active(?!\S)/g , '' );
    document.getElementById("step1").className += " active";
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



function agregarEmpleado(){
    $.ajax({
        url: "../procesos/empleados/agregarEmpleado.php",
        type: "POST",
        datatype: "json",
        data: $('#frmEmpleados').serialize(),
        beforeSend: function(){
            document.getElementById('ellipsis').style.display = 'block';
        },
        success:function(data){
            data = data.trim();

            document.getElementById('ellipsis').style.display = 'none';

            if (data == 1){
                resetFormAggEmpleados();
                document.getElementById('part1').style.display = 'block';
                document.getElementById('part2').style.display = 'none';
                document.getElementById('part3').style.display = 'none';
                document.getElementById('guardar').style.display = 'none';
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El empleado ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Empleado Existente!',
                    text: 'Este empleado ya esta registrado en el sistema!',
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
                    text: 'Ya hay un empleado registrado con este RIF en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 4) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cargo Ocupado!',
                    text: 'Ya hay un director registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 5) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cargo Ocupado!',
                    text: 'Ya hay un contador registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 6) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Seleccione un Cargo!',
                    text: 'No ha sido seleccionado ningún cargo!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function modalEditEmpleados(){
    $('#modalModificarEmpleados').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function editarEmpleado(cedula){
    cedula = parseInt(cedula);
    $.ajax({
        url: "../procesos/empleados/editarEmpleado.php",
        type: "POST",
        datatype: "json",
        data: "cedula=" + cedula,
        success:function(data){
            data = jQuery.parseJSON(data);
            
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
            $('#paisResOld').val(data['paisRes']);
            $('#paisResEdit').val(data['paisRes']);
            $('#estadoResOld').val(data['estadoRes']);
            $('#estadoResEdit').val(data['estadoRes']);
            $('#municipioResOld').val(data['municipioRes']);
            $('#municipioResEdit').val(data['municipioRes']);
            $('#parroquiaResOld').val(data['parroquiaRes']);
            $('#parroquiaResEdit').val(data['parroquiaRes']);
            $('#direccionEdit').val(data['direccion']);
            $('#profesionEdit').val(data['profesion']);
            $('#exProfesionalEdit').val(data['exProfesional']);
            $('#exLaboralEdit').val(data['exLaboral']);
            $('#cargoEmpleado').val(data['id_cargo']);
            $('#empleadosCargos').val(data['id_cargo']);
        }
    });
}



function resetFormEditEmpleado(){
    $('#frmModificarEmpleados')[0].reset();
}



function modificarEmpleado(){
    $.ajax({
        url: "../procesos/empleados/modificarEmpleado.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarEmpleados').serialize(),
        beforeSend: function(){
            document.getElementById('ellipsis').style.display = 'block';
        },
        success:function(data){
            data = data.trim();

            document.getElementById('ellipsis').style.display = 'none';

            if (data == 1){
                $('#tablaEmpleados').load("empleados/tablaEmpleados.php");
                $('#btnModificarEmpleados').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "Los datos del empleado fueron actualizados!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cargo Ocupado!',
                    text: 'Ya hay un director registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 3) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Cargo Ocupado!',
                    text: 'Ya hay un contador registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
            if (data == 4) {
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



function infoEmpleado(cedula){
    cedula = parseInt(cedula);
    $.ajax({
        url: "../procesos/empleados/editarEmpleado.php",
        type: "POST",
        datatype: "json",
        data: "cedula=" + cedula,
        success:function(data){
            data = jQuery.parseJSON(data);
            
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
            $('#profesionInfo').html(data['profesion']);
            $('#exProfesionalInfo').html(data['exProfesional']);
            $('#exLaboralInfo').html(data['exLaboral']);
            $('#cargoInfo').html(data['cargo']);
        }
    });
}



function eliminarEmpleado(cedula){
    cedula = parseInt(cedula);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Si eliminas este empleado, se movará a la papelera.",
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
                url: "../procesos/empleados/eliminarEmpleado.php",
                type: "POST",
                datatype: "json",
                data: "cedula=" + cedula,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        $('#tablaEmpleados').load("empleados/tablaEmpleados.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El empleado ha sido movido a la papelera.",
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