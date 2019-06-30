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


  $('#frm_registroservicio').validate({
    rules: {
      tipo_servicio: {
        required: true

      },
      descripcion: {
        required: true

      },

      idcliente: {
        required: true

      },

      precio: {
        required: true
      },

      porcentaje_ganancia: {
        required: true

      }
    },


    messages: {
      tipo_servicio: {
        required: "Ingrese un tipo de servicio por favor"

      },

      descripcion: {
        required: "Ingrese una descripción del servicio por favor"

      },

      idcliente: {
        required: "Seleccione o ingrese un cliente por favor"

      },

      precio: {
        required: "Ingrese el precio del servicio por favor"
      },

      porcentaje_ganancia: {
        required: "Ingrese el porcentaje de ganancia del servicio por favor"
      }
    }

  });
});
