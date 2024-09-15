function restaurarCarpeta(Dir, idCliente){
    idCliente = parseInt(idCliente);
    Swal.fire({
        title: '¿Restaurar?',
        text: "La carpeta será restaurada.",
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
                url: "../procesos/gestor/restaurarCarpeta.php",
                type: "POST",
                datatype: "json",
                data: {Dir: Dir, idCliente: idCliente},
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        $('#tablaPapelera').load("papelera/tablaPapelera.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Restaurada con Exito!',
                            text: "La carpeta ha sido restaurada.",
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



function eliminarPermanente(linkToDir, idCliente){
    idCliente = parseInt(idCliente);
    Swal.fire({
        title: '¿Eliminar?',
        text: "La carpeta será eliminada permanentemente.",
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
                url: "../procesos/gestor/eliminarCarpeta.php",
                type: "POST",
                datatype: "json",
                data: {linkToDir: linkToDir, idCliente: idCliente},
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        $('#tablaPapelera').load("papelera/tablaPapelera.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Eliminada con Exito!',
                            text: "La carpeta ha sido eliminada con éxito.",
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
    })
}



function vaciarPapelera(){
    Swal.fire({
        title: '¿Vaciar la Papelera?',
        text: "No podrá revertir esta acción.",
        icon: 'warning',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Vaciar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../procesos/gestor/vaciarPapelera.php",
                success:function(data){
                    data = data.trim();

                    if (data == 1) {
                        $('#tablaPapelera').load("papelera/tablaPapelera.php");
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Vaciada con Exito!',
                            text: "La papelera ha sido vaciada.",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2500});
                    } else {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'error',
                            title: 'Fallo al Vaciar Papelera!',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            timer: 2000});
                    }
                }
            });
        }
    })
}