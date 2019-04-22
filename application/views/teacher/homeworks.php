<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Tareas profesor'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('teacher/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->
        
        <div class="container login">
            <div class="row">
                <div class="col-12">
                    <div class="section_title text-center"><h2>Mis Materias</h2></div>
                    <div class="accordions">
                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center active"><div>Fisica</div></div>                           
                                <div class="accordion_panel" style="max-height: 164px;">
                                    <div class="row">
                                        <div class="col offset-10">
                                            <button class="btn btn-danger nuevatarea">Nueva tarea</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 offset-1">
                                        <div class="p">
                                            <div class="news_post_comments">
                                                <a href="#">Tarea 1 </a>
                                            </div>                                        
                                            <div class="news_post_comments"><a href="#">Tarea 2 </a></div>                                        
                                            <div class="news_post_comments"><a href="#">Tarea 3 </a></div>                                               
                                        </div>
                                        </div>
                                        <div class="col-2 p">
                                            Entregados: <strong>5</strong>
                                        </div>
                                        <div class="col-3 p">
                                            Fecha de alta: <strong>13 - abril - 2019</strong>
                                        </div>
                                        <div class="col-3 p">
                                            Fecha de fin: <strong>19 - abril - 2019</strong>
                                        </div>
                                    </div>
                                </div>                            
                        </div>

                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center active"><div>Fisica</div></div>                           
                                <div class="accordion_panel" style="max-height: 164px;">
                                    <div class="row">
                                        <div class="col offset-10">
                                            <button class="btn btn-danger nuevatarea">Nueva tarea</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 offset-1">
                                        <div class="p">
                                            <div class="news_post_comments">
                                                <a href="#">Tarea 1 </a>
                                            </div>                                        
                                            <div class="news_post_comments"><a href="#">Tarea 2 </a></div>                                        
                                            <div class="news_post_comments"><a href="#">Tarea 3 </a></div>                                               
                                        </div>
                                        </div>
                                        <div class="col-2 p">
                                            Entregados: <strong>5</strong>
                                        </div>
                                        <div class="col-3 p">
                                            Fecha de alta: <strong>13 - abril - 2019</strong>
                                        </div>
                                        <div class="col-3 p">
                                            Fecha de fin: <strong>19 - abril - 2019</strong>
                                        </div>
                                    </div>
                                </div>                            
                        </div>
                        
                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center active"><div>Fisica</div></div>                           
                                <div class="accordion_panel" style="max-height: 164px;">
                                    <div class="row">
                                        <div class="col offset-10">
                                            <button class="btn btn-danger nuevatarea">Nueva tarea</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 offset-1">
                                        <div class="p">
                                            <div class="news_post_comments">
                                                <a href="#">Tarea 1 </a>
                                            </div>                                        
                                            <div class="news_post_comments"><a href="#">Tarea 2 </a></div>                                        
                                            <div class="news_post_comments"><a href="#">Tarea 3 </a></div>                                               
                                        </div>
                                        </div>
                                        <div class="col-2 p">
                                            Entregados: <strong>5</strong>
                                        </div>
                                        <div class="col-3 p">
                                            Fecha de alta: <strong>13 - abril - 2019</strong>
                                        </div>
                                        <div class="col-3 p">
                                            Fecha de fin: <strong>19 - abril - 2019</strong>
                                        </div>
                                    </div>
                                </div>                            
                        </div>
                </div>
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