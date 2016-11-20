					
			$('#EditarUsuario').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Botón que activó el modal
			var id = button.data('idu') // Extraer la información de atributos de datos
			var cod_documento = button.data('ci')
			var email = button.data('email')
			var password = button.data('password')
			var privilegio = button.data('privilegio')
			var idper = button.data('idp')
			var modal = $(this)
			
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #cod_documento').val(cod_documento)
			modal.find('.modal-body #email').val(email)
			modal.find('.modal-body #password').val(password)
			modal.find('.modal-body #privilegio').val(privilegio)
			modal.find('.modal-body #idper').val(idper)
			
			$('.alert').hide();//Oculto alert
		})
			
