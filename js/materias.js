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
        
        /*
         * 
         * agrega fila con relacion
         */
        $(".agregar").click(function(e){
            //var element = $(".combosMaterias");
            //element.clone().appendTo(".nueva_materia");
            var newel = $('.combosMaterias:last').clone(true);
            
            $(newel).find('.select1').find('select').attr("id","materia_"+cont);
            $(newel).find('.select1').find('select').attr("name","materia_"+cont);
  
            $(newel).find('.select2').find('select').attr("id","profesor_"+cont);
            $(newel).find('.select2').find('select').attr("name","profesor_"+cont);
            
            $(newel).find('.form-group').find('input').attr("id","nombreGrupo_"+cont);
            $(newel).find('.form-group').find('input').attr("name","nombreGrupo_"+cont);
            
            $(newel).insertAfter(".combosMaterias:last");

            cont++;
        });
        
        /*
         * recupero todos los select y las relaciones para mostrar modal
         */
        $(".saveRelations").click(function(e){

            //$(".modal-body").empty();
            var append = "";
            
            $('.nueva_materia > div').each(function(i){
                    var select1 = $(this).find(".select1");
                    var select2 = $(this).find(".select2");
                    console.log(select1.find("select :selected").text());
                    console.log(select2.find("select :selected").text());

                    /*$(".modal-body").append(
                        "Materia: "+select1.find("select :selected").text()+" - "+
                        "Profesor: "+select2.find("select :selected").text()+"<br>"
                    ); */
                    append += "Materia: "+select1.find("select :selected").text()+" - "+
                        "Profesor: "+select2.find("select :selected").text()+"\n";

                        
                });

            //$("#modalRelations").modal('show');

            // m,ostrar alert carlitos (: 
            swal({   
                title: "¿Guardar estas relaciones?",   
                text: append,   
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
                    //$(".modal-body").empty();
                    var arreglo = [];
                    $('.nueva_materia > div').each(function(i){
                        var select1 = $(this).find(".select1");
                        var select2 = $(this).find(".select2");
                        var input = $(this).find(".form-group");
                        console.log(select1.find("select :selected").text());
                        console.log(select2.find("select :selected").text());

                        var materiaid = select1.find("select").val();
                        var profeid = select2.find("select").val();
                        var grupo = input.find("input").val();

                        var relTemp = {idmateria:materiaid,idprofe:profeid, grupo:grupo};
                        arreglo.push(relTemp);            
                    });

                    var myJSON = JSON.stringify(arreglo);

                    $.ajax({
                        url: urlApi+"Admin/saveProfesroMateria",
                        cache: false, 
                        method: "post",
                        data: {data: myJSON},
                        success: function(e){
                            if(e === "listo"){
                                window.location.href = urlApi+"admin/groups";
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
            });
        });
        
        /*
         * Guardo en base de datos y recargo pagina +++deprecated+++
         */
        $(".lastSaveRelations").click(function(e){

            //$(".modal-body").empty();
            var arreglo = [];
            $('.nueva_materia > div').each(function(i){
                    var select1 = $(this).find(".select1");
                    var select2 = $(this).find(".select2");
                    console.log(select1.find("select :selected").text());
                    console.log(select2.find("select :selected").text());

                    var materiaid = select1.find("select").val();
                    var profeid = select2.find("select").val();
                    
                    var relTemp = {idmateria:materiaid,idprofe:profeid};
                    arreglo.push(relTemp);            
                });
                
                var myJSON = JSON.stringify(arreglo);
                
                $.ajax({
                    url: urlApi+"Admin/saveProfesroMateria",
                    cache: false, 
                    method: "post",
                    data: {data: myJSON},
                    success: function(e){
                        if(e === "listo"){
                            window.location.href = urlApi+"admin/groups";
                        }else{

                        }
                    },
                    error: function(e){
                        alert(e);
                    }
                });

            //$("#modalRelations").modal('show');
        });
          
          /*
           * Recupero alumnos
           */
        $(".getAlumnos").click(function(e){
            e.preventDefault();
            var idpm = $(this).attr("id");
            $(".nombreMateria").empty();
            $(".nombreMateria").text(idpm);
            $.ajax({
                url: urlApi+"admin/getAlumnosGrupo",
                cache: false, 
                method: "post",
                data: {data: idpm},
                success: function(e){
                    var data = JSON.parse(e);
                    
                    $.each(data,function (o,d){
                       console.log(d.nombre); 
                       $(".dataAlumno").empty();
                       $(".dataAlumno").append(
                            "<div class='row'>"+
                            "    <div class='col-5 col-sm-2 offset-1'>"+
                            "    <div class='p'>"+
                            "        <div class='news_post_comments'>"+
                            "            <a href='<?= base_url() ?>admin/homework_alumno/"+d.id_alumno+"'>"+d.nombre+"</a>"+
                            "        </div>"+                                                                                                                               
                            "    </div>"+
                            "    </div>"+
                            "    <div class='col-2 col-sm-2'>"+
                            "        <div class='news_post_author'>"+
                            "            <i class='fa fa-trash-o eliminaAlumnoMateria' id='"+d.id_alumno+"' itemid='"+idpm+"' aria-hidden='true'></i>"+
                            "        </div>"+
                            "    </div>"+
                            "</div>");
                    });
                },
                error: function(e){
                    alert(e);
                }
            });
        })
    
        /*
         * show relation to delete
         */
        $(".delete").click(function(e){
            //$(".body-deleted").empty();
            
            idpm = $(this).find(".fa").attr("id");
            var nombre = $(this).siblings(".nombre").attr("id");
            var materia = $(this).siblings(".materia").attr("id");
            
            //$("#modalDelete").modal('show');
            var append = "Materia: "+materia+" - "+
                "Profesor: "+nombre;

            /*$(".body-deleted").append(
                "Materia: "+materia+" - "+
                "Profesor: "+nombre+"<br>"
            );*/
            swal({   
                    title: "¿Seguro que deseas continuar?",  
                    text: append,  
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
                    url: urlApi+"Admin/deleteProfesorMateria",
                    cache: false, 
                    method: "post",
                    data: {idpm: idpm},
                    success: function(e){
                        if(e === "listo"){
                            window.location.href = urlApi+"admin/groups";
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
         * delete relations and reload page ++++ deprecated++++
         */
        $(".deleteRelations").click(function(e){
            //var idpm= $(this).attr("id");
             
            $.ajax({
                url: urlApi+"Admin/deleteProfesorMateria",
                cache: false, 
                method: "post",
                data: {idpm: idpm},
                success: function(e){
                    if(e === "listo"){
                        window.location.href = urlApi+"admin/groups";
                    }else{

                    }
                },
                error: function(e){
                    alert(e);
                }
            });            
        });


        /*
         * 
         * abrir modal para alumnos
         */
        $(".addAlumnos").click(function(e){
            $("#modalAlumnos").modal("show");
            idpm = ($(this).attr("id"));
        });
        
        /*
         * 
         * salvar relaciones
         */
        $(".addRelationAlumnos").click(function(e){
            //recuperar idpm
            var alumnos = "";
            //recuperamos alumnos
            $(".boxes input[type=checkbox]").each(function(i){
                var checekd = $(this).prop('checked');
                if(checekd){
                    console.log(checekd);
                    var idalumno = $(this).attr("value");
                    alumnos += idalumno+",";    
                    
                }
            });
            
            if(alumnos === ""){
                alert("Selecciona al menos un alumno...");
            }else{
                //ajax para guardar datos 
                $.ajax({
                    url: urlApi+"Admin/saveAlumnoGrupo",
                    cache: false, 
                    method: "post",
                    data: {idpm: idpm, alumnos: alumnos},
                    success: function(e){
                        if(e === "listo"){
                            window.location.href = urlApi+"admin/studentsGroups/"+idpm;
                        }else{

                        }
                    },
                    error: function(e){
                        alert(e);
                    }
                }); 
            }
        });

        /*
         * 
         * Eliminar relacion. lñanza pop carlitos
         */
        
        $(".eliminaAlumnoMateria").click(function(e){
            var idalumno = $(this).attr("id");
            var idpm = $(this).attr("itemid");
            
            swal({   
                title: "¿Deseas eliminar este usuario?",   
                text: "",   
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
                        url: urlApi+"admin/eliminarAlumnoMateria",
                        cache: false, 
                        method: "post",
                        data: {idpm: idpm,alumno: idalumno},
                        success: function(e){
                            if(e === "listo"){
                                window.location.href = urlApi+"admin/studentsGroups/"+idpm;
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
            });
        })
        
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