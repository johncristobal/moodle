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
          
/*//////////////////////////////////////////////////////////////////////////////
        * muestro previo de imagen
*///////////////////////////////////////////////////////////////////////////////   

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePerfil').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }  
    
        $("#archivo").change(function() {
            readURL(this);
        });

/*//////////////////////////////////////////////////////////////////////////////
        * Profesor descargar tarea alumno
*///////////////////////////////////////////////////////////////////////////////   
        $("#formularioEditarInfo").submit(function(e){
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
                        url: urlApi+"teacher/saveDataProfile",
                        cache: false, 
                        processData: false,  // Important
                        contentType: false,
                        enctype: 'multipart/form-data',
                        method: "post",
                        data: data,
                        success: function(e){
                            if(e === "listo"){
                                window.location.href = urlApi+"teacher/profile";
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
        * Alumno descargar tarea alumno
*///////////////////////////////////////////////////////////////////////////////           
        $("#formularioEditarInfoAlumno").submit(function(e){
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
                        url: urlApi+"student/saveDataProfile",
                        cache: false, 
                        processData: false,  // Important
                        contentType: false,
                        enctype: 'multipart/form-data',
                        method: "post",
                        data: data,
                        success: function(e){
                            if(e === "listo"){
                                window.location.href = urlApi+"student/profile";
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