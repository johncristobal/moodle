<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Oferta Educativa - Psicología'
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
											<div class="home_title">Oferta Educativa - Psicología</div>
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
                                <div class="news_post_title"><a>Psicología</a></div>

                                <div class="news_post_text">
                                    <p>Formar un profesional de la psicóloga capaz de evaluar, diagnosticar y modificar las conductas desadaptadas que ocurran en el entorno social del sujeto; para contribuir al mejoramiento de la salud mental; capaces de utilizar eficazmente las estrategias de intervención, evaluación y tratamiento en los ámbitos individual, familiar y grupal para la resolución de los problemas relacionados con la salud mental de los individuos, entendida esta como el desarrollo de las relaciones sociales que se establecen entre las distintas personas, grupos, comunidades, instituciones y sociedades, con una perspectiva ética de comprensión de la conducta humana desde el contexto, histórico, biológico, educativo, organizacional, terapéutico, social, ideológico y cultural.  </p>
                                </div>
                                <div class="news_post_text">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="course_image"><img height="350" width="400" src="<?= base_url(); ?>images/course_4.jpg" alt=""></div>
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