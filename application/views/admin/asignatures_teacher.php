<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Asignar profesor materia'
        );
        $this->load->view('head',$datos);
    ?>
    <body>
        <div class="super_container">

        <!-- Header -->
        <?php $this->load->view('admin/header'); ?>

	<!-- Home -->	
	</div>
    
        <div class="container-fluid headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center">
                        <h2>Profesor - Materias</h2>
                        
                    </div>                
                </div>
            </div>
            <ul class="nav nav-tabs mb-5 mt-3 nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Asignar materias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Materias asignadas</a>
                </li>
                
            </ul>
            
            <!--Tabs content-->
            <div class="tab-content" id="pills-tabContent">
                
            <!--Tab nuevas asignadas-->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-4 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">
                            
                            <p>
                                Da clic en el boton <button class="btn btn-danger"><i class="fa fa-plus-circle" aria-hidden="true"></i></button> para agregar relaciones. <br>
                                Después da clic en <strong>Guardar relaciones</strong> para <br>salvar las relaciones creadas
                            </p>
                        </div>                
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-2 offset-9"><button class="btn btn-danger agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></div>
                    </div>

                    <div class="nueva_materia">
                        <div class="row combosMaterias">
                            <div class="col-3"></div>
                            <div class="col-2 select1">
                                <select name="materia_0">
                                <option value="0">Elige una materia...</option>
                                <?php
                                    foreach ($materias as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["materia"]."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-1 text-center">
                                - - - - -
                            </div>
                            <div class="col-2 select2">   
                                <select name="profesor_0">
                                    <option value="0">Asigna profesor...</option>
                                    <?php
                                    foreach ($profesores as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["nombre"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                    <div class="row">                  
                        <div class="col text-right">
                            <br><br>
                            <button class="btn btn-danger saveRelations">Guardar relaciones</button>
                        </div>
                    </div>
                </div>
            </div>
                
            <!--Tab materias asignadas-->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-4 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">                            
                            <p>
                                Visualiza las materias asignadas y sus profesores. <br>Usa el botón de <i class="fa fa-trash-o" aria-hidden="true"></i> para borrar la relación.
                            </p>
                        </div>                
                    </div>
                    </div>
                    <?php 
                    if($materias_profesor){
                    ?>
                    <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                        <div class="row">
                            <div class="col-sm-1 offset-3"><div class="news_post_title_user">Id</div></div>
                            <div class="col-sm-2"><div class="news_post_title_user">Profesor</div></div>
                            <div class="col-sm-2"><div class="news_post_title_user">Materia</div></div>
                            
                            <div class="col-sm-1"><div class="news_post_title_user"></div></div>
                        </div>
                    </div>

                    <?php 
                        foreach ($materias_profesor as $value) {
                    ?>

                    <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                        <div class="row">
                            <div class="col-sm-1 offset-3">
                                <div class="news_post_date"><?= $value["id_pm"]; ?></div>
                            </div>
                            <div class="col-sm-2">
                                <div class=""><?= $value["nombre"]; ?></div>
                            </div>
                            <div class="col-sm-2">
                                <div class="news_post_author"><?= $value["materia"]; ?></div>
                            </div>
                                              
                            <div class="col-sm-1">
                                <div class="news_post_author"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
                            </div>  

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
                            <div class="news_post_date_res">Materia: <?= $value["id_pm"]; ?></div>
                            <div class=""><?= $value["profesor"]; ?> </div>
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
        
        <!-- Modal -->
        <div class="modal fade" id="modalRelations" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Guardar estas relaciones?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger lastSaveRelations">Guardar</button>
              </div>
            </div>
          </div>
        </div>
        
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
<script src="<?= base_url() ?>js/materias.js"></script>

</body>
</html>