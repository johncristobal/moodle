<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Admin'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>	
<div class="super_container">

	<!-- Header -->

	<div class="super_container">

        <!-- Header -->
        <?php $this->load->view('admin/header'); ?>

	</div>	
    <div class="container headerTitle">
    <div class="row justify-content-between">
        <div class="col-6 offset-3">
            <div class="section_title text-center"><h2>Registro de Usuario</h2></div>                
        </div>
    </div>
	</div>

	<!-- Contact -->

	<div class="contact">

		<div class="container-fluid">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
				<div class="col-xl-6">
					<div class="contact_content">
						<!--
						<div class="row">
							<div class="col-xl-6">
								<div class="contact_about">
									<div class="logo_container">
										<a href="#">
											<div class="logo_content d-flex flex-row align-items-end justify-content-start">
												<div class="logo_img"><img src="images/logo.png" alt=""></div>
												<div class="logo_text">learn</div>
											</div>
										</a>
									</div>
									<div class="contact_about_text">
										<p>Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut. Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar.</p>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="contact_info_container">
									<div class="contact_info_main_title">Contact Us</div>
									<div class="contact_info">
										<div class="contact_info_item">
											<div class="contact_info_title">Address:</div>
											<div class="contact_info_line">1481 Creekside Lane Avila Beach, CA 93424</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Phone:</div>
											<div class="contact_info_line">+53 345 7953 32453</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Email:</div>
											<div class="contact_info_line">yourmail@gmail.com</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<div class="contact_form_container">
							<form  id="contact_form" action="<?= base_url() ?>admin/nuevoUsuario " method="post"class="contact_form">
								<div>
									<div class="row">
										<div class="col-lg-6 contact_name_col">
											<label>Nombre</label>
											<input type="text" class="contact_input" name="nombre" placeholder="Nombre" required="required">
										</div>
										<div class="col-lg-6">
											<label>Fecha de nacimiento</label>
											<input type="date" class="contact_input" name="fecha_nacim" required="required">
										</div>
									</div>
								</div>
							    <div>
							      <label for="tipoUser">Tipo de usuario</label>
							      <select id="tipoUser" name="tipoUser" class="contact_input" >
							        <option selected>Alumno</option>
							        <option>Maestro</option>
							      </select>
							    </div>
								<div>
									<label>Correo electrónico</label>
									<input type="email" class="contact_input" name="correo" placeholder="Correo electrónico" required="required">
								</div>
								<div>
									<label>Contraseña</label>
									<input type="password" class="contact_input" name="password" placeholder="Escriba una contraseña" required="required">
								</div>
								<div>
									<label>Repita la contraseña</label>
									<input type="password" class="contact_input" name="password2" placeholder="Escriba nuevamente la contraseña">
								</div>								
								<button class="contact_button"><span>Crear usuario</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
				
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
</body>
</html>