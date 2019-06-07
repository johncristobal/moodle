/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Header Search
4. Init Menu
5. Init Home Slider
6. Init Courses Slider
7. Init Milestones
8. Init Accordions


******************************/
var idchatTemp = "";
var me = "";
var lastmessage = 0;

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var menu = $('.menu');
	var menuActive = false;
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
	initHomeSlider();
	initCoursesSlider();
	initMilestones();
	initAccordions();

        $('.deleteDirectorUser').on('click', function(){
            var id = $(this).attr("id");
                swal({
               title: "¿Seguro que deseas eliminar a este usuario?",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#ffae01",
               confirmButtonText: "Continuar",
               closeOnConfirm: false }, function()
           {
               $(location).attr('href',urlApi+'director/eliminarUsuario/'+id);
           }
        );

        });
        
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
         * director calificará tarea subida 
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
         * director manda calificacion tarea modal
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
                                window.location.href = urlApi+"director/homework_alumno/"+idtareatemp;
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

	5. Init Home Slider

	*/

	function initHomeSlider()
	{
		if($('.home_slider').length)
		{
			var homeSlider = $('.home_slider');
			homeSlider.owlCarousel(
			{
				items:1,
				loop:true,
				autoplay:true,
				autoplayTimeout:8000,
				dots:false,
				nav:false,
				smartSpeed:1200
			});

			if($('.home_slider_prev').length)
			{
				var prev = $('.home_slider_prev');
				prev.on('click', function()
				{
					homeSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.home_slider_next').length)
			{
				var next = $('.home_slider_next');
				next.on('click', function()
				{
					homeSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	6. Init Courses Slider

	*/

	function initCoursesSlider()
	{
		if($('.courses_slider').length)
		{
			var coursesSlider = $('.courses_slider');
			coursesSlider.owlCarousel(
			{
				items:3,
				loop:true,
				autoplay:true,
				autoplayTimeout:8000,
				nav:false,
				dots:false,
				smartSpeed:1200,
				margin:30,
				responsive:
				{
					0:
					{
						items:1
					},
					768:
					{
						items:2
					},
					992:
					{
						items:3
					}
				}
			});

			if($('.courses_slider_prev').length)
			{
				var prev = $('.courses_slider_prev');
				prev.on('click', function()
				{
					coursesSlider.trigger('prev.owl.carousel');
				});
			}

			if($('.courses_slider_next').length)
			{
				var next = $('.courses_slider_next');
				next.on('click', function()
				{
					coursesSlider.trigger('next.owl.carousel');
				});
			}
		}
	}

	/* 

	7. Initialize Milestones

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

	/* 

	8. Init Accordions

	*/

	function initAccordions()
	{
		if($('.accordion').length)
		{
			var accs = $('.accordion');

			accs.each(function()
			{
				var acc = $(this);

				if(acc.hasClass('active'))
				{
					var panel = $(acc.next());
					var panelH = panel.prop('scrollHeight') + "px";
					
					if(panel.css('max-height') == "0px")
					{
						panel.css('max-height', panel.prop('scrollHeight') + "px");
					}
					else
					{
						panel.css('max-height', "0px");
					} 
				}

				acc.on('click', function()
				{
					if(acc.hasClass('active'))
					{
						acc.removeClass('active');
						var panel = $(acc.next());
						var panelH = panel.prop('scrollHeight') + "px";
						
						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						} 
					}
					else
					{
						acc.addClass('active');
						var panel = $(acc.next());
						var panelH = panel.prop('scrollHeight') + "px";
						
						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						} 
					}
				});
			});
		}
	}

});
    
    //setTimeout("getMessagesUpdate()",1000);