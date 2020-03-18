<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Oferta Educativa - Derecho'
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
											<div class="home_title">Oferta Educativa - Derecho</div>
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
                                <div class="news_post_title"><a>Derecho</a></div>

                                <div class="news_post_text">
                                    <p>La carrera de Derecho tiene como objetivo formar profesionales en la ciencia jurídica con énfasis en el área empresarial. El abogado es un profesional capacitado para ejercer competitivamente la profesión con un alto sentido ético que le permite desempeñarse de manera eficiente y confiable en: </p>
                                </div>
                                <div class="news_post_text">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <ul>
                                        <p> * El ejercicio libre de la abogacía. </p>
                                        <p> * Asesoramiento legal. </p>
                                        <p> * Administración de justicia. </p>
                                        <p> * Elaboración y análisis de leyes. </p>         
                                        <p> * Actividades políticas. </p>
                                        <p> * Actividades formativas y educativas. </p>
                                        <p> * Participaciones sociales. </p>
                                        <p> * Funciones diplomáticas o consulares, entre otras. </p>

                                    </ul>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="course_image"><img height="350" width="400" src="<?= base_url(); ?>images/course_2.jpg" alt=""></div>
                                    </div>
                                    
                                </div>
                                   <div class="news_post_text">
                                    <p>Esto lo llevara a ocupar funciones en rubros importantes como el desarrollo socio-económico y político del país.</p>
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