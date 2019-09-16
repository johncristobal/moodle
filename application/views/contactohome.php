<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Contacto'
        );
        $this->load->view('head',$datos);
    ?>
<body>

<div class="super_container">

	<!-- Header -->
        <?php $this->load->view('header') ?>	
	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item">
					<!-- Background image artist https://unsplash.com/@benwhitephotography -->
					<div class="home_slider_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.10), rgba(10, 10, 10, 0.73)), url(images/banners/banner5.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><!--img src="images/logo_instituto.jpg" alt=""--></div>
										<div class="home_text">
											<div class="home_title">Contacto</div>
											<!--div class="home_subtitle">
                                                                                            Somos una Institución Educativa con 32 años de experiencia, 
                                                                                            Actualmente contamos Con 17 Planteles en la Ciudad de México y el área Metropolitana. 
                                                                                            Nuestro éxito se basa en la flexibilidad que ofrecemos a nuestros alumnos para concluir sus estudios rápidamente.
                                                                                            
                                                                                        </div-->
										</div>
										<!--div class="home_buttons">
											<div class="button home_button"><a href="#">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="#">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
										</div-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
			</div>
		</div>
	</div>

	<!-- Featured Course -->
	</div>

	<!-- Courses -->

<div class="milestones">
                
		<!-- Background image artis https://unsplash.com/@thepootphotographer data-image-src="images/banners/bannercorreo.jpeg"-->
		<div class="parallax_background parallax-window" data-parallax="scroll"  data-speed="0.8"></div>
		<div class="container">
			<div class="row milestones_container">
                            
                                <div class="col-12 text-center">
                                    <br>
                                    <h2 class="section-subheading text-center">
                                Déjanos un mensaje
                              </h2>
                                    <br>
                                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" id="name" type="text" placeholder="Nombre" required="required" data-validation-required-message="Ingresa tu nombre.">
                                      <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" id="email" type="email" placeholder="Correo" required="required" data-validation-required-message="Ingresa tu contraseña.">
                                      <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                      <input class="form-control" id="phone" type="tel" placeholder="Teléfono">
                                      <p class="help-block text-danger"></p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <textarea class="form-control" id="message" placeholder="Mensaje" required="required" data-validation-required-message="Ingresa tu mensaje."></textarea>
                                      <p class="help-block text-danger"></p>
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                  <div class="col-lg-12 text-center">
                                      
                                      <div id="success"><br></div>
                                    <button id="sendMessageButton" class="btn _button msg-warning btn-xl text-uppercase" type="submit">Enviar</button>
                                  </div>
                                </div>
                              </form>
                                </div>
                            
				<!-- Milestone -->
				<!--div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="images/milestone_1.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="1548">0</div>
						<div class="milestone_text">Online Courses</div>
					</div>
				</div>

				<!-- Milestone >
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="images/milestone_2.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="7286">0</div>
						<div class="milestone_text">Students</div>
					</div>
				</div>

				<!-- Milestone >
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="images/milestone_3.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="257">0</div>
						<div class="milestone_text">Teachers</div>
					</div>
				</div>

				<!-- Milestone >
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="images/milestone_4.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="39">0</div>
						<div class="milestone_text">Countries</div>
					</div>
				</div-->

			</div>
		</div>
	</div>
	<!-- Join -->
<!--
	<div class="join">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center"><h2>Join Our Platform Today</h2></div>
					<div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
				</div>
			</div>
		</div>
		<div class="button join_button"><a href="#">register now<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
	</div>
-->
<?php $this->load->view('footer')?>


<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?> 
</body>
</html>