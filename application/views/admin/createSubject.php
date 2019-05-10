<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Registrar usuario'
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
                <div class="col-12 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Registrar nueva Materia</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                    <div id="excelRead">
                        <!--div>
                            <input type="text" class="course_input" placeholder="Course" >
                        </div-->
                        <!--div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
                            <button class="course_button_add" id="">                                
                                <span>Importar excel</span>   
                            </button>
                        </div>
                        <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                            <button class="course_button_add_res">
                                <span>Importar excel</span> 
                            </button>
                        </div-->
                    </div>
                </div>
            </div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
                            <div class="col-12 col-sm-6 offset-sm-3">
                                <div class="">						
                                    <form  id="subject_form" action="<?= base_url() ?>admin/createSubject " method="post" class="_form">
                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 contact_name_col">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre de la materia</label>
                                                        <input type="text" class="form-control" name="nombreMateria" id="nombreMateria" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <!--div class='input-group date' id='datetimepicker1'>
                                                            <input type='text' class="form-control" />
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div-->
                                                        <label for="fecha_nacim">Estatus</label>
                                                        <input type="text" class="form-control" name="estatusMateria" id="estatusMateria" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="_button msg-warning" type="submit">
                                               <span>Crear materia</span>
                                           </button>
                                        </div>
                                        <div>
                                            <br>
                                        </div>
                                    </form>

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
        
        <div class="modal fade" id="openDoc" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Importar archivo de excel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="<?= base_url()?>admin/readExcelUsuarios" enctype="multipart/form-data"> 
                  
                    <div class="modal-body">
                      <p>Selecciona el documento de excel con la plantilla definida.</p>
                        <div class="form-group">
                          <input type="file" class="form-control-file" id="excelFile" name="excelFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" value="Leer excel"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>

              </div>
            </div>
      </div>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>

<?php $this->load->view('scripts'); ?>  
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
</body>
</html>