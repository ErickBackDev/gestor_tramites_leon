function modalAggArchivos() {
  $("#modalAggArchivos").modal({
    backdrop: "static",
    keyboard: false,
  });
}

function resetFormAggFile() {
  $("#frmArchivos")[0].reset();
}

function realizarCalc(index) {
  const indexFinal = index;
  let i = 1;
  var arrValue = 0;
  while (i < +indexFinal + 1) {
    const value = $("#viaticos-" + i).val();
    arrValue = arrValue + Number(value);
    i++;
  }
  precio = arrValue + $("#aranceles").val();
  $("#precioF").val(precio);
}

function calcPresupuesto() {
  $.ajax({
    url: "../procesos/clientes/agregarPresupuesto.php",
    type: "POST",
    datatype: "json",
    data: $("#frmCalcPresupuesto").serialize(),
    success: function (data) {
      data = data.trim();

      if (data == 1) {
        $("#frmCalcPresupuesto")[0].reset();
        $("#btnCerrarCalcPresupuesto").click();
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Agregada con Exito!",
          text: "El presupuesto ha sido guardado correctamente!",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
        });
        recargar = function recargar() {
          location.reload();
        };
        setTimeout(recargar, 2000);
      } else {
        $("#frmActas")[0].reset();
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: "Fallo al Guardar!",
          text: "Ha ocurrido un error al guardar el presupuesto!",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          timer: 2500,
        });
      }
    },
  });
  return false;
}
