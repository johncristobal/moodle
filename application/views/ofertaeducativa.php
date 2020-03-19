<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Oferta Educativa'
        );
        $this->load->view('head',$datos);
    ?>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>styles/about.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>styles/about_responsive.css">
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
					<div class="home_slider_background" style="background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0.10), rgba(10, 10, 10, 0.73)), url(images/banners/banner2.jpeg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><!--img src="images/logo_instituto.jpg" alt=""--></div>
										<div class="home_text">
											<div class="home_title">Oferta Educativa</div>
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
        
<!-- Courses -->
<div class="teachers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="teachers_title text-center">Conoce nuestras licenciaturas</div>
                </div>
            </div>
            <div class="row teachers_row">

                 <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_1.jpg"></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/bachillerato">Bachillerato 18 meses</a></div>
                            <div class="teacher_subtitle">Bachillerato</div>
                        </div>
                    </div>
                </div>               
                <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_2.jpg" ></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/derecho">Derecho</a></div>
                            <div class="teacher_subtitle">Licenciatura</div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_3.jpg"></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/contaduria">Contaduría</a></div>
                            <div class="teacher_subtitle">Licenciatura</div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_4.jpg" ></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/psicologia">Psicología</a></div>
                            <div class="teacher_subtitle">Licenciatura</div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_5.jpg" ></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/pedagogia">Pedagogía</a></div>
                            <div class="teacher_subtitle">Licenciatura</div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_6.jpg" alt="https://unsplash.com/@christinhumephoto"></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/admempresas">Administración de empresas</a></div>
                            <div class="teacher_subtitle">Licenciatura</div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div class="col-lg-4 col-md-6">
                    <div class="teacher">
                        <div class="teacher_image"><img src="<?=base_url(); ?>images/course_9.jpg"></div>
                        <div class="teacher_body text-center">
                            <div class="teacher_title"><a href="<?= base_url()?>ofertaeducativa/computacion">Plan de computación</a></div>
                            <div class="teacher_subtitle">Profesional</div>
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