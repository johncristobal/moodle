<!DOCTYPE html>

<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Tareas Alumno'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('student/headerBack'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container login">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="section_title text-center"><h2>Mis Tareas</h2></div>                    
                </div>
                <div class="col-12 col-sm-8 text-center">
                    <h3><?= $grupo["grupo"] ?></h3>
                    <p>
                        <strong><?= $grupo["nombre"] ?></strong> - <strong><?= $grupo["materia"] ?></strong>
                    </p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-12">                    
                        <?php
                            if(($tareasAlumno) != "-1"){
                        ?>
                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                                <div class="row">
                                    <br>
                                    <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Tarea</div></div>
                                    <div class="col-sm-2"><div class="news_post_title_user">Fecha límite</div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user">Puntos</div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user">Calificación</div></div>                            
                                    <div class="col-sm-2"><div class="news_post_title_user">Estatus</div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user"></div></div>
                                    <div class="col-sm-1"><div class="news_post_title_user"></div></div>
                                </div>
                            </div>
                        <?php
                                foreach ($tareasAlumno as $key => $value) {                                    
                        ?>
                        
                        <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                            <div class="row dataRow">
                                <div class="col-sm-2 offset-sm-1 text-center">
                                    <div class="text-center"><?= $value["tarea"] ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="news_post_author"><?= date("m/d/Y", strtotime($value["fecha_fin"])) ?></div>
                                </div>
                                <div class="col-sm-1">
                                    <div class=""><?= $value["puntos"]; ?></div>
                                </div>    
                                <div class="col-sm-1">
                                    <div class=""><?= $value["calificacion"]; ?></div>
                                </div>
                                <div class="col-sm-2 estatus" id="<?= $value["estatus"]; ?>">
                                    <div class=""><?= $value["estatus"]; ?></div>
                                </div>
                                <div class="col-sm-1">
                                    <a href="<?= $value["archivo"]; ?>" id="<?= $grupo["id_pm"] ?>" class="downloadFile"><i class="fa fa-download fa-lg" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-sm-1">
                                    <a href="<?= $value["archivo"]; ?>" id="<?= $value["id"]; ?>" dir="<?= $grupo["id_pm"] ?>" class="openModal"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></a>
                                </div>
                            </div>
                    </div>

                    <!--responsive-->
                    <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                        <div class="row">
                            <!--div class="col-3">
                                <div class="news_post_image">
                                    <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                                </div>
                            </div-->
                            <div class="col-9 estatus" id="<?= $value["estatus"]; ?>">
                                <div class="news_post_date_res"><?= $value["tarea"]; ?></div>
                                <div class="">Fecha entrega: <?= date("m/d/Y", strtotime($value["fecha_fin"])) ?> </div>
                                <div class="">Puntos: <?= $value["calificacion"]; ?> / <?= $value["puntos"]; ?></div>
                                <div class="">Estatus: <strong> <?= $value["estatus"]; ?></strong></div>
                                <br/>
                            </div>
                            <div class="col-3">
                                <a href="<?= $value["archivo"]; ?>" id="<?= $grupo["id_pm"] ?>" class="downloadFile"><i class="fa fa-download fa-lg mt-2" aria-hidden="true"></i></a>
                                <br>
                                <a href="<?= $value["archivo"]; ?>" id="<?= $value["id"]; ?>" dir="<?= $grupo["id_pm"] ?>" class="openModal"><i class="fa fa-upload fa-lg mt-3" aria-hidden="true"></i></a>
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
        <div class="modal fade" id="modalUploadHome" tabindex="-1" role="dialog" aria-labelledby="modalUploadHome" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form id="formularioSubirTarea" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <input type="hidden" class="idtarea" name="id" id="id">
                  <input type="hidden" class="idgrupo" name="idpm" id="idpm">
                <!--div class="form-group row">
                  <label class="col-sm-2" for="tarea">Tarea: </label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control tareaText" id="tarea" name="tarea" placeholder="" disabled="true">
                  </div>
                  <div class="col-sm-2">
                  <a class="btn btn-danger downloadTarea msg-warning">Descargar tarea</a>
                  </div>
                </div-->
                <div class="form-group">
                  <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Sube la tarea...">
                  <small id="emailHelp" class="form-text text-muted">Selecciona un archivo para subir tu tarea</small>
                </div>
                
                <!--button type="submit" class="btn btn-primary">Submit</button-->
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger addTareaStudent msg-warning">Subir</button>
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