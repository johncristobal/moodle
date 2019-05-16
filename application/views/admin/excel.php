<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Usuarios'
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
                <div class="col-6 offset-3">
                    <div class="section_title text-center"><h2>Leer excel</h2></div>                
                </div>
            </div>
        </div>
        
        <div class="container">
            
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
            <div class="row">
                <div class="col-6 col-sm-6">
                    <form method="post" action="<?= base_url()?>admin/readExcelUsuarios" enctype="multipart/form-data"> 
                    <div class="form-group">
                      <label for="excelFile">Abrir archivo de excel</label>
                      <input type="file" class="form-control-file" id="excelFile" name="excelFile">
                      <br>
                      <input type="submit" value="Leer archivo">
                    </div>
                  </form>
                </div>
                
            </div>
            </div>
            
        </div>
        
	<!-- Courses -->
	<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center"><h2>Choose your course</h2></div>
					<div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
				</div>
			</div>
			<div class="row">
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
					
					<!-- Courses Slider -->
					<div class="courses_slider_container">
						<div class="owl-carousel owl-theme courses_slider">
							
							<!-- Slider Item -->
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

							<!-- Slider Item -->
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

							<!-- Slider Item -->
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
						
						<!-- Courses Slider Nav -->
						<div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Milestones -->

	<div class="milestones">
		<!-- Background image artis https://unsplash.com/@thepootphotographer -->
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>images/milestones.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row milestones_container">
							
				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url() ?>images/milestone_1.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="1548">0</div>
						<div class="milestone_text">Online Courses</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url() ?>images/milestone_2.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="7286">0</div>
						<div class="milestone_text">Students</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url() ?>images/milestone_3.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="257">0</div>
						<div class="milestone_text">Teachers</div>
					</div>
				</div>

				<!-- Milestone -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url() ?>images/milestone_4.svg" alt=""></div>
						<div class="milestone_counter" data-end-value="39">0</div>
						<div class="milestone_text">Countries</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Sections -->

	<div class="grouped_sections">
		<div class="container">
			<div class="row">

				<!-- Why Choose Us -->

				<div class="col-lg-4 grouped_col">
					<div class="grouped_title">Why Choose Us?</div>
					<div class="accordions">

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center active"><div>Mauris vehicula nisi congue?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam.</p>
								</div>
							</div>
						</div>

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Vehicula nisi congue, blandit?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam.</p>
								</div>
							</div>
						</div>

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Mauris vehicula nisi congue?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam.</p>
								</div>
							</div>
						</div>

						<div class="accordion_container">
							<div class="accordion d-flex flex-row align-items-center"><div>Nisi congue, blandit purus sed?</div></div>
							<div class="accordion_panel">
								<div>
									<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam.</p>
								</div>
							</div>
						</div>

					</div>

				</div>

				<!-- Events -->

				<div class="col-lg-4 grouped_col">
					<div class="grouped_title">Upcoming Events</div>
					<div class="events">

						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">20</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">New Marketing Course Release</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>

						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">23</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">Students Art Workshop</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>

						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">25</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">Launch Party for a new Platform</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>

						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">27</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">New Marketing Course</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>

						<!-- Event -->
						<div class="event d-flex flex-row align-items-start justify-content-start">
							<div>
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">29</div>
									<div class="event_month">April</div>
								</div>
							</div>
							<div class="event_body">
								<div class="event_title"><a href="#">New Marketing Course</a></div>
								<div class="event_subtitle">Location: Online Platform</div>
							</div>
						</div>

					</div>
				</div>

				<!-- News -->

				<div class="col-lg-4 grouped_col">
					<div class="grouped_title">Latest News</div>
					<div class="news">
						
						<!-- News Post -->
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert"></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2018</div>
								<div class="news_post_title"><a href="news.html">Why Choose online education?</a></div>
								<div class="news_post_author">By <a href="#">William Smith</a></div>
							</div>
						</div>

						<!-- News Post -->
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="<?= base_url() ?>images/news_2.jpg" alt="https://unsplash.com/@nbb_photos"></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2018</div>
								<div class="news_post_title"><a href="news.html">Books, Kindle or tablet?</a></div>
								<div class="news_post_author">By <a href="#">William Smith</a></div>
							</div>
						</div>

						<!-- News Post -->
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="<?= base_url() ?>images/news_3.jpg" alt="https://unsplash.com/@rawpixel"></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2018</div>
								<div class="news_post_title"><a href="news.html">Why Choose online education?</a></div>
								<div class="news_post_author">By <a href="#">William Smith</a></div>
							</div>
						</div>

						<!-- News Post -->
						<div class="news_post d-flex flex-row align-items-start justify-content-start">
							<div><div class="news_post_image"><img src="<?= base_url() ?>images/news_4.jpg" alt="https://unsplash.com/@jtylernix"></div></div>
							<div class="news_post_body">
								<div class="news_post_date">April 02, 2018</div>
								<div class="news_post_title"><a href="news.html">Books, Kindle or tablet?</a></div>
								<div class="news_post_author">By <a href="#">William Smith</a></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Video -->

	<div class="video">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="video_container_outer">
						<div class="video_container">
							<!-- Video poster image artist: https://unsplash.com/@annademy -->
							<video id="vid1" class="video-js vjs-default-skin" controls data-setup='{ "poster": "<?= base_url() ?>images/video.jpg", "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://youtu.be/5_MRXyYjHDk"}], "youtube": { "iv_load_policy": 1 } }'>
							</video>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Join -->

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

<?php $this->load->view('footer')?>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
</body>
</html>