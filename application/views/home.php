<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Modle'
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
					<div class="home_slider_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.10), rgba(10, 10, 10, 0.73)),url(images/banners/banner1.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_text">
											<div class="home_title">Instituto de Educación Avanzada</div>
                                                                                        <div class="home_subtitle">Para administar tareas entre Directores, Maestros y Alumnos.</div>
										</div>
										<div class="home_buttons">
											<div class="button home_button"><a href="<?= base_url() ?>nosotros">Nosotros<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="<?= base_url() ?>contacto">Contacto<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

                                 <?php 
                                    if($banners){                
                                        foreach ($banners as $value) {
                                ?>
                                    <div class="owl-item">
					<!-- Background image artist https://unsplash.com/@benwhitephotography -->
					<div class="home_slider_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.10), rgba(10, 10, 10, 0.73)), url(banners/<?= $value['imagen']?>)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content ">
										<!--div class="home_logo"><img src="images/home_logo.png" alt=""></div-->
										<div class="home_text">
											<div class="home_title"><?= $value["texto"] ?></div>
											<!--div class="home_subtitle">Para administar tareas entre Directores, Maestros y Alumnos.</div-->
										</div>
										<div class="home_buttons">
											<!--div class="button home_button"><a href="#">Inicia sesión<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div-->
											<!--div class="button home_button"><a href="#">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                                    </div>
                                <?php
                                        }
                                    }
                                ?>
                                
				<!-- Slider Item -->
				

				<!-- Slider Item -->
				<!--div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/banners/banner1.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><img src="images/home_logo.png" alt=""></div>
										<div class="home_text">
											<div class="home_title">Complete Online Courses</div>
											<div class="home_subtitle">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Praesent vel nisl fermentum, gravida augue ut, fermentum ipsum.</div>
										</div>
										<div class="home_buttons">
											<div class="button home_button"><a href="#">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="#">see all courses<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div-->

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
					<div class="section_title text-center"><h2>¿QUIÉNES SOMOS?</h2></div>
					<div class="section_subtitle">Somos una Institución Educativa con 32 años de experiencia, Actualmente contamos Con 17 Planteles en la Ciudad de México y el área Metropolitana. Nuestro éxito se basa en la flexibilidad que ofrecemos a nuestros alumnos para concluir sus estudios rápidamente.</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<!-- Courses Slider -->
					<div class="courses_slider_container">
						<div class="owl-carousel owl-theme courses_slider">
							
							<!-- Slider Item -->
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_1.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/bachillerato">Bachillerato</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/bachillerato">Bachillerato a 18 meses</a></h3></div>
										<div class="course_text">
                                        ·         Aplicación de Examen en el Plantel<br>
										·         Certificación con validez oficial (bachillerato General)<br>
										·         Desde 2 horas diarias o en sabatino<br>
										·         Sin restricción de edad<br>
										·         Sin examen de admisión<br>
										·         Colegiaturas accesibles<br>
										·         Clases de Ingles<br>
										·         Grupos reducidos<br>
									</div>
									</div>
								</div>
							</div>

							<!-- Slider Item -->
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_2.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/derecho">Licenciatura</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/derecho">Derecho</a></h3></div>
										<div class="course_text">La carrera de Derecho tiene como objetivo formar profesionales en la ciencia jurídica con énfasis en el área empresarial. <br><br>El abogado es un profesional capacitado para ejercer competitivamente la profesión con un alto sentido ético que le permite desempeñarse de manera eficiente y confiable.</div>
									</div>
								</div>
							</div>
							<!-- Slider Item -->
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_3.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/contaduria">Licenciatura</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/contaduria">Contaduría</a></h3></div>
                                                                                <div class="course_text">El objetivo de la licenciatura es contaduría tiene como principal objetivo la formación de profesionales que proyecten y hagan uso adecuado de la información financiera.<br><br>Esto con base a las normas principios y técnicas contables y en existencia en el ámbito tanto nacional como en el internacional.<br></div>
									</div>
								</div>
							</div>
                                                        
                                                        <div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_4.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/psicologia">Licenciatura</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/psicologia">Psicología</a></h3></div>
                                        <div class="course_text">
                                            Formar un profesional de la psicóloga capaz de evaluar, diagnosticar y modificar las conductas desadaptadas que ocurran en el entorno social del sujeto; para contribuir al mejoramiento de la salud mental capaces de utilizar eficazmente las estrategias de intervención, evaluación y tratamiento en los ámbitos individual, familiar y grupal...<br>
                                        </div>
									</div>
								</div>
							</div>
                                                        
                               <div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_5.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/pedagogia">Licenciatura</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/pedagogia">Pedagodía</a></h3></div>
		                                <div class="course_text">
		                                    El egresado de la licenciatura en Pedagogía será un profesional con un alto nivel de conocimientos teórico -metodológicos sobre el hecho educativo, capaz de aplicar la pedagogía como la ciencia que reflexiona, investiga y propone soluciones a problemas vinculados con el fenómeno educativo...<br>
		                                </div>
									</div>
								</div>
							</div>

                             <div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_6.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/admempresas">Licenciatura</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/admempresas">Administración de empresas</a></h3></div>
                                        <div class="course_text">
                                            La licenciatura en Administración de Empresas se encarga de formar a un profesional altamente calificado que contara con las bases necesarias tanto teóricas como metodológicas y técnicas para planear, organizar, dirigir y controlar las actividades de una empresa, apoyado en una sólida ética profesional.<br>
                                        </div>
									</div>
								</div>
							</div>
                            <div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="images/course_9.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="<?= base_url()?>ofertaeducativa/computacion">Profesional</a></div>
										</div>
										<div class="course_title"><h3><a href="<?= base_url()?>ofertaeducativa/computacion">Plan de computación</a></h3></div>
                                        <div class="course_text">
											<ul>
												<li> ·  Administrativo</li>
												<li> ·  Diseño gráfico</li>
												<li> ·  Programación</li>
											</ul>	
                                            <br>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Courses Slider Nav -->
						<!--div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div-->

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Sections -->

	<div class="grouped_sections">
		<div class="container">
			<!--div class="row">
                            <div class="col text-center">				
                                <div class="section_title text-center"><h2>Acerca de nosotros</h2></div>
                                <br>
                            </div>			                            
                            <div class="row borderWhite">
                                <div class="borderWhite redSS col-12 col-sm-12 col-md-6 text-center">
                                    <div class="milestone_icon text-center"><img src="images/milestone_1.svg" alt=""></div>
                                    <br><br>
                                    <div class="title">¿Quiénes somos?</div>
                                    <br>
                                    <p>Somos una Institución Educativa con 32 años de experiencia, Actualmente contamos Con 17 Planteles en la Ciudad de México y el área Metropolitana. Nuestro éxito se basa en la flexibilidad que ofrecemos a nuestros alumnos para concluir sus estudios rápidamente.</p>
                                </div>
                                <div class="borderWhite whiteSS col-12 col-sm-12 col-md-6 text-center">
                                    <div class="milestone_icon text-center"><img src="images/milestone_2.svg" alt=""></div>
                                    <br>
                                    <br><div class="title">Misión</div>
                                    <br>
                                    <p>Nuestro innovador sistema académico, amplia el acceso a una educación de calidad global para formar personas productivas que agreguen un valor social.</p>                                                
                                </div>
                            </div>
                            <div class="row borderWhite">
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
                            </div>
			</div-->
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

<?php $this->load->view('scripts'); ?> 
<script>
    var urlApi = "<?php echo base_url() ?>";

    <?php if($this->session->flashdata('correo')){ ?>
    swal("Muchas gracias por su contacto", "<?php echo $this->session->flashdata('correo'); ?>", "success");
    <?php } ?>    
</script>

</body>
</html>