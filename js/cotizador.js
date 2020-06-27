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

    btnRegistro.disabled = true;

    if (document.getElementById('calcular')) {
      calcular.addEventListener('click', calcularMontos);

      pase_dia.addEventListener('blur', mostrarDias);
      pase_dosdias.addEventListener('blur', mostrarDias);
      pase_completo.addEventListener('blur', mostrarDias);

      nombre.addEventListener('blur', validarCampos);
      apellido.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarCampos);
      email.addEventListener('blur', validarEmail);
    }

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
          listadoProductos.push(cantidadCamisas + ' Camisa(s) ');
        }
        if (cantidadEtiquetas >= 1) {
          listadoProductos.push(cantidadEtiquetas + ' Etiqueta(s) ');
        }
        lista_productos.style.display = "block";

        lista_productos.innerHTML = '';
        for (let i = 0; i < listadoProductos.length; i++) {
          lista_productos.innerHTML += listadoProductos[i] + '<br/>';
        }
        suma.innerHTML = `$ ${totalPagar.toFixed(2)}`;

        btnRegistro.disabled = false;
        document.getElementById('total_pedido').value = totalPagar;
      }
    }

    function mostrarDias() {
      let boletosDia = parseInt(pase_dia.value, 10) || 0,
        boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
        boletoCompleto = parseInt(pase_completo.value, 10) || 0;

      let diasElegidos = [];

      if (boletosDia > 0) {
        diasElegidos.push('Viernes');
      }
      if (boletos2Dias > 0) {
        diasElegidos.push('Viernes', 'Sábado');
      }
      if (boletoCompleto > 0) {
        diasElegidos.push('Viernes', 'Sábado', 'Domingo');
      }
      for (let i = 0; i < diasElegidos.length; i++) {
        document.getElementById(diasElegidos[i]).style.display = 'block';
      }
    }



  }); // DOM CONTENT LOADED
})();
