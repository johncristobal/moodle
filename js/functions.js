jQuery(document).ready(function(){

jQuery(".msg-basico").click(function() {
	swal("Texto del mensaje");
});

jQuery(".msg-basico-txt").click(function() {
	swal("Texto del título", "Texto del mensaje inferior");
});

jQuery(".msg-exito").click(function() {
	swal("¡Bien!", "Has hecho clic en el botón :)", "success");
});

jQuery("#editForm").click(function() {
	swal({   
		title: "¿Seguro que deseas continuar?",   
		//text: "No podrás deshacer este paso...",   
		type: "warning",   
		showCancelButton: true,
		cancelButtonText: "No",  
		cancelButtonColor: "#DD6B55", 		
		confirmButtonColor: "#17a2b8",   
		confirmButtonText: "Continuar",   
		closeOnConfirm: false , 
		closeOnCancel: true,
	},
	function(isConfirm){   
			if (isConfirm) {     
					$("#contact_form").submit();	
		}else {
        return false;
      }
	}
	);
});
jQuery(".msg-cond").click(function() {
	swal({   
		title: "¿Deseas unirte al lado oscuro?",   
		text: "Este paso marcará el resto de tu vida...",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "¡Claro!",   
		cancelButtonText: "No, jamás",   
		closeOnConfirm: false,   
		closeOnCancel: false }, 

		function(isConfirm){   
			if (isConfirm) {     
				swal("¡Hecho!", 
					"Ahora eres uno de los nuestros", 
					"success");   
			} else {     
				swal("¡Gallina!", 
					"Tu te lo pierdes...", 
				"error");   
			} 
		});
});

jQuery(".msg-autoclose").click(function() {
	swal({   
		title: "Mensaje con cierre automático",   
		text: "Se cerrará en 3 segundos.",   
		timer: 3000,   
		showConfirmButton: false 
	});

});


});
