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


  $('#frm_registroProveedores').validate({
    rules: {
      nombre: {
        required: true

      },
      contacto: {
        required: true

      },

      direccion: {
        required: true

      },

      telefono: {
        required: true,
        minlength: 8
      },

      email: {
        required: true

      },

      observacion: {
        required: true

      }
    },


    messages: {
      nombre: {
        required: "Nombre de Proveedor de registro no válido"

      },

      contacto: {
        required: "Ingrese el encargado por favor"

      },

      direccion: {
        required: "Ingrese su direccion por favor"

      },

      telefono: {
        required: "Ingrese un número de teléfono válido",
        minlength: "Número no válido"
      },

      email: {
        required: "Por favor ingrese un correo életronico válido"
      },

      observacion: {
              required: "Por favor ingrese una observacion válido"
            }
    }

  });
});
