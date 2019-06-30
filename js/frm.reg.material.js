$(document).ready(function(){ //si el documento se carga hacer las siguientes instrucciones

	$('#frm_registromaterial').validate({ //dentro de los parentesis de coloca el nombre del formulario a afectar con el script
	    rules: { //inician las reglas de jquery.validate
	     
	      codigointerno: { //nombre del campo a evaluar
	       required: true // es un campo requerido ! de null
	      },
	     nombre: {
	        required: true

	      },
	      descripcion: {
	        required: true
	      },
	    
	      porcentajeganacias: {
	      	required: true
	      },
		
		 categoria: {
		  required: true
          },

		   proveedor: {
           required: true,
			 
		 	},

		   cantidad: {
			required: true,
			number: true
			},

			precio_venta: {
				required: true
			},
			fecha_movimiento: {
				required:true
			}



	    },
			highlight: function(element) { //cambia de color a los controles de los input
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) { // si esta lleno cambia estado y color de los controles
				element
				.text('OK!').addClass('has-success')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}
	  });

 });
