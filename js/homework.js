/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Header Search
4. Init Menu
5. Init Milestones


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var menu = $('.menu');
	var menuActive = false;
        var cont = 1;
	var header = $('.header');
	var burger = $('.hamburger');
	var ctrl = new ScrollMagic.Controller();
        var idpm = "";
        var idtareatemp = "";

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initHeaderSearch();
	initMenu();
	initMilestones();
        
        $(".nuevatarea").click(function(e){
            idpm = $(this).attr("id");
            $("#id_pm").val(idpm);
            $("#modalAddHW").modal("show");
        })
        
        $("#formularioTarea").submit(function(e){
            e.preventDefault();
            //var data = $('#formularioTarea').serialize();
            // Get form
            var form = $(this)[0];
            // Create an FormData object 
            var data = new FormData(form);
        
            $.ajax({
                url: urlApi+"api/homework/saveHW",
                cache: false, 
                processData: false,  // Important
                contentType: false,
                enctype: 'multipart/form-data',
                method: "post",
                data: data,
                success: function(e){
                    if(e === "listo"){
                        window.location.href = urlApi+"teacher/asignatures";
                    }else{

                    }
                },
                error: function(e){
                    alert(e);
                }
            });
        });

/*//////////////////////////////////////////////////////////////////////////////
        * alumno descargar tarea alumno
*///////////////////////////////////////////////////////////////////////////////
        /*
        * Aluiknos descarga tarea
        */
       $(".downloadFile").click(function(e){
            e.preventDefault();
            var archivo = $(this).attr("href");
            var idpm = $(this).attr("id");
            console.log(archivo);
            
            //empeiza descarga de archivo...
            window.open(urlApi+"tareas/"+idpm+"/"+archivo, '_blank');
       })
       
        /*
         * Alumno selecciona tarea para subir 
         */
        $(".openModal").click(function(e){
            e.preventDefault();
            var archivo = $(this).attr("href");
            var id = $(this).attr("id");
            var dir = $(this).attr("dir");
            idpm = dir;
            var estatus = $(this).parent().siblings(".estatus").attr("id");
            if(estatus === "2"){                
                swal("Esperando revisión...!", "No puedes subir tarea hasta que el profesor revise...", "error");               
            }else if(estatus === "3"){                
                swal("Revisado...!", "El profesor ha revisado tu tarea...", "success");               
            }else{
                console.log(archivo);

                $(".tareaText").empty();
                $(".idtarea").empty();
                $(".idgrupo").empty();
                $(".tareaText").attr("placeholder",archivo);            
                $(".idtarea").attr("value",id);  
                $(".idgrupo").attr("value",dir);  
                $("#modalUploadHome").modal('show');
            }
        });
        
        /*
         * Alumno sube tarea modal
         */
        $("#formularioSubirTarea").submit(function(e){
            e.preventDefault();
            //var data = $('#formularioTarea').serialize();
            // Get form
            var form = $(this)[0];
            // Create an FormData object 
            var data = new FormData(form);
        
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
                    $.ajax({
                        url: urlApi+"api/homework/saveHWStudent",
                        cache: false, 
                        processData: false,  // Important
                        contentType: false,
                        enctype: 'multipart/form-data',
                        method: "post",
                        data: data,
                        success: function(e){
                            if(e === "listo"){
                                window.location.href = urlApi+"student/asignature/"+idpm;
                            }else{

                            }
                        },
                        error: function(e){
                            alert(e);
                        }
                    });	
		}else {
                    return false;
                }
            }
            );
        });
        
/*//////////////////////////////////////////////////////////////////////////////
        * Profesor descargar tarea alumno
*///////////////////////////////////////////////////////////////////////////////
       $(".downloadFileAlumno").click(function(e){
            e.preventDefault();
            var archivo = $(this).attr("href");
            var idpm = $(this).attr("id");
            var id = $(this).attr("dir");
            console.log(archivo);
            
            if(archivo === ""){
                swal("Esperando tarea...!", "El alumno aún no ha subido su tarea...", "error");       
            }else{            
                //empeiza descarga de archivo...
                window.open(urlApi+"tareas/"+idpm+"/"+id+"/"+archivo, '_blank');
            }
       });
        
        /*
         * Prfesor calificará tarea subida 
         */
        $(".openModalCalificar").click(function(e){
            e.preventDefault();
            var archivo = $(this).attr("href");
            var idtareaPadre = $(this).attr("id");
            var idtarea = $(this).attr("dir");
            idtareatemp = idtareaPadre;

            var calif = $(this).parent().siblings(".calificacion").attr("id");
            var estatus = $(this).parent().siblings(".estatus").attr("id");
            
            var archivo = $(this).parent().siblings(".archivo").attr("id");
            var alumno = $(this).parent().siblings(".alumno").attr("id");
            
            if(estatus === "4"){                
                swal("Tarea revisada...", "Finalizado...", "success");               
            }else if(estatus === "0"){                
                swal("Sin tarea...", "El alumno aún no sube su tarea...", "error");               
            }else{
                console.log(archivo);

                $(".cali").empty();
                $(".idtarea").empty();
                $(".idgrupo").empty();
                $(".alumnoModal").empty();
                $(".archivoModal").empty();
                
                $(".cali").attr("placeholder","Calificación máxima: "+calif);  
                $(".alumnoModal").attr("placeholder",alumno);
                $(".archivoModal").attr("placeholder",archivo);
                
                $(".cali").attr("max",calif);
                $(".idtarea").attr("value",idtarea);
                $(".idgrupo").attr("value",idtareaPadre);  
                $("#modalCalificarTarea").modal('show');
            }
        });
        
        /*
         * Profesro califica tarea modal
         */
        $("#formularioCalificarTarea").submit(function(e){
            e.preventDefault();
            //var data = $('#formularioTarea').serialize();
            // Get form
            var form = $(this)[0];
            // Create an FormData object 
            var data = new FormData(form);
        
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
                    $.ajax({
                        url: urlApi+"api/homework/saveStudentCalif",
                        cache: false, 
                        processData: false,  // Important
                        contentType: false,
                        enctype: 'multipart/form-data',
                        method: "post",
                        data: data,
                        success: function(e){
                            if(e === "listo"){
                                window.location.href = urlApi+"teacher/homework_alumno/"+idtareatemp;
                            }else{

                            }
                        },
                        error: function(e){
                            alert(e);
                        }
                    });	
		}else {
                    return false;
                }
            }
            );
        });
        
	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 100)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Header Search

	*/

	function initHeaderSearch()
	{
		if($('.search_button').length)
		{
			$('.search_button').on('click', function()
			{
				if($('.header_search_container').length)
				{
					$('.header_search_container').toggleClass('active');
				}
			});
		}
	}

	/* 

	4. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length)
		{
			var menu = $('.menu');
			if($('.hamburger').length)
			{
				burger.on('click', function()
				{
					if(menuActive)
					{
						closeMenu();
					}
					else
					{
						openMenu();

						$(document).one('click', function cls(e)
						{
							if($(e.target).hasClass('menu_mm'))
							{
								$(document).one('click', cls);
							}
							else
							{
								closeMenu();
							}
						});
					}
				});
			}
		}
	}

	function openMenu()
	{
		menu.addClass('active');
		menuActive = true;
	}

	function closeMenu()
	{
		menu.removeClass('active');
		menuActive = false;
	}

	/* 

	5. Initialize Milestones

	*/

	function initMilestones()
	{
		if($('.milestone_counter').length)
		{
			var milestoneItems = $('.milestone_counter');

	    	milestoneItems.each(function(i)
	    	{
	    		var ele = $(this);
	    		var endValue = ele.data('end-value');
	    		var eleValue = ele.text();

	    		/* Use data-sign-before and data-sign-after to add signs
	    		infront or behind the counter number (+, k, etc) */
	    		var signBefore = "";
	    		var signAfter = "";

	    		if(ele.attr('data-sign-before'))
	    		{
	    			signBefore = ele.attr('data-sign-before');
	    		}

	    		if(ele.attr('data-sign-after'))
	    		{
	    			signAfter = ele.attr('data-sign-after');
	    		}

	    		var milestoneScene = new ScrollMagic.Scene({
		    		triggerElement: this,
		    		triggerHook: 'onEnter',
		    		reverse:false
		    	})
		    	.on('start', function()
		    	{
		    		var counter = {value:eleValue};
		    		var counterTween = TweenMax.to(counter, 4,
		    		{
		    			value: endValue,
		    			roundProps:"value", 
						ease: Circ.easeOut, 
						onUpdate:function()
						{
							document.getElementsByClassName('milestone_counter')[i].innerHTML = signBefore + counter.value + signAfter;
						}
		    		});
		    	})
			    .addTo(ctrl);
	    	});
		}
	}

});