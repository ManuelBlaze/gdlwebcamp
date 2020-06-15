(function () {
  "use strict";

  let regalo = document.getElementById('regalo');

  document.addEventListener('DOMContentLoaded', function () {


    //Campos Usuario
    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let email = document.getElementById('email');

    //Campos Pases
    let pase_dia = document.getElementById('pase_dia');
    let pase_dosdias = document.getElementById('pase_dosdias');
    let pase_completo = document.getElementById('pase_completo');

    //Botones y divs
    let calcular = document.getElementById('calcular');
    let errorDiv = document.getElementById('error');
    let btnRegistro = document.getElementById('btnRegistro');
    let lista_productos = document.getElementById('lista-productos');
    let suma = document.getElementById('suma-total');

    //Extras
    let etiquetas = document.getElementById('etiquetas');
    let camisas = document.getElementById('camisa_evento');

    calcular.addEventListener('click', calcularMontos);

    pase_dia.addEventListener('blur', mostrarDias);
    pase_dosdias.addEventListener('blur', mostrarDias);
    pase_completo.addEventListener('blur', mostrarDias);

    nombre.addEventListener('blur', validarCampos);
    apellido.addEventListener('blur', validarCampos);
    email.addEventListener('blur', validarCampos);
    email.addEventListener('blur', validarEmail);


    function validarCampos() {
      if (this.value == '') {
        errorDiv.style.display = 'block';
        errorDiv.innerHTML = "¡Este campo es obligatorio!";
        this.style.border = '1px solid red';
        errorDiv.style.border = '1px solid red';
      } else {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #cccccc';
      }
    }

    function validarEmail() {
      if (this.value.indexOf("@") <= 0) {
        errorDiv.style.display = 'block';
        errorDiv.innerHTML = "¡Ingresa un email válido!";
        this.style.border = '1px solid red';
        errorDiv.style.border = '1px solid red';
      } else {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #cccccc';
      }
    }


    function calcularMontos(e) {
      e.preventDefault();
      if (regalo.value === '') {
        alert("Debes elegir un regalo");
        regalo.focus();
      } else {
        let boletosDia = parseInt(pase_dia.value, 10) || 0,
          boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
          boletoCompleto = parseInt(pase_completo.value, 10) || 0,
          cantidadCamisas = parseInt(camisas.value, 10) || 0,
          cantidadEtiquetas = parseInt(etiquetas.value, 10) || 0;

        let totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto * 50) + ((cantidadCamisas * 10) * 0.93) + (cantidadEtiquetas * 2);

        let listadoProductos = [];

        if (boletosDia >= 1) {
          listadoProductos.push(boletosDia + ' Pase(s) por día ');
        }
        if (boletos2Dias >= 1) {
          listadoProductos.push(boletos2Dias + ' Pase(s) por 2 días ');
        }
        if (boletoCompleto >= 1) {
          listadoProductos.push(boletoCompleto + ' Pase(s) Completos ');
        }
        if (cantidadCamisas >= 1) {
          listadoProductos.push(cantidadCamisas + ' Camisas ');
        }
        if (cantidadEtiquetas >= 1) {
          listadoProductos.push(cantidadEtiquetas + ' Etiquetas ');
        }
        lista_productos.style.display = "block";

        lista_productos.innerHTML = '';
        for (let i = 0; i < listadoProductos.length; i++) {
          lista_productos.innerHTML += listadoProductos[i] + '<br/>';
        }
        suma.innerHTML = `$ ${totalPagar.toFixed(2)}`;
      }
    }

    function mostrarDias() {
      let boletosDia = parseInt(pase_dia.value, 10) || 0,
        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
        boletoCompleto = parseInt(pase_completo.value, 10) || 0;

      let diasElegidos = [];

      if (boletosDia > 0) {
        diasElegidos.push('viernes');
      }
      if (boletos2Dias > 0) {
        diasElegidos.push('viernes', 'sabado');
      }
      if (boletoCompleto > 0) {
        diasElegidos.push('viernes', 'sabado', 'domingo');
      }
      for (let i = 0; i < diasElegidos.length; i++) {
        document.getElementById(diasElegidos[i]).style.display = 'block';
      }
    }



  }); // DOM CONTENT LOADED
})();

$(function () {
  //Lettering
  $('.nombre-sitio').lettering();

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
});
