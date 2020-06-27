$(function () {
  //Lettering
  $('.nombre-sitio').lettering();

  //Agregar clase a menú
  $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

  //Menu fijo
  let windowHeight = $(window).height();
  let barraAltura = $('.barra').innerHeight();
  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll > windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({
        'margin-top': barraAltura + 'px'
      });
    } else {
      $('.barra').removeClass('fixed');
      $('body').css({
        'margin-top': '0px'
      });
    }
  })

  //Menu Responsive
  $('.menu-movil').on('click', function () {
    $('.navegacion-principal').slideToggle();

  });


  //Programa Evento
  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');

  $('.menu-programa a').on('click', function () {

    $('.menu-programa a').removeClass('activo');
    $(this).addClass('activo');
    $('.ocultar').hide();

    let enlace = $(this).attr('href');
    $(enlace).fadeIn(1000);

    return false;
  });

  //Animaciones parallax numeros
  $('.resumen-evento li:nth-child(1) p').animateNumber({
    number: 6
  }, 1200);
  $('.resumen-evento li:nth-child(2) p').animateNumber({
    number: 15
  }, 1200);
  $('.resumen-evento li:nth-child(3) p').animateNumber({
    number: 3
  }, 1500);
  $('.resumen-evento li:nth-child(4) p').animateNumber({
    number: 9
  }, 1500);

  //Cuenta regresiva
  $('.cuenta-regresiva').countdown('2020/12/10 09:00:00', function (e) {
    $('#dias').html(e.strftime('%D'));
    $('#horas').html(e.strftime('%H'));
    $('#minutos').html(e.strftime('%M'));
    $('#segundos').html(e.strftime('%S'));
  });

  //ColorBox - Invitados
  $('.invitado-info').colorbox({
    inline: true,
    width: "50%"
  });

  //ColorBox-Newsletter
  $('.boton_newsletter').colorbox({
    inline: true,
    width: "50%"
  });
});
