function mostrarPaises(){
    document.getElementById('Paises').style.display = 'block';
    document.getElementById('Estados').style.display = 'none';
    document.getElementById('Municipios').style.display = 'none';
    document.getElementById('Parroquias').style.display = 'none';
}



function mostrarEstados(){
    document.getElementById('Paises').style.display = 'none';
    document.getElementById('Estados').style.display = 'block';
    document.getElementById('Municipios').style.display = 'none';
    document.getElementById('Parroquias').style.display = 'none';
}



function mostrarMunicipios(){
    document.getElementById('Paises').style.display = 'none';
    document.getElementById('Estados').style.display = 'none';
    document.getElementById('Municipios').style.display = 'block';
    document.getElementById('Parroquias').style.display = 'none';
}



function mostrarParroquias(){
    document.getElementById('Paises').style.display = 'none';
    document.getElementById('Estados').style.display = 'none';
    document.getElementById('Municipios').style.display = 'none';
    document.getElementById('Parroquias').style.display = 'block';
}



function modalAggPais(){
    $('#modalAggPaises').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function resetFormAggPais(){
    $('#frmPaises')[0].reset();
}



function agregarPais(){
    $.ajax({
        url: "../procesos/regiones/agregarPais.php",
        type: "POST",
        datatype: "json",
        data: $('#frmPaises').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#frmPaises')[0].reset();
                $('#btnCerrarAggPaises').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El país ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000, mostrarPaises());
            } else{
                $('#frmPaises')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'País Existente!',
                    text: 'Este país ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function modalEditPais(){
    $('#modalModificarPaises').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function editarPais(id_pais){
    id_pais = parseInt(id_pais);
    $.ajax({
        url: "../procesos/regiones/editarPais.php",
        type: "POST",
        datatype: "json",
        data: "id_pais=" + id_pais,
        success:function(response){
            response = jQuery.parseJSON(response);
            
            const data = response.data;
    
            $('#idPais').val(data['id_pais']);
            $('#paisOld').val(data['pais']);
            $('#paisEdit').val(data['pais']);
            $('#codigoEdit').val(data['codigo']);

        }
    });
}



function modificarPais(){
    $.ajax({
        url: "../procesos/regiones/modificarPais.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarPaises').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#btnModificarPaises').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "El país ha sido actualizado!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            } else if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'País Existente!',
                    text: 'Este país ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }else if (data == 3) {
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



function borrarPais(id_pais){
    id_pais = parseInt(id_pais);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Si eliminas un pais, se borraran también sus municipios subyacentes.",
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
                url: "../procesos/regiones/borrarPais.php",
                type: "POST",
                datatype: "json",
                data: "id_pais=" + id_pais,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El pais ha sido eliminado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
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
    });
}



function modalAggEstado(){
    $('#modalAggEstados').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function resetFormAggEstado(){
    $('#frmEstados')[0].reset();
}



function agregarEstado(){
    $.ajax({
        url: "../procesos/regiones/agregarEstado.php",
        type: "POST",
        datatype: "json",
        data: $('#frmEstados').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#frmEstados')[0].reset();
                $('#btnCerrarAggEstados').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El estado ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            } else{
                $('#frmEstados')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Estado Existente!',
                    text: 'Este estado ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function modalEditEstado(){
    $('#modalModificarEstados').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function editarEstado(id_estado){
    id_estado = parseInt(id_estado);
    $.ajax({
        url: "../procesos/regiones/editarEstado.php",
        type: "POST",
        datatype: "json",
        data: "id_estado=" + id_estado,
        success:function(response){
            response = jQuery.parseJSON(response);
            
            const data = response.data;
    
            $('#idPaisEstado').val(data['id_pais']);
            $('#idEstado').val(data['id_estado']);
            $('#estadoOld').val(data['estado']);
            $('#estadoEdit').val(data['estado']);

        }
    });
}



function modificarEstado(){
    $.ajax({
        url: "../procesos/regiones/modificarEstado.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarEstados').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#btnModificarEstados').click();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "El estado ha sido actualizado!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            }else if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Estado Existente!',
                    text: 'Este estado ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }else if (data == 3) {
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



function borrarEstado(id_estado){
    id_estado = parseInt(id_estado);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Si eliminas un estado, se borraran también sus municipios subyacentes.",
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
                url: "../procesos/regiones/borrarEstado.php",
                type: "POST",
                datatype: "json",
                data: "id_estado=" + id_estado,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El estado ha sido eliminado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
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
    });
}



function modalAggMunicipio(){
    $('#modalAggMunicipios').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function resetFormAggMunicipios(){
    $('#frmMunicipios')[0].reset();
}



function agregarMunicipio(){
    $.ajax({
        url: "../procesos/regiones/agregarMunicipio.php",
        type: "POST",
        datatype: "json",
        data: $('#frmMunicipios').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#btnCerrarAggMunicipios').click();
                $('#frmMunicipios')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregado con Exito!',
                    text: "El municipio ha sido agregado correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            } else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Municipio Existente!',
                    text: 'Este municipio ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function modalEditMunicipio(){
    $('#modalModificarMunicipios').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function editarMunicipio(id_municipio){
    id_municipio = parseInt(id_municipio);
    $.ajax({
        url: "../procesos/regiones/editarMunicipio.php",
        type: "POST",
        datatype: "json",
        data: "id_municipio=" + id_municipio,
        success:function(response){
            response = jQuery.parseJSON(response);
            
            const data = response.data;
    
            $('#idMunicipio').val(data['id_municipio']);
            $('#municipioOld').val(data['municipio']);
            $('#municipioEdit').val(data['municipio']);
            $('#estadoMunEdit').val(data['id_estado']);


        }
    });
}



function modificarMunicipio(){
    $.ajax({
        url: "../procesos/regiones/modificarMunicipio.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarMunicipios').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#btnModificarMunicipios').click();
                $('#frmModificarMunicipios')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificado con Exito!',
                    text: "El municipio ha sido actualizado!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            } else if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Municipio Existente!',
                    text: 'Este municipio ya esta registrado en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            } else if (data == 3) {
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



function borrarMunicipio(id_municipio){
    id_municipio = parseInt(id_municipio);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Si eliminas un municipio, se borraran también sus parroquias subyacentes.",
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
                url: "../procesos/regiones/borrarMunicipio.php",
                type: "POST",
                datatype: "json",
                data: "id_municipio=" + id_municipio,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "El municipio ha sido eliminado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
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
    });
}



function modalAggParroquia(){
    $('#modalAggParroquias').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function resetFormAggParroquias(){
    $('#frmParroquias')[0].reset();
}



function agregarParroquia(){
    $.ajax({
        url: "../procesos/regiones/agregarParroquia.php",
        type: "POST",
        datatype: "json",
        data: $('#frmParroquias').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#btnCerrarAggParroquias').click();
                $('#frmParroquias')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Agregada con Exito!',
                    text: "La parroquia ha sido agregada correctamente!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            } else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Parroquia Existente!',
                    text: 'Esta parroquia ya esta registrada en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            }
        }
    });
    return false;
}



function modalEditParroquia(){
    $('#modalModificarParroquias').modal({
        backdrop: 'static',
        keyboard: false
    });
}



function editarParroquia(id_parroquia){
    id_parroquia = parseInt(id_parroquia);
    $.ajax({
        url: "../procesos/regiones/editarParroquia.php",
        type: "POST",
        datatype: "json",
        data: "id_parroquia=" + id_parroquia,
        success:function(response){
            response = jQuery.parseJSON(response);
            
            const data = response.data;
    
            $('#idParroquia').val(data['id_parroquia']);
            $('#parroquiaOld').val(data['parroquia']);
            $('#parroquiaEdit').val(data['parroquia']);
            $('#municipioParEdit').val(data['id_municipio']);

        }
    });
}



function modificarParroquia(){
    $.ajax({
        url: "../procesos/regiones/modificarParroquia.php",
        type: "POST",
        datatype: "json",
        data: $('#frmModificarParroquias').serialize(),
        success:function(data){
            data = data.trim();

            if (data == 1){
                $('#btnModificarParroquias').click();
                $('#frmModificarParroquias')[0].reset();
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Modificada con Exito!',
                    text: "La parroquia ha sido actualizada!",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
                recargar = function recargar(){
                    location.reload();
                }
                setTimeout(recargar, 2000);
            } else if (data == 2) {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Parroquia Existente!',
                    text: 'Esta parroquia ya esta registrada en el sistema!',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    timer: 2500});
            } else if (data == 3) {
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



function borrarParroquia(id_parroquia){
    id_parroquia = parseInt(id_parroquia);
    Swal.fire({
        title: '¿Eliminar?',
        text: "Se eliminará permanentemente la parroquia.",
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
                url: "../procesos/regiones/borrarParroquia.php",
                type: "POST",
                datatype: "json",
                data: "id_parroquia=" + id_parroquia,
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminado con Exito!',
                            text: "La parroquia ha sido eliminado.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
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
    });
}