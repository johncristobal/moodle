<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Tareas Profesor'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('teacher/headerBack'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container login">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="section_title text-center"><h2>Tareas de alumnos</h2></div>                    
                </div>
                <!--div class="col-12 col-sm-8 text-center">
                    <h3><?= $grupo["grupo"] ?></h3>
                    <p>
                        <strong><?= $grupo["nombre"] ?></strong> - <strong><?= $grupo["materia"] ?></strong>
                    </p>
                    <br>
                </div-->
            </div>
            <div class="row">
                <div class="col-12">                    
                        <?php
                            if(($tareas) != "-1"){
                        ?>
                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                                <div class="row">
                                    <br>
                                    <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Alumno</div></div>
                                    <div class="col-sm-2"><div class="news_post_title_user">Archivo</div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user">Calificación</div></div>                            
                                    <div class="col-sm-2"><div class="news_post_title_user">Estatus</div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user"></div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user"></div></div>
                                </div>
                            </div>
                        <?php
                                foreach ($tareas as $key => $value) {                                    
                        ?>
                        
                        <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                            <div class="row">
                                <div class="col-sm-2 offset-sm-1 text-center alumno" id="<?= $value["nombre"] ?>">
                                    <div class="text-center"><?= $value["nombre"] ?></div>
                                </div>
                                <div class="col-sm-2 archivo" id="<?= $value["archivo"]; ?>">
                                    <div class=""><?= $value["archivo"]; ?></div>
                                </div>    
                                <div class="col-sm-1 calificacion" id="<?= $value["puntos"]; ?>">
                                    <div class=""><?= $value["calificacion"]; ?></div>
                                </div>
                                <div class="col-sm-2 estatus" id="<?= $value["estatus"]; ?>">
                                    <div class=""><?= $value["estatus"]; ?></div>
                                </div>
                                <div class="col-sm-1">
                                    <a href="<?= $value["archivo"]; ?>" id="<?= $value["id_pm"]; ?>" dir="<?= $value["id"]; ?>" class="downloadFileAlumno"><i class="fa fa-download fa-lg" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-sm-1">
                                    <a href="<?= $value["archivo"]; ?>" id="<?= $value["id_tarea"]; ?>" dir="<?= $value["id"] ?>" class="openModalCalificar"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><hr></div>
                            </div>
                            <!--div class="row">
                                <div class="col-sm-2 offset-sm-1">
                                    <div class="news_post_author"><a href="#" class="btn btn-danger">Descargar</a></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="news_post_author"><a href="#" class="btn btn-danger">Subir tarea</a></div>
                                </div> 
                            </div-->
                        </div>

                    <!--responsive-->
                    <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                        <div class="row">
                            <!--div class="col-3">
                                <div class="news_post_image">
                                    <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                                </div>
                            </div-->
                            <div class="d-none alumno" id="<?= $value["nombre"]; ?>"></div>
                            <div class="d-none archivo" id="<?= $value["archivo"]; ?>"></div>
                            <div class="d-none calificacion" id="<?= $value["puntos"]; ?>"></div>
                            <div class="col-9 estatus" id="<?= $value["estatus"]; ?>">
                                <div class="news_post_date_res"><?= $value["nombre"]; ?></div>
                                <div class="">Archivo: <?= $value["archivo"] ?> </div>
                                <div class="">Calificación: <?= $value["calificacion"]; ?></div>
                                <div class="">Estatus: <strong> <?= $value["estatus"]; ?></strong></div>
                                <br/>
                            </div>
                            <div class="col-3">
                                <a href="<?= $value["archivo"]; ?>" id="<?= $value["id_pm"]; ?>" dir="<?= $value["id"]; ?>" class="downloadFile"><i class="fa fa-download fa-lg mt-2" aria-hidden="true"></i></a>
                                <br>
                                <a href="<?= $value["archivo"]; ?>" id="<?= $value["id_tarea"]; ?>" dir="<?= $value["id"] ?>" class="openModalCalificar"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>
                    </div>                                                
                        <?php
                                }                            
                            }else{
                        ?>
                            <div class="section_title text-center"><h3>No tienes tareas asignadas</h3></div>
                        <?php
                            }
                        ?>
               
                </div>
            </div>
        </div>

	<!-- Courses -->
	
<?php $this->load->view('footer')?>
        
        <!--Validar borrar-->
        <div class="modal fade" id="modalCalificarTarea" tabindex="-1" role="dialog" aria-labelledby="modalCalificarTarea" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Calificar tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form id="formularioCalificarTarea" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <input type="hidden" class="idtarea" name="idtarea" id="idtarea">
                  <input type="hidden" class="idgrupo" name="idpm" id="idpm">
                <div class="form-group row">
                  <label class="col-sm-3" for="alumno">Alumno: </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control alumnoModal" id="alumno" name="alumno" placeholder="" disabled="true">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3" for="archivo">Archivo: </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control archivoModal" id="archivo" name="archivo" placeholder="" disabled="true">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3" for="tarea">Calificación: </label>
                  <div class="col-sm-8">
                  <input type="number" class="form-control cali" id="cali" name="cali" placeholder="">
                  </div>
                </div>
                <!--div class="form-group">
                  <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Sube la tarea...">
                  <small id="emailHelp" class="form-text text-muted">Selecciona un archivo para subir tu tarea</small>
                </div-->
                
                <!--button type="submit" class="btn btn-primary">Submit</button-->
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger addTareaStudent msg-warning">Calificar</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
<script src="<?= base_url() ?>js/homework.js"></script>
<script src="<?= base_url() ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>js/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

</body>
</html>