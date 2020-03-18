<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Oferta Educativa - Contaduría'
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
											<div class="home_title">Oferta Educativa - Contaduría</div>
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
                                <div class="news_post_title"><a>Contaduría</a></div>

                                <div class="news_post_text">
                                    <p>El objetivo de la licenciatura es contaduría tiene como principal objetivo la formación de profesionales que proyecten y hagan uso adecuado de la información financiera en base a las normas principios y técnicas contables y en existencia en el Ámbito tanto nacional como en el internacional. El interesado debería presentar ciertas características: </p>
                                </div>
                                <div class="news_post_text">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <ul>
                                        <p> * Debería ser observador, planificador, sistemático y proactivo.  </p>
                                        <p> * Habilidad de comunicación tanto oral como escrita. </p>
                                        <p> * Habilidades numéricas. </p>
                                        <p> * Capacidad de liderazgo Buen manejo de relaciones interpersonales.</p>         
                                        <p> * Excelente vocación de servicio.  </p>
                                    </ul>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="course_image"><img height="350" width="400" src="<?= base_url(); ?>images/course_3.jpg" alt=""></div>
                                    </div>
                                    
                                </div>
                                </div>
                                   <div class="news_post_text">
                                    <p>El egresado de esta carrera obtendrá un perfil adecuado para poder ocupar la dirección general de las empresas, tanto micro como medianas empresas. Obtendrá una sólida preparación fiscal para poder hacer un manejo adecuado de los diferentes tipos de recursos. Será el profesionista ideal para ser candidato a puesto como contralor, gerente financiero, auditor y socio o dueño de su propia empresa.</p>
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