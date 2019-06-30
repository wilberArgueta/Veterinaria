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


  $('#frm_registroequipo').validate({
    rules: {
      cod_interno: {
        required: true

      },
      nombre: {
        required: true

      },

      idcategoria: {
        required: true

      },

      descripcion: {
        required: true
      },

      cantidad: {
        required: true

      }
    },


    messages: {
      cod_interno: {
        required: "Ingrese el código interno del equipo por favor"

      },

      nombre: {
        required: "Ingrese el nombre del equipo por favor"

      },

      idcategoria: {
        required: "Seleccione la categoria del equipo por favor"

      },

      descripcion: {
        required: "Ingrese la descripcion del equipo por favor"
      },

      cantidad: {
        required: "Ingrese la cantidad correspondiente del equipo por favor"
      }
    }

  });
});
