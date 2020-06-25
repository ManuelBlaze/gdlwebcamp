$(document).ready(function () {
  $('#guardar-registro').on('submit', function name(e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function (data) {
        console.log(data);
        var resultado = data;
        switch (resultado.respuesta) {
          case 'exito':
            swal({
              type: 'success',
              title: 'Correcto',
              text: 'El admin: ' + resultado.nombre + ' se creó correctamente'
            }).then(resultado => {
              //Redireccionar
              if (resultado.value) {
                window.location.href = 'lista-admin.php';
              }
            });
            break;

          case 'correcto':
            swal({
              type: 'success',
              title: 'Correcto',
              text: 'El usuario se modificó correctamente'
            }).then(resultado => {
              //Redireccionar
              if (resultado.value) {
                window.location.href = 'lista-admin.php';
              }
            });
            break;

          case 'error-registro':
            swal({
              type: 'error',
              title: 'Error!',
              text: 'El usuario "' + resultado.user + '" ya se encuentra registrado'
            });
            break;

          default:
            swal({
              type: 'error',
              title: 'Error!',
              text: 'Completa todos los campos'
            });
            break;
        }
      }
    });
  });

  $('#login-admin').on('submit', function name(e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function (data) {
        var resultado = data;
        var estado = resultado.respuesta;

        if (estado === 'exitoso') {
          swal({
            type: 'success',
            title: 'Login Correcto',
            text: 'Bienvenid@ ' + resultado.usuario
          }).then(resultado => {
            //Redireccionar
            if (resultado.value) {
              window.location.href = 'admin-area.php';
            }
          });
        } else {
          swal({
            type: 'error',
            title: 'Error!',
            text: 'Usuario o contraseña incorrectos'
          });
        }
      }
    });
  });
});
