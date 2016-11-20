					
			$('#RegistroUsuarios').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Botón que activó el modal
			var id = button.data('id') // Extraer la información de atributos de datos
			var cod_documento = button.data('ci')
			
			var modal = $(this)
			
			modal.find('.modal-body #id').val(id)
			modal.find('.modal-body #cod_documento').val(cod_documento)
			
			
			$('.alert').hide();//Oculto alert
		})
			
