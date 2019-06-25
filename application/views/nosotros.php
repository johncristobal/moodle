<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Nosotros'
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
					<div class="home_slider_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.10), rgba(10, 10, 10, 0.73)), url(images/banners/banner4.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><!--img src="images/logo_instituto.jpg" alt=""--></div>
										<div class="home_text">
											<div class="home_title">Nosotros</div>
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

	<div class="featured">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Home Slider Nav -->
					<div class="home_slider_nav_container d-flex flex-row align-items-start justify-content-between">
						<div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</div>
					<div class="featured_container">
						<!--div class="row">
							<div class="col-lg-6 featured_col">
								<div class="featured_content">
									<div class="featured_header d-flex flex-row align-items-center justify-content-start">
										<div class="featured_tag"><a href="#">Featured</a></div>
										<div class="featured_price ml-auto">Price: <span>$35</span></div>
									</div>
									<div class="featured_title"><h3><a href="courses.html">Online Literature Course</a></h3></div>
									<div class="featured_text">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Donec vehicula efficitur nibh, in pretium nulla interdum non.</div>
									<div class="featured_footer d-flex align-items-center justify-content-start">
										<div class="featured_author_image"><img src="images/featured_author.jpg" alt=""></div>
										<div class="featured_author_name">By <a href="#">James S. Morrison</a></div>
										<div class="featured_sales ml-auto"><span>352</span> Sales</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 featured_col">
								<!-- Background image artist https://unsplash.com/@jtylernix -->
								<div class="featured_background" style="background-image:url(images/featured.jpg)"></div>
							</div>
						</div-->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Courses -->

	<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_subtitle">Somos una Institución Educativa con 32 años de experiencia, Actualmente contamos Con 17 Planteles en la Ciudad de México y el área Metropolitana. Nuestro éxito se basa en la flexibilidad que ofrecemos a nuestros alumnos para concluir sus estudios rápidamente.</div>
				</div>
			</div>
			<!--
			<div class="row">
				<div class="col">
					<div class="course_search">
						<form action="#" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
							<div><input type="text" class="course_input" placeholder="Course" required="required"></div>
							<div><input type="text" class="course_input" placeholder="Level" required="required"></div>
							<button class="course_button"><span>search course</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
						</form>
					</div>
				</div>
			</div> -->
			
		</div>
	</div>


	<!-- Sections -->
	<div class="grouped_sections">
		<div class="container">
			<div class="row">
                            <!--div class="col text-center">				
                                <div class="section_title text-center"><h2>Acerca de nosotros</h2></div>
                                <br>
                            </div-->			                            
                            <div class="row borderWhite">
                                <div class="borderWhite redSS col-12 col-sm-3 col-md-3 text-center">
                                    <div class="milestone_icon text-center"><img src="images/milestone_1.svg" alt=""></div>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <div class="title"><strong>¿Quiénes somos?</strong></div>
                                    <br>
                                    <p>Somos una Institución Educativa con 32 años de experiencia, Actualmente contamos Con 17 Planteles en la Ciudad de México y el área Metropolitana. Nuestro éxito se basa en la flexibilidad que ofrecemos a nuestros alumnos para concluir sus estudios rápidamente.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-9 col-md-9 text-right">
                                    <div class="title"><strong>Misión</strong></div>
                                    <br>
                                    <p>Nuestro innovador sistema académico, amplia el acceso a una educación de calidad global para formar personas productivas que agreguen un valor social.</p>                                                

                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="milestone_icon text-right"><img src="images/milestone_2.svg" alt=""></div>
                                </div>
                            </div>
                            <div class="row borderWhite">
                                <div class="borderWhite redSS col-12 col-sm-3 col-md-3 text-center">
                                    <div class="milestone_icon text-center"><img src="images/milestone_3.svg" alt=""></div>
                                </div>
                                <div class="col-12 col-sm-9">
                                    <div class="title"><strong>Visión</strong></div>
                                    <br>
                                    <p>
                                        Impartir un servicio educativo de calidad fomentando en nuestros alumnos una formación de valores y excelencia académica, que les permita ingresar a un mundo de competencia y desarrollo integral.
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-9 col-md-9 text-right">
                                    <div class="title"><strong>¿Qué esperar de nosotros?</strong></div>
                                    <br>
                                    <p>
                                        Crear, a través de una educación de alta calidad, una sociedad conformada por individuos conscientes de su propia identidad y de su papel en la sociedad del siglo XXI, capaces de proponer e implementar estrategias de cambio para su beneficio.
                                    </p> 

                                </div>
                                <div class="col-12 col-sm-3 col-md-3">
                                    <div class="milestone_icon text-right"><img src="images/milestone_4.svg" alt=""></div>
                                </div>
                            </div>
                            <!--div class="row borderWhite">
                                <div class="borderWhite whiteSS col-12 col-sm-12 col-md-6 text-center">
                                    <div class="milestone_icon text-center"><img src="images/milestone_3.svg" alt=""></div>
                                    <br>
                                    <br><div class="title">Visión</div>
                                    <br>
                                    <p>Impartir un servicio educativo de calidad fomentando en nuestros alumnos una formación de valores y excelencia académica, que les permita ingresar a un mundo de competencia y desarrollo integral.</p>
                                </div>
                                <div class="borderWhite redSS col-12 col-sm-12 col-md-6 text-center">
                                    <div class="milestone_icon text-center"><img src="images/milestone_4.svg" alt=""></div>
                                    <br>
                                    <br><div class="title">¿Qué esperar de nosotros?</div>
                                    <br>
                                    <p>Crear, a través de una educación de alta calidad, una sociedad conformada por individuos conscientes de su propia identidad y de su papel en la sociedad del siglo XXI, capaces de proponer e implementar estrategias de cambio para su beneficio.</p>
                                </div>
                            </div-->

                                <!--div class="col-lg-4 grouped_col">
					<div class="accordions">

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center active"><div>¿Quiénes somos?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Somos una Institución Educativa con 32 años de experiencia, Actualmente contamos Con 17 Planteles en la Ciudad de México y el área Metropolitana. Nuestro éxito se basa en la flexibilidad que ofrecemos a nuestros alumnos para concluir sus estudios rápidamente.</p>
								</div>
							</div>
						</div>

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>¿Qué esperar de nosotros?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Nuestro innovador sistema académico, amplia el acceso a una educación de calidad global para formar personas productivas que agreguen un valor social.</p>
								</div>
							</div>
						</div>

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Mauris vehicula nisi congue?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam.</p>
								</div>
							</div>
						</div>

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Nisi congue, blandit purus sed?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam.</p>
								</div>
							</div>
						</div>

					</div>

				</div-->

				
			</div>
		</div>
	</div>
        
                <?php $this->load->view('contacto')?>
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