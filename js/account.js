$(document).ready(function(){

	$("#account-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			old_password : {
				required : true,
				remote   : {
						url: "check-usuario.php",
						type: "post",
						data: {
							Password: function() {
								return $( "#old_password" ).val();
							},
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
			old_password : {
				required : "Introduzca la contraseña actual",
				remote : "Introduzca la contraseña actual correcta"
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
