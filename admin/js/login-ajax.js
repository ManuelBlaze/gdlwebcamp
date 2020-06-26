$(document).ready(function () {

  //Log In
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
