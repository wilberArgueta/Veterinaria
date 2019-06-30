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


  jQuery.validator.addMethod(
    "http",
    function(value, element) {
      var isValidHttp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(value);
      return (this).optional(element) || isValidHttp;
    },
    "url del tipo http:// ftp:// o https://"
  );

  $('#frm_registrousuario').validate({
    rules: {
      nombreUsuario: {
        required: true
  
      },
      nombreCompleto: {
        required: true
    
      },

      apellidoCompleto: {
        required: true
      },
      password: {
        required: true
      },

      password_confirmara_usuario: {
        required: true,
        equalTo: "#password",
      },
      direccion: {
        required: true,

      },

      telefono: {
        required: true,
        minlength: 8
      },

      email: {
        required: true,
        email: true
      },

    },


    messages: {
      nombreUsuario: {
        required: "Nombre de Usuario de registro no válido"
      },

      nombreCompleto: {
        required: "Ingrese su nombre real por favor"
      },

      apellidoCompleto: {
        required: "Ingrese sus apellidos por favor"
      },

      password: {
        required: "Ingrese un contraseña con un mínimo de 8 caracteres",
        minlength: "contraseña demasiado corta",
      },

      password_confirmara_usuario: {
        required: "Confirme su contraseña por favor",
        minlength: "Su contraseña debe de tener como mínimo 8 caracteres",
        equalTo: "Por favor ingrese la misma contraseña como en el campo anterior"
      },


      telefono: {
        required: "Ingrese un número de teléfono válido",
        minlength: "Número no válido"
      },

      direccion: {
        required: "Ingrese una direccion válida"
      },

      email: "Por favor ingrese una dirección de correo válida",

    
    }

  });
  });
