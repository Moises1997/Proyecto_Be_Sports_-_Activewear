$(document).ready(function(){

	$("#register-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			name : {
				required : true
			},
			Usuario : {
				required : true,
				Usuario: true,
				remote: {
					url: "check-usuario.php",
					type: "post",
					data: {
						Usuario: function() {
							return $( "#Usuario" ).val();
						}
					}
				}
			},
			Password : {
				required : true
			},
			Confirm_Password : {
				required : true,
				equalTo: "#Password"
			}
		},
		messages : {
			name : {
				required : "Por favor, introduzca el nombre"
			},
			Usuario : {
				required : "Introduzca correo electrónico",
				remote : "Correo electrónico ya existe"
			},
			Password : {
				required : "Por favor, ingrese contraseña"
			},
			Confirm_Password : {
				required : "Introduzca confirmación de la contraseña",
				equalTo: "Contraseña y confirmación de contraseña no coinciden"
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});


});
