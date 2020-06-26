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

          case 'exito-evnt':
            swal({
              type: 'success',
              title: 'Correcto',
              text: 'El evento: ' + resultado.nombre + ' se creó correctamente'
            }).then(resultado => {
              //Redireccionar
              if (resultado.value) {
                window.location.href = 'lista-evento.php';
              }
            });
            break;

          case 'exito-cat':
            swal({
              type: 'success',
              title: 'Correcto',
              text: 'La Categoría: ' + resultado.nombre + ' se creó correctamente'
            }).then(resultado => {
              //Redireccionar
              if (resultado.value) {
                window.location.href = 'lista-categoria.php';
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

          case 'correcto-evnt':
            swal({
              type: 'success',
              title: 'Correcto',
              text: 'El evento se modificó correctamente'
            }).then(resultado => {
              //Redireccionar
              if (resultado.value) {
                window.location.href = 'lista-evento.php';
              }
            });
            break;

          case 'correcto-cat':
            swal({
              type: 'success',
              title: 'Correcto',
              text: 'La categoría se modificó correctamente'
            }).then(resultado => {
              //Redireccionar
              if (resultado.value) {
                window.location.href = 'lista-categoria.php';
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
              text: 'Ha ocurrido un Error'
            });
            break;
        }
      }
    });
  });

  //Borrar Registro
  $('.borrar_registro').on('click', function (e) {
    e.preventDefault();

    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');

    Swal.fire({
      title: 'Estás seguro?',
      text: "Esta acción no se puede revertir!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Si, borralo!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'post',
          data: {
            'id': id,
            'registro': 'eliminar'
          },
          url: 'modelo-' + tipo + '.php',
          success: function (data) {
            console.log(data);
            var resultado = JSON.parse(data);
            if (resultado.respuesta == 'exito') {
              jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
              Swal.fire(
                'Eliminado!',
                'La información ha sido borrada correctamente',
                'success'
              )
            } else {
              swal({
                type: 'error',
                title: 'Error!',
                text: 'Ha ocurrido un Error'
              });
            }
          }
        });
      }
    })
  });
});
