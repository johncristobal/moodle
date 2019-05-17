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
                <div class="col-12">
                    <div class="section_title text-center"><h2>Mis Tareas</h2></div>
                    
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
                                </div>
                            </div>
                        <?php
                                foreach ($tareasAlumno as $key => $value) {                                    
                        ?>
                        
                        <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                            <div class="row">
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
                                <div class="col-sm-2">
                                    <div class=""><?= $value["estatus"]; ?></div>
                                </div>
                                <div class="col-sm-1">
                                    <a href="<?= base_url()?>admin/editSubject/<?= $value["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>
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
                        <div class="col-9">
                            <div class="news_post_date_res">Materia: <?= $value["materia"]; ?></div>
                            <div class=""><?= $value["materia"]; ?> </div>
                            <div class="">Alta: <?= date("m/d/Y", strtotime($value["fecha_alta"]))  ?></div>
                            <br/>
                        </div>
                        <div class="col-2">
                            <div class="news_post_author"><a href="<?= base_url()?>admin/editSubject/<?= $value["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                            <div class="news_post_author"><a href="#" id="<?= $value["id"];?>" class="confirmation" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
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
        <div class="modal fade" id="modalAddHW" tabindex="-1" role="dialog" aria-labelledby="modalAddHW" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form id="formularioTarea" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <input type="hidden" name="idpm" id="id_pm">
                <div class="form-group">
                  <label for="description">Descripción</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Agrega descripción tarea...">
                  <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                </div>
                
                <div class="form-group">
                    <label for="dateDown">Fecha inicio</label>
                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" language="es">
                        <input type="text" class="form-control" id="dateUp" name="dateUp" placeholder="Fecha inicio tarea...">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>                     
                </div>
                <div class="form-group">
                    <label for="dateDown">Fecha termino</label>
                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" language="es">
                        <input type="text" class="form-control" id="dateDown" name="dateDown" placeholder="Fecha termino tarea...">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>                     
                </div>
                <div class="form-group">
                  <label for="points">Puntaje</label>
                  <input type="text" class="form-control" id="points" name="points" placeholder="Puntos de la tarea...">
                  <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                </div>
                <div class="form-group">
                  <label for="archivo">Archivo</label>
                  <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Sube la tarea...">
                  <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                </div>
                
                <!--button type="submit" class="btn btn-primary">Submit</button-->
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger addTarea msg-warning">Agregar</button>
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