<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Oferta Educativa - Pedagogía'
        );
        $this->load->view('head',$datos);
    ?>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>styles/news.css">
<link rel="stylesheet" type="text/css" href="<?= base_url()?>styles/news_responsive.css">
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
					<div class="home_slider_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.10), rgba(10, 10, 10, 0.73)), url(<?= base_url();?>images/banners/banner2.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><!--img src="images/logo_instituto.jpg" alt=""--></div>
										<div class="home_text">
											<div class="home_title">Oferta Educativa - Pedagogía</div>
										</div>
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

<div class="news">
        <div class="container">
            <div class="row">

                <!-- News Posts -->

                <div class="col-lg-12">
                    <div class="news_posts">
                        
                        <!-- News Post -->
                        <div class="news_post">
                            <div class="news_post_body">
                                <div class="news_post_title"><a>Pedagogía</a></div>

                                <div class="news_post_text">
                                    <p> El egresado de la licenciatura en Pedagogía será un profesional con un alto nivel de conocimientos teórico -metodológicos sobre el hecho educativo, capaz de aplicar la pedagogía como la ciencia que reflexiona, investiga y propone soluciones a problemas vinculados con el fenómeno educativo; analizara los procesos sociales, económicos, políticos y culturales que están involucrados en todos los niveles de educación; diseñara proyectos educativos para la generación de nuevos aportes al campo pedagógico.  </p>
                                </div>
                                <div class="news_post_text">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="course_image"><img height="350" width="400" src="<?= base_url(); ?>images/course_5.jpg" alt=""></div>
                                    </div>
                                    
                                </div>                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
</div>
  
<?php $this->load->view('contacto')?>
	<!-- Join -->

<?php $this->load->view('footer')?>


<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?> 
</body>
</html>