<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Materias'
        );
        $this->load->view('head',$datos);
    ?>
<body>
        <div class="super_container">

        <!-- Header -->
        <?php $this->load->view('admin/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Materias</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                    <div class="">
                        <form action="<?= base_url() ?>admin/createSubject" method="post" class="">
                            <!--div>
                                <input type="text" class="course_input" placeholder="Course" >
                            </div-->
                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
                                <button class="course_button_add">                                
                                    <span>Crear nueva materia</span>   
                                </button>
                                <img class="" src="<?= base_url() ?>images/milestone_2.svg" alt="" width="50px" height="50px">                                
                            </div>
                            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                                <button class="course_button_add_res">
                                    <span>Crear nueva materia</span> 
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <?php 
                if($materias){                
            ?>
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                <div class="row">
                    <div class="col-lg 3 col-sm-3 offset-2"><div class="news_post_title_user">Materia</div></div>
                    <div class="col-lg 3 col-sm-2"><div class="news_post_title_user">Descripción</div></div>
                    <div class="col-lg 2 col-sm-2"><div class="news_post_title_user">Fecha creación</div></div>
                    <div class="col-lg 2 col-sm-2"><div class="news_post_title_user">Editar</div></div>
                    <div class="col-lg 2 col-sm-2"><div class="news_post_title_user">Borrar</div></div>
                </div>
            </div>

            <?php 
                foreach ($materias as $value) {
            ?>
            
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                <div class="row">
                    <!--div class="col-3 col-sm-3">
                        <div class="news_post_image">
                            
                            <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                        </div>
                    </div-->
                    <div class="col-lg 3 col-sm-3 offset-2">
                        <div class="news_post_date"><?= $value["materia"]; ?></div>
                    </div>
                    <div class="col-lg 3 col-sm-2">
                        <div class=""><?= $value["materia"]; ?></div>
                    </div>
                    <div class="col-lg 2 col-sm-2">
                        <div class="news_post_author"><?= $value["fecha_alta"]; ?></div>
                    </div>
                      <div class="col-lg 2 col-sm-2">
                        <div class="news_post_author"><a href="<?= base_url()?>admin/editSubject/<?= $value["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                     </div>                   
                    <div class="col-lg 2 col-sm-2">
                        <div class="news_post_author"><a href="#" id="<?= $value["id"];?>" class="confirmation" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                    </div>  
<!--<?=base_url();?>admin/deleteSubject/<?= $value["id"];?>-->
                    <!--div class="col-1 col-sm-1">
                        <a href=""><img src="<?= base_url() ?>" /></a>
                    </div>
                    <div class="col-1 col-sm-1">
                    </div-->
                </div>
            </div>
            
            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
            <div class="row">
                <!--div class="col-3">
                    <div class="news_post_image">
                        <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                    </div>
                </div-->
                <div class="col-9">
                    <div class="news_post_date_res">Materia: <?= $value["materia"]; ?></div>
                    <div class=""><?= $value["materia"]; ?> </div>
                    <div class="">Alta: <?= $value["fecha_alta"]; ?></div>
                    <br/>
                </div>
            </div>
            </div>
            <?php                     
                }            
                }else{
            ?>
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Sin materias</h2></div>                
                </div>
            <?php
                }
            ?> 

            <div class="row">
                <div class="offset-8 col-4 asignar">
                    <a href="<?= base_url() ?>admin/asignaturesTeacher" class="btn btn-danger"> Asignar materias a profesor </a>
                </div>
            </div>
            
            
        </div>
   
	<!-- Courses -->
	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- About -->
				<div class="col-lg-3 footer_col">
					<div class="footer_about">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-row align-items-end justify-content-start">
									<div class="logo_img"><img src="<?= base_url() ?>images/logo.png" alt=""></div>
									<div class="logo_text">learn</div>
								</div>
							</a>
						</div>
						<div class="footer_about_text">
							<p>Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar.</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>

				<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Quick menu</div>
						<ul class="footer_list">
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About us</a></li>
							<li><a href="#">Testimonials</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li><a href="#">Facts</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 footer_col">
					<div class="footer_links">
						<div class="footer_title">Useful Links</div>
						<ul class="footer_list">
							<li><a href="courses.html">Courses</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="#">Teachers</a></li>
							<li><a href="#">Links</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-3 footer_col">
					<div class="footer_contact">
						<div class="footer_title">Contact Us</div>
						<div class="footer_contact_info">
							<div class="footer_contact_item">
								<div class="footer_contact_title">Address:</div>
								<div class="footer_contact_line">1481 Creekside Lane Avila Beach, CA 93424</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Phone:</div>
								<div class="footer_contact_line">+53 345 7953 32453</div>
							</div>
							<div class="footer_contact_item">
								<div class="footer_contact_title">Email:</div>
								<div class="footer_contact_line">yourmail@gmail.com</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
</body>
</html>