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


  $('#frm_registroExamen').validate({
    rules: {
      tipo_examen: {
        required: true

      },
      descripcion: {
        required: true

      },

      idlaboratorio: {
        required: true

      },

      fecha_examen: {
        required: true
      },

      precio: {
        required: true

      }
    },


    messages: {
      tipo_examen: {
        required: "Ingrese un tipo de examen por favor"

      },

      descripcion: {
        required: "Ingrese una descripción del examen por favor"

      },

      idlaboratorio: {
        required: "Seleccione o ingrese un laboratorio por favor"

      },

      fecha_examen: {
        required: "Seleccione la fecha del examen por favor"
      },

      precio: {
        required: "Ingrese el precio del examen por favor"
      }
    }

  });
});
