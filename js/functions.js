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
		confirmButtonColor: "#ffae01",   
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

jQuery("#editSubjectForm").click(function() {
	swal({   
		title: "¿Seguro que deseas continuar?",    
		type: "warning",   
		showCancelButton: true,
		cancelButtonText: "No",  
		cancelButtonColor: "#DD6B55", 		
		confirmButtonColor: "#ffae01",   
		confirmButtonText: "Continuar",   
		closeOnConfirm: false , 
		closeOnCancel: true,
	},
	function(isConfirm){   
			if (isConfirm) {     
					$("#subject_form").submit();	
		}else {
        return false;
      }
	}
	);
});

 $('.confirmation').on('click', function(){
	 var id = $(this).attr("id");
	     swal({
            title: "¿Seguro que deseas eliminar esta materia?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffae01",
            confirmButtonText: "Continuar",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href',urlApi+'admin/deleteSubject/'+id);
        }
    );

 });
 
 $('.confirmationUser').on('click', function(){
	 var id = $(this).attr("id");
	     swal({
            title: "¿Seguro que deseas eliminar a este usuario?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffae01",
            confirmButtonText: "Continuar",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href',urlApi+'admin/eliminarUsuario/'+id);
        }
    );

 });
  $('.confirmationBlockUser').on('change', function(){
	 var id = $(this).attr("id");
	 if (this.checked){
	 	swal({
            title: "¿Seguro que deseas desbloquear a este usuario?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffae01",
            confirmButtonText: "Continuar",
            closeOnConfirm: false }, function(isConfirm)
        {
        	if(isConfirm==false){
        		$(this).prop('checked', false);
        	}else{
        		$(location).attr('href',urlApi+'admin/unBlockUser/'+id);
        	}         
        } 
    );
	 }else{
	     swal({
            title: "¿Seguro que deseas bloquear a este usuario?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ffae01",
            confirmButtonText: "Continuar",
            closeOnConfirm: false }, function(isConfirm)
        {
        	if(isConfirm==false){
        		$(this).prop('checked', true);
        	}else{
        		$(location).attr('href',urlApi+'admin/blockUser/'+id);
        	}
           
        } 
    );
	}
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
