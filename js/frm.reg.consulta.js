$(document).ready(function() {

  $('#telefono').on('keydown', function(event) {
    if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39) {
      // ignore tecla espaciadora y las de desplazamiento
    } else {
      if (event.keyCode < 48 || event.keyCode > 57) {
        event.preventDefault();
      } else {
        // validando un numero de telefono
        inputval = $(this).val();
        var string = inputval.replace(/[^0-9]/g, "");
        var bloc1 = string.substring(3, 7);
        var bloc2 = string.substring(7, 10);
        var string = ("(" + area + ") " + bloc1 + "-" + bloc2);
        $(this).val(string);
      }
    }
  });


  $('#frm_registroconsulta').validate({
    rules: {
      idcliente: {
        required: true

      },
      descripcion: {
        required: true

      },

      c_fisiologica: {
        required: true

      },

      tratamiento: {
        required: true
      },

      fecha_ingreso: {
        required: true

      },

      precio: {
        required: true

      }
    },


    messages: {
      idcliente: {
        required: "Seleccione o ingrese un cliente por favor"

      },

      descripcion: {
        required: "Ingrese una descripción de la consulta por favor"

      },

      c_fisiologica: {
        required: "Ingrese una constancia fisiologíca de la consulta por favor"

      },

      tratamiento: {
        required: "Ingrese un tratamiento por favor"
      },

      fecha_ingreso: {
        required: "Seleccione la fecha de la consulta por favor"
      },

      precio: {
              required: "Ingrese el precio de la consulta por favor"
            }
    }

  });
});
