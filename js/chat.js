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

        $("#btn-chat").prop("disabled", true);
        $("#btn-input").prop("disabled", true);

        /*
         * onsubmit form login
         */
        $("#mail").on("change",function(){
            inicioInput();
        });
        $("#mail").on("change",function(){
            inicioInput();            
        });
        
        $("#login_form").submit(function(e){
            e.preventDefault();
            console.log($("#mail").val());
            console.log($("#pass").val());
            $.ajax({
                url: urlApi+"Login/validate",
                cache: false, 
                method: "post",
                data: {correo: $("#mail").val(), pass: $("#pass").val()},
                success: function(e){
                    switch(e){
                        case "1":
                            window.location.href = urlApi+"admin";
                        break;
                        case "2":
                            window.location.href = urlApi+"teacher";
                        break;
                        case "3":
                            window.location.href = urlApi+"student";
                        break;
                        default:
                            $("#error").removeClass("d-none");
                            $("#error").addClass("d-block");
                            //alert(e);
                        break;
                    }
                },
                error: function(e){
                    alert(e);
                }
            });
        });

        /* 
	11. get excel file
	*/
        $("#excelRead").click(function(e){
            //alert("jajaja");
            $("#openDoc").modal('show');
        });
        
        /*
         * 
         * return messages
         */
        $(".chat_user a").click(function(e){
            e.preventDefault();
            //recuperas id del chat y quien soy 
            me = $(this).attr("id");
            idchatTemp = $(this).attr("href");
            //borras y activas gif
            $(".chat").empty();
            $(".gif").show();
            //activas input 
            $("#btn-chat").prop("disabled", false);
            $("#btn-input").prop("disabled", false);

            //recuperas mensjaes
            $.ajax({
                url: urlApi+"api/Chat/getMessages",
                cache: false, 
                method: "post",
                data: {idchat: idchatTemp},
                success: function(e){
                    //recuperamos mensajes json
                    var data = $.parseJSON(e);
                    $.each(data, function(k, v) {
                        lastmessage = v.timestamp;
                        if (v.envia === me){
                            $(".chat").append("<li class='right clearfix'><span class='chat-img pull-right'>"+
                                "<img src='http://placehold.it/50/FA6F57/fff&amp;text=ME' alt='User Avatar' class='rounded-circle'>"+
                                "</span>"+
                                "    <div class='chat-body clearfix'>"+
                                "        <div class=''>"+
                                "            <small class=' text-muted'><span class='glyphicon glyphicon-time'></span>"+v.timestamp+"</small>"+
                                "            <strong class='pull-right primary-font'> "+v.tempName+" </strong>"+
                                "        </div>"+
                                "        <p>"+
                                "            "+v.message+
                                "        </p>"+
                                "    </div>"+
                                "</li>");                                                       
                        }else{
                            $(".chat").append("<li class='left clearfix'>"+
                                "<span class='chat-img pull-left'>"+
                                "    <img src='http://placehold.it/50/55C1E7/fff&amp;text=U' alt='User Avatar' class='rounded-circle'>"+
                                "</span>"+
                                "<div class='chat-body clearfix'>"+
                                "    <div class=''>"+
                                "        <strong class='primary-font'> "+v.tempName+" </strong> <small class='pull-right text-muted'>"+
                                "            <span class='glyphicon glyphicon-time'></span>"+v.timestamp+"</small>"+
                                "    </div>"+
                                "    <p>"+
                                "        "+v.message+
                                "    </p>"+
                                "</div>"+
                            "</li>");                            
                        }
                        $(".chat").scrollTop($(".chat")[0].scrollHeight);
                        $(".gif").hide();

                    });
                },
                error: function(e){
                    alert(e);
                }
            });
        });

        $("#btn-input").keypress(function(event){	
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                var mensaje = $("#btn-input").val();
                //alert(mensaje);
                $("#btn-input").val("");

                sendMessage(mensaje);
            }
        });

        $("#btn-chat").click(function(e){
            var mensaje = $("#btn-input").val();
            //alert(mensaje);
            $("#btn-input").val("");
            sendMessage(mensaje);

        });    
        
        function sendMessage(mensaje){
            /*
             * recuperas mensaje
             * agregas mensaje en lista de mensajes...append
             * mandas mensaje a basedatos
             */
                
            //$(".chat").scrollTop($(".chat")[0].scrollHeight);
    
            $.ajax({
                url: urlApi+"api/Chat/saveMessage",
                cache: false, 
                method: "post",
                data: {message: mensaje, where: idchatTemp, envia: mee},
                success: function(e){
                     lastmessage = Number(e);
                     $(".chat").append("<li class='right clearfix'><span class='chat-img pull-right'>"+
                        "<img src='http://placehold.it/50/FA6F57/fff&amp;text=ME' alt='User Avatar' class='rounded-circle'>"+
                        "</span>"+
                        "    <div class='chat-body clearfix'>"+
                        "        <div class=''>"+
                        "            <small class=' text-muted'><span class='glyphicon glyphicon-time'></span>"+lastmessage+"</small>"+
                        "            <strong class='pull-right primary-font'> "+mee+" </strong>"+
                        "        </div>"+
                        "        <p>"+
                        "            "+mensaje+
                        "        </p>"+
                        "    </div>"+
                        "</li>");

                        $(".chat").scrollTop($(".chat")[0].scrollHeight);
                    //alert(e);
                    //recuperamos mensajes json  
                    //setInterval(getMessagesUpdate,500);//();
                    /*setTimeout(function() {
                        getMessagesUpdate()
                    }, 1000);*/
                    //setTimeout("getMessagesUpdate()",1000)
                },
                error: function(e){
                    alert(e);
                }
            }); 
        }

        setInterval(function(){
             getMessagesUpdate();;
        }, 2500);

        function getMessagesUpdate(){
            //$(".chat").empty();
            if(idchatTemp === ""){
                return;
            }
            //alert($(this).attr("href"));
            $.ajax({
                url: urlApi+"api/Chat/getLastMessages",
                cache: false, 
                method: "post",
                data: {idchat: idchatTemp,lasttime:lastmessage},
                success: function(e){
                    //recuperamos mensajes json
                    if (e !== "-1"){
                        var data = $.parseJSON(e);
                        $.each(data, function(k, v) {
                            lastmessage = v.timestamp;
                            if (v.envia === me){
                                $(".chat").append("<li class='right clearfix'><span class='chat-img pull-right'>"+
                                    "<img src='http://placehold.it/50/FA6F57/fff&amp;text=ME' alt='User Avatar' class='rounded-circle'>"+
                                    "</span>"+
                                    "    <div class='chat-body clearfix'>"+
                                    "        <div class=''>"+
                                    "            <small class=' text-muted'><span class='glyphicon glyphicon-time'></span>"+v.timestamp+"</small>"+
                                    "            <strong class='pull-right primary-font'> "+v.tempName+" </strong>"+
                                    "        </div>"+
                                    "        <p>"+
                                    "            "+v.message+
                                    "        </p>"+
                                    "    </div>"+
                                    "</li>");                                                       
                            }else{
                                $(".chat").append("<li class='left clearfix'>"+
                                    "<span class='chat-img pull-left'>"+
                                    "    <img src='http://placehold.it/50/55C1E7/fff&amp;text=U' alt='User Avatar' class='rounded-circle'>"+
                                    "</span>"+
                                    "<div class='chat-body clearfix'>"+
                                    "    <div class=''>"+
                                    "        <strong class='primary-font'> "+v.tempName+" </strong> <small class='pull-right text-muted'>"+
                                    "            <span class='glyphicon glyphicon-time'></span>"+v.timestamp+"</small>"+
                                    "    </div>"+
                                    "    <p>"+
                                    "        "+v.message+
                                    "    </p>"+
                                    "</div>"+
                                "</li>");                            
                            }
                            $(".chat").scrollTop($(".chat")[0].scrollHeight);
                        });
                    }
                },
                error: function(e){
                    alert(e);
                }
            });
        }
        
    	function inicioInput()
	{
            $("#error").removeClass("d-block");
            $("#error").addClass("d-none");            
        }
        
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