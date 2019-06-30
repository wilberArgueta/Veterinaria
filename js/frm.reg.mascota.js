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


  $('#frm_nuevaMascota').validate({
    rules: {
      expedienteMascota: {
        required: true

      },

      nombremascota: {
        required: true

      },

      raza: {
        required: true

      },

      edadMascota: {
        required: true
      },

      peso: {
        required: true

      },

      talla: {
        required: true

      },

      genero: {
        required: true

      }
    },


    messages: {
      expedienteMascota: {
        required: "Ingrese el expediente de la mascota por favor"

      },

      nombremascota: {
        required: "Ingrese el nombre de la mascota por favor"

      },

      raza: {
        required: "Ingrese la raza de la mascota por favor"

      },

      edadMascota: {
        required: "Ingrese la edad de la mascota por favor"
      },

      peso: {
        required: "Ingrese el peso de la mascota por favor"
      },

      talla: {
        required: "Ingrese la talla de la mascota por favor"
      },

      genero: {
        required: "Ingrese el genero de la mascota por favor"
      }
    }

  });
});
