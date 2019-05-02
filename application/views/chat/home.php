<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Chat'
        );
        $this->load->view('head',$datos);
    ?>
<body>
<!--
from: https://bootsnipp.com/snippets/9njj
check: 
https://www.anexia-it.com/blog/en/setting-up-your-own-online-chat-module-with-codeigniter/
https://github.com/llbbl/codeigniter-chat/blob/master/create.sql
http://qnimate.com/database-design-for-storing-chat-messages/
-->
<div class="super_container chatBody">

	<!-- Header -->
	<?php $this->load->view('chat/header'); ?>
	<!-- Home -->
	<!-- Courses -->
	<div class="coursesChat">
		<div class="container">
			<div class="row">
                            <div class="col-sm-3 offset-sm-1">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Buscar">
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="icon fa fa-search"></i>
                                                </button> 
                                            </div>
                                          </div>                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col chat_user">
                                        <?php
                                            foreach ($chats as $value) {
                                        ?>
                                        <a href="<?= $value["userchat"] ?>" id="<?= $me ?>">
                                            <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="rounded-circle">
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="col user">
                                                    <strong class="primary-font"><?= $value["user"] ?></strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span><?= $value["materia"] ?></small>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                        <!--li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="rounded-circle">
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="col user">
                                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="rounded-circle">
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="col user">
                                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                                </div>                                                
                                            </div>
                                        </li-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 offset-sm-1">
                                <div class="row">      
                                    <div class="col gif" style="display: none;">
                                        <div class="text-center">
                                            <img class="loading" src="<?php echo base_url()?>images/preload.gif"/>
                                        </div>                                        
                                    </div>
                                    <div class="col chat">
                                        
                                        <!--li class="right clearfix"><span class="chat-img pull-right">
                                            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="rounded-circle">
                                        </span>
                                            <div class="chat-body clearfix">
                                                <div class="">
                                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                                    <strong class="pull-right primary-font"> yo </strong>
                                                </div>
                                                <p>
                                                    mensaje
                                                </p>
                                            </div>
                                        </li>
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="rounded-circle">
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="">
                                                    <strong class="primary-font"> de </strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                                </div>
                                                <p>
                                                    mensaje
                                                </p>
                                            </div>
                                        </li-->                                        
                                        <!--li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="rounded-circle">
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="">
                                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                    dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="right clearfix"><span class="chat-img pull-right">
                                            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="rounded-circle">
                                        </span>
                                            <div class="chat-body clearfix">
                                                <div class="">
                                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                                    dolor, quis ullamcorper ligula sodales.
                                                </p>
                                            </div>
                                        </li-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col footer_chat">
                                        <div class="panel-footer">
                                        <div class="input-group">
                                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="Mensaje.." />
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger btn-sm" id="btn-chat">
                                                    Enviar</button>
                                            </span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>                                                        
			</div>
			<!--div class="row">
                            <div class="col">
                                    <div class="course_search">
                                            <form action="#" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
                                                    <div><input type="text" class="course_input" placeholder="Course" required="required"></div>
                                                    <div><input type="text" class="course_input" placeholder="Level" required="required"></div>
                                                    <button class="course_button"><span>search course</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                            </form>
                                    </div>
                            </div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="courses_slider_container">
						<div class="owl-carousel owl-theme courses_slider">
							
							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="<?= base_url() ?>images/course_1.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="#">Featured</a></div>
											<div class="course_price ml-auto">Price: <span>$35</span></div>
										</div>
										<div class="course_title"><h3><a href="courses.html">Online Literature Course</a></h3></div>
										<div class="course_text">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div>
										<div class="course_footer d-flex align-items-center justify-content-start">
											<div class="course_author_image"><img src="<?= base_url() ?>images/featured_author.jpg" alt="https://unsplash.com/@anthonytran"></div>
											<div class="course_author_name">By <a href="#">James S. Morrison</a></div>
											<div class="course_sales ml-auto"><span>352</span> Sales</div>
										</div>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="<?= base_url() ?>images/course_2.jpg" alt=""></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="#">New</a></div>
											<div class="course_price ml-auto">Price: <span>$35</span></div>
										</div>
										<div class="course_title"><h3><a href="courses.html">Social Media Course</a></h3></div>
										<div class="course_text">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div>
										<div class="course_footer d-flex align-items-center justify-content-start">
											<div class="course_author_image"><img src="<?= base_url() ?>images/course_author_2.jpg" alt=""></div>
											<div class="course_author_name">By <a href="#">Mark Smith</a></div>
											<div class="course_sales ml-auto"><span>352</span> Sales</div>
										</div>
									</div>
								</div>
							</div>

							<div class="owl-item">
								<div class="course">
									<div class="course_image"><img src="<?= base_url() ?>images/course_3.jpg" alt="https://unsplash.com/@annademy"></div>
									<div class="course_body">
										<div class="course_header d-flex flex-row align-items-center justify-content-start">
											<div class="course_tag"><a href="#">Featured</a></div>
											<div class="course_price ml-auto">Price: <span>$35</span></div>
										</div>
										<div class="course_title"><h3><a href="courses.html">Marketing Course</a></h3></div>
										<div class="course_text">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div>
										<div class="course_footer d-flex align-items-center justify-content-start">
											<div class="course_author_image"><img src="<?= base_url() ?>images/course_author_3.jpg" alt=""></div>
											<div class="course_author_name">By <a href="#">Julia Williams</a></div>
											<div class="course_sales ml-auto"><span>352</span> Sales</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						
						<div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

					</div>
				</div>
			</div-->
		</div>
	</div>

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
    var mee = "<?= $me ?>";
</script>
<?php $this->load->view('scripts'); ?> 
<script src="<?= base_url() ?>js/chat.js"></script>
</body>
</html>