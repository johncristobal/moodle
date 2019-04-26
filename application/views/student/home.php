<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Alumno'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="container-fluid">            
            <div class="row">
                <div class="col-12 col-sm-3 nopadding">
                    <div class="backGray">                        
                    <div class="row">
                        <div class="col-6">
                        <a href="#">
                            <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                <div class="logo_img"><img src="images/logo.png" alt=""></div>
                                <div class="logo_text">learn</div>
                            </div>
                        </a>  
                        </div>
                        <div class="col-6 text-right">
                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>                            
                        </div>
                        
                    </div>
                        
                    <!-- Header -->
                    <div class="d-none d-sm-block">
                    <div class="panelMaterial">
                        <?php
                            if($materias){
                                foreach ($materias as $value) {
                                    
                        ?>
                        <div class="row mt-2">
                           <div class="col-6">
                           <div class="p">                            
                               <div class="news_post_comments">
                                   <a href=""><?= $value["materia"] ?></a>
                               </div>                                                                                                                               
                           </div>
                           </div> 
                           <div class="col-6">
                               <div>
                                   <span class="small"><?= $value["nombre"] ?></span>
                               </div>
                           </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="footerPanel">
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student">
                            <span class="fa fa-home"></span>                            
                            <span class="smallCustom">Home</span>
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>teacher/messages">
                            <span class="fa fa-comments"></span>                            
                            <span class="smallCustom">Chat</span>
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="#">
                            <span class="fa fa-phone"></span>                            
                            <span class="smallCustom">Contacto</span>
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>admin/cerrar">
                            <span class="fa fa-power-off"></span>                            
                            <span class="smallCustom">Cerrar sesión</span>
                            </a>
                        </div>
                    </div>
                    </div>                   
                </div>
                </div>
                <div class="col-12 col-sm-9">
                    <!-- login module -->
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="panelMaterial">
                                
                                <div class="section_title text-center"><h2>Hola Estudiante</h2></div>                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

	<!-- Home -->	
	</div>
	
	<!-- menu respnsibe -->
        <div class="menu d-flex flex-column justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<!--div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div-->
		<div class="panelMaterial">
                    <div class="row">
                        <div class="col-6">
                        <div class="p">                            
                            <div class="news_post_comments">
                                <a href="">Materia 1</a>
                            </div>                                                                                                                               
                        </div>
                        </div> 
                        <div class="col-6">
                            <div>
                                <span class="small">Emilio Pacheco</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                        <div class="p">
                            <div class="news_post_comments">
                                <a href="">Materia 1</a>
                            </div>
                        </div>
                        </div>             
                        <div class="col-6">
                            <div>
                                <span class="small">Emilio Pacheco</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                        <div class="p">
                            <div class="news_post_comments">
                                <a href="">Materia 1</a>
                            </div>                                                                                                                               
                        </div>
                        </div>             
                        <div class="col-6">
                            <div>
                                <span class="small">Emilio Pacheco</span>
                            </div>
                        </div>
                    </div>                        
                    </div>
                    <div class="footerPanel d-flex flex-column align-items-end text-right">
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student">                                                       
                            <span class="smallCustom">Home</span>
                            <span class="fa fa-home"></span> 
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>teacher/messages">
                            <span class="smallCustom">Chat</span>
                            <span class="fa fa-comments"></span>                            
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="#">
                            <span class="smallCustom">Contacto</span>
                            <span class="fa fa-phone"></span>                            
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>admin/cerrar">
                            <span class="smallCustom">Cerrar sesión</span>
                            <span class="fa fa-power-off"></span>                            
                            </a>
                        </div>
                    </div>
		<!--div class="menu_extra">
			<div class="menu_phone"><span class="menu_title">phone:</span>(009) 35475 6688933 32</div>
			<div class="menu_social">
				<span class="menu_title">follow us</span>
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div-->
	</div>
        
        <!--footer-->
	<footer class="footer">
		<div class="container">
			<div class="row">

				<!-- About -->
				<div class="col-lg-3 footer_col">
					<div class="footer_about">
						<div class="logo_container">
							<a href="#">
								<div class="logo_content d-flex flex-row align-items-end justify-content-start">
									<div class="logo_img"><img src="images/logo.png" alt=""></div>
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