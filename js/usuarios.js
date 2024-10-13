function registrar() {
  var formData = new FormData(document.getElementById("frmRegistro"));
  $.ajax({
    url: "procesos/usuarios/agregarUsuario.php",
    type: "POST",
    datatype: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      data = data.trim();

      if (data == 1) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Registro Exitoso!",
          text: "Usuario registrado correctamente!",
          icon: "success",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "login.php";
          }
        });
      } else if (data == 2) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Usuario Existente!",
          text: "Por favor ingresa otro nombre de Usuario!",
          icon: "error",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } else if (data == 3) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Cargo Ocupado!",
          text: "Ya hay un director registrado en el sistema!",
          icon: "error",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } else if (data == 4) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Cargo Ocupado!",
          text: "Ya hay un contador registrado en el sistema!",
          icon: "error",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } else if (data == 5) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Imágen Invalida!",
          text: 'Este tipo de imágen no está permitida, le recomendamos que utilice imágenes en formato "jpg" o "png", podrá volverla a subir editando su perfil.',
          icon: "warning",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "login.php";
          }
        });
      } else if (data == 6) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Tamaño Excedido!",
          text: "La imágen seleccionada es muy pesada, el limite de peso es de 5mb, podrá volverla a subir editando su perfil.",
          icon: "warning",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "login.php";
          }
        });
      } else if (data == 7) {
        $("#frmRegistro")[0].reset();
        Swal.fire({
          title: "Fallo de Imágen!",
          text: "Hubo un error al subir la imágen, podrá volverla a subir editando su perfil.",
          icon: "warning",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "login.php";
          }
        });
      }
    },
  });
  return false;
}

function ingresar() {
  // Obtener botones del formulario
  const btnLogin = document.getElementById("btnLogin");
  const btnRegister = document.getElementById("btnRegister");
  const btnResetPassword = document.getElementById("btnResetPassword");
  const btnPrev = document.getElementById("btnPrev");

  $.ajax({
    url: "procesos/usuarios/ingresar.php",
    type: "POST",
    datatype: "json",
    data: $("#frmLogin").serialize(),
    beforeSend: function () {
      // Inhabilitar botones mientras se validan los datos
      btnLogin.classList.remove("btn-primary");
      btnLogin.classList.add("btn-secondary");
      btnLogin.disabled = true;
      btnLogin.value = "Procesando...";

      btnRegister.classList.add("disabled");
      btnResetPassword.classList.add("disabled");
      btnPrev.classList.add("disabled");
    },
    success: function (data) {
      data = data.trim();

      // Habilitar botones despues de validar los datos
      btnLogin.classList.add("btn-primary");
      btnLogin.classList.remove("btn-secondary");
      btnLogin.disabled = false;
      btnLogin.value = "Ingresar";

      btnRegister.classList.remove("disabled");
      btnResetPassword.classList.remove("disabled");
      btnPrev.classList.remove("disabled");

      if (data == 1) {
        $("#frmLogin")[0].reset();
        Swal.fire({
          title: "Datos Correctos!",
          text: "Has inicado sesión!",
          icon: "success",
          confirmButtonText: "Continuar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "vistas/inicio.php";
          }
        });
      }

      if (data == 2) {
        $("#frmLogin")[0].reset();
        Swal.fire({
          title: "Usuario Incorrecto!",
          text: "El nombre de usuario ingresado no existe!",
          icon: "error",
          confirmButtonText: "Reintentar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      }

      if (data == 3) {
        $("#frmLogin")[0].reset();
        Swal.fire({
          title: "Contraseña Incorrecta!",
          text: "La contraseña ingresada no es correcta!",
          icon: "error",
          confirmButtonText: "Reintentar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      }
    },
  });
  return false;
}

function modalEditPerfil() {
  $("#modalModificarPerfil").modal({
    backdrop: "static",
    keyboard: false,
  });
}

function resetModalEditPerfil() {
  $("#frmValidarUser")[0].reset();
  document.getElementById("textoValidar").style.display = "block";
  document.getElementById("frmValidarUser").style.display = "block";
  document.getElementById("textoModificar").style.display = "none";
  document.getElementById("frmModificarPerfil").style.display = "none";
}

function validarUser() {
  $.ajax({
    url: "../procesos/usuarios/validarUser.php",
    type: "POST",
    datatype: "json",
    data: $("#frmValidarUser").serialize(),
    success: function (data) {
      data = data.trim();

      if (data == 1) {
        $("#frmValidarUser")[0].reset();
        Swal.fire({
          title: "Validación Exitosa!",
          text: "Usuario validado correctamente!",
          icon: "success",
          confirmButtonText: "Continuar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            document.getElementById("textoValidar").style.display = "none";
            document.getElementById("frmValidarUser").style.display = "none";
            document.getElementById("textoModificar").style.display = "block";
            document.getElementById("frmModificarPerfil").style.display =
              "block";
          }
        });
      } else {
        $("#frmValidarUser")[0].reset();
        Swal.fire({
          title: "Validación Incorrecta!",
          text: "Los datos ingresados son incorrectos!",
          icon: "error",
          confirmButtonText: "Reintentar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      }
    },
  });
  return false;
}

function editarPerfil(usuario) {
  $.ajax({
    url: "../procesos/usuarios/editarPerfil.php",
    type: "POST",
    datatype: "json",
    data: "usuario=" + usuario,
    success: function (data) {
      data = jQuery.parseJSON(data);

      $("#idUsuario").val(data["id_usuario"]);
      $("#nombreEdit").val(data["nombre"]);
      $("#apellidoEdit").val(data["apellido"]);
      $("#cargoOld").val(data["id_cargo"]);
      $("#cargoUserEdit").val(data["id_cargo"]);
      $("#correoEdit").val(data["correo"]);
      $("#usuarioOld").val(data["usuario"]);
      $("#passwordOld").val(data["password"]);
    },
  });
}

function modificarPerfil() {
  var formData = new FormData(document.getElementById("frmModificarPerfil"));
  $.ajax({
    url: "../procesos/usuarios/modificarPerfil.php",
    type: "POST",
    datatype: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      data = data.trim();

      if (data == 1) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Modificación Exitosa!",
          text: "El perfil ha sido actualizado correctamente, por razones de seguridad se cerrará la sesión.",
          icon: "success",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "../logout.php";
          }
        });
      } else if (data == 2) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Usuario Existente!",
          text: "Por favor ingresa otro nombre de Usuario!",
          icon: "error",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } else if (data == 3) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Cargo Ocupado!",
          text: "Ya hay un director registrado en el sistema!",
          icon: "error",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } else if (data == 4) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Cargo Ocupado!",
          text: "Ya hay un contador registrado en el sistema!",
          icon: "error",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      } else if (data == 5) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Imágen Invalida!",
          text: 'Este tipo de imágen no está permitida, le recomendamos que utilice imágenes en formato "jpg" o "png", podrá volverla a subir editando su perfil.',
          icon: "warning",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "../logout.php";
          }
        });
      } else if (data == 6) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Tamaño Excedido!",
          text: "La imágen seleccionada es muy pesada, el limite de peso es de 5mb, podrá volverla a subir editando su perfil.",
          icon: "warning",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "../logout.php";
          }
        });
      } else if (data == 7) {
        $("#frmModificarPerfil")[0].reset();
        Swal.fire({
          title: "Fallo de Imágen!",
          text: "Hubo un error al subir la imágen, podrá volverla a subir editando su perfil.",
          icon: "warning",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            window.location.href = "../logout.php";
          }
        });
      }
    },
  });
  return false;
}

function modalEditOtrosPerfiles() {
  $("#modalModificarOtrosPerfiles").modal({
    backdrop: "static",
    keyboard: false,
  });
}

function resetModalEditOtrosPerfiles() {
  $("#frmValidarOtroUser")[0].reset();
  document.getElementById("textoOtroValidar").style.display = "block";
  document.getElementById("frmValidarOtroUser").style.display = "block";
  document.getElementById("textoOtroModificar").style.display = "none";
  document.getElementById("ModificarOtrosPerfiles").style.display = "none";
  document.getElementById("editCargo").style.display = "none";
}

function validarOtroUser() {
  $.ajax({
    url: "../procesos/usuarios/validarUser.php",
    type: "POST",
    datatype: "json",
    data: $("#frmValidarOtroUser").serialize(),
    success: function (data) {
      data = data.trim();

      if (data == 1) {
        $("#frmValidarOtroUser")[0].reset();
        Swal.fire({
          title: "Validación Exitosa!",
          text: "Usuario validado correctamente!",
          icon: "success",
          confirmButtonText: "Continuar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        }).then((result) => {
          if (result.value) {
            document.getElementById("textoOtroValidar").style.display = "none";
            document.getElementById("frmValidarOtroUser").style.display =
              "none";
            document.getElementById("textoOtroModificar").style.display =
              "block";
            document.getElementById("ModificarOtrosPerfiles").style.display =
              "block";
          }
        });
      } else {
        $("#frmValidarUser")[0].reset();
        Swal.fire({
          title: "Validación Incorrecta!",
          text: "Los datos ingresados son incorrectos!",
          icon: "error",
          confirmButtonText: "Reintentar",
          allowOutsideClick: false,
          allowEscapeKey: false,
        });
      }
    },
  });
  return false;
}

function modalModificarCargoOtroUsuario() {
  $("#modalModificarCargoOtroUsuario").modal({
    backdrop: "static",
    keyboard: false,
  });
}

function editarCargoUser(id_usuario) {
  $.ajax({
    url: "../procesos/usuarios/editarCargoUser.php",
    type: "POST",
    datatype: "json",
    data: "id_usuario=" + id_usuario,
    success: function (data) {
      data = jQuery.parseJSON(data);

      $("#idUsuarioEdit").val(data["id_usuario"]);
      $("#cargoOldEdit").val(data["id_cargo"]);
      $("#cargoOtroUserEdit").val(data["id_cargo"]);

      document.getElementById("editCargo").style.display = "block";
    },
  });
}

function noEditCargoOtroUser() {
  document.getElementById("editCargo").style.display = "none";
}

function modificarCargoOtroUser() {
  $.ajax({
    url: "../procesos/usuarios/modificarCargoOtroUser.php",
    type: "POST",
    datatype: "json",
    data: $("#frmModificarCargoOtroUser").serialize(),
    success: function (data) {
      data = data.trim();

      if (data == 1) {
        $("#ModificarOtrosPerfiles").load("usuarios/tablaUsuarios.php");
        $("#btnNoEditCargoOtroUser").click();
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Modificado con Exito!",
          text: "El cargo del empleado fue actualizado!",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          timer: 2500,
        });
      }
      if (data == 2) {
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: "Cargo Ocupado!",
          text: "Ya hay un director registrado en el sistema!",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          timer: 2500,
        });
      }
      if (data == 3) {
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: "Cargo Ocupado!",
          text: "Ya hay un contador registrado en el sistema!",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          timer: 2500,
        });
      }
      if (data == 4) {
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: "Fallo al Modificar!",
          allowOutsideClick: false,
          allowEscapeKey: false,
          showConfirmButton: false,
          timer: 2000,
        });
      }
    },
  });
  return false;
}

function recovery() {
  Swal.fire({
    title: "Recuperar Contraseña",
    html: '<div class="container col-sm-12"> <h6>Ingresa el correo con el cual hiciste tu registro de usuario, te será enviada tu contraseña.</h6> <hr> <div class="row"> <div class="col"> <form id="frmRecovery" method="POST" autocomplete="off" onsubmit="return recuperarContraseña()"> <label>Correo Electrónico:</label> <input type="email" name="correo" id="correo" class="form-control" required=""> <br> <div class="row"> <div class="col-sm-12 text-center"> <input class="btn btn-success" type="submit" value="Enviar"> </div> </div> </form> </div> </div> </div>',
    icon: "question",
    allowOutsideClick: false,
    allowEscapeKey: false,
    showCancelButton: true,
    showConfirmButton: false,
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
  });
}

function recuperarContraseña() {
  Swal.fire({
    icon: "success",
    title: "Recuperación Exitosa!",
    text: "Verifique su correo, le enviamos su contraseña.",
    allowOutsideClick: false,
    allowEscapeKey: false,
  });
}

function eliminarUserDirector() {
  Swal.fire({
    title: "¡Advertencia!",
    text: "Esta acción eliminará permanentemente el usuario registrado como director, ¿está seguro de continuar?.",
    icon: "warning",
    allowOutsideClick: false,
    allowEscapeKey: false,
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Continuar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Validar Acción",
        html: '<div class="container col-sm-12"> <h6>Ingrese el código de confirmación para continuar con la acción. Este código se encuentra en el manual de usuario.</h6> <hr> <div class="row"> <div class="col"> <form id="frmCodConfirm" method="POST" autocomplete="off"> <label>Código:</label> <input name="codigo" id="codigo" class="form-control" required=""> <br> <div class="row"> <div class="col-sm-12 text-center"> </div> </div> </form> </div> </div> </div>',
        icon: "warning",
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: false,
        confirmButtonColor: "#d33",
        confirmButtonText: "Continuar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "procesos/usuarios/eliminarUserDirector.php",
            type: "POST",
            datatype: "json",
            data: $("#frmCodConfirm").serialize(),
            success: function (data) {
              data = data.trim();
              if (data == 1) {
                Swal.fire({
                  position: "top-center",
                  icon: "success",
                  title: "Eliminado con Exito!",
                  text: "El usuario registrado como director ha sido eliminado. Ahora se puede registrar un nuevo usuario como director.",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showCancelButton: false,
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "Ok",
                });
              } else if (data == 2) {
                Swal.fire({
                  position: "top-center",
                  icon: "error",
                  title: "Código Incorrecto!",
                  text: "El código ingresado no es correcto. El código se encuentra en el manual de usuario",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showCancelButton: false,
                  confirmButtonColor: "#d33",
                  confirmButtonText: "Reintentar",
                });
              } else if (data == 3) {
                Swal.fire({
                  position: "top-center",
                  icon: "error",
                  title: "Fallo al Eliminar!",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showConfirmButton: false,
                  timer: 2000,
                });
              }
            },
          });
        }
      });
    }
  });
}

function eliminarUserContador() {
  Swal.fire({
    title: "¡Advertencia!",
    text: "Esta acción eliminará permanentemente el usuario registrado como contador, ¿está seguro de continuar?.",
    icon: "warning",
    allowOutsideClick: false,
    allowEscapeKey: false,
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Continuar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Validar Acción",
        html: '<div class="container col-sm-12"> <h6>Ingrese el código de confirmación para continuar con la acción. Este código se encuentra en el manual de usuario.</h6> <hr> <div class="row"> <div class="col"> <form id="frmCodConfirm" method="POST" autocomplete="off"> <label>Código:</label> <input name="codigo" id="codigo" class="form-control" required=""> <br> <div class="row"> <div class="col-sm-12 text-center"> </div> </div> </form> </div> </div> </div>',
        icon: "warning",
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: false,
        confirmButtonColor: "#d33",
        confirmButtonText: "Continuar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "procesos/usuarios/eliminarUserContador.php",
            type: "POST",
            datatype: "json",
            data: $("#frmCodConfirm").serialize(),
            success: function (data) {
              data = data.trim();
              if (data == 1) {
                Swal.fire({
                  position: "top-center",
                  icon: "success",
                  title: "Eliminado con Exito!",
                  text: "El usuario registrado como contador ha sido eliminado. Ahora se puede registrar un nuevo usuario como contador.",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showCancelButton: false,
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "Ok",
                });
              } else if (data == 2) {
                Swal.fire({
                  position: "top-center",
                  icon: "error",
                  title: "Código Incorrecto!",
                  text: "El código ingresado no es correcto. El código se encuentra en el manual de usuario",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showCancelButton: false,
                  confirmButtonColor: "#d33",
                  confirmButtonText: "Reintentar",
                });
              } else if (data == 3) {
                Swal.fire({
                  position: "top-center",
                  icon: "error",
                  title: "Fallo al Eliminar!",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showConfirmButton: false,
                  timer: 2000,
                });
              }
            },
          });
        }
      });
    }
  });
}

function eliminarUsuarios() {
  Swal.fire({
    title: "¡Advertencia!",
    text: "Esta acción eliminará permanentemente todos los usuarios registrados, ¿está seguro de continuar?.",
    icon: "warning",
    allowOutsideClick: false,
    allowEscapeKey: false,
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Continuar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Validar Acción",
        html: '<div class="container col-sm-12"> <h6>Ingrese el código de confirmación para continuar con la acción. Este código se encuentra en el manual de usuario.</h6> <hr> <div class="row"> <div class="col"> <form id="frmCodConfirm" method="POST" autocomplete="off"> <label>Código:</label> <input name="codigo" id="codigo" class="form-control" required=""> <br> <div class="row"> <div class="col-sm-12 text-center"> </div> </div> </form> </div> </div> </div>',
        icon: "warning",
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: false,
        confirmButtonColor: "#d33",
        confirmButtonText: "Continuar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "procesos/usuarios/eliminarUsuarios.php",
            type: "POST",
            datatype: "json",
            data: $("#frmCodConfirm").serialize(),
            beforeSend: function () {
              document.getElementById("ellipsis").style.display = "block";
            },
            success: function (data) {
              data = data.trim();

              document.getElementById("ellipsis").style.display = "none";

              if (data == 1) {
                Swal.fire({
                  position: "top-center",
                  icon: "success",
                  title: "Eliminados con Exito!",
                  text: "Todos los usuarios registrados han sido eliminados. Ahora pueden registrarse nuevos usuarios.",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showCancelButton: false,
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "Ok",
                });
              } else if (data == 2) {
                Swal.fire({
                  position: "top-center",
                  icon: "error",
                  title: "Código Incorrecto!",
                  text: "El código ingresado no es correcto. El código se encuentra en el manual de usuario",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showCancelButton: false,
                  confirmButtonColor: "#d33",
                  confirmButtonText: "Reintentar",
                });
              } else if (data == 3) {
                Swal.fire({
                  position: "top-center",
                  icon: "error",
                  title: "Fallo al Eliminar!",
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  showConfirmButton: false,
                  timer: 2000,
                });
              }
            },
          });
        }
      });
    }
  });
}
