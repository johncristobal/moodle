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
                    <div class="section_title text-center"><h2>Calificaciones</h2></div>
                    <div class="accordions">
                        <?php
                            if($alumnos != "-1"){
                            foreach ($alumnos as $key => $value) {
                        ?>
                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center active"><div><?= $key ?></div></div>                           
                                <div class="accordion_panel" style="max-height: 164px;">
                                    <div class="row">
                                        <div class="col offset-4 offset-sm-10">
                                            <button class="btn btn-danger nuevatarea msg-warning" id="<?= $idpm[$key] ?>">Subir excel</button>
                                        </div>
                                    </div>
                                    
                                    <?php 
                                        if($value != "-1"){
                                     ?>
                                       <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                                        <div class="row">
                                            <br>
                                            <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Alumno</div></div>
                                            <div class="col-sm-2"><div class="news_post_title_user">Tareas</div></div>
                                            <div class="col-sm-2"><div class="news_post_title_user">Examen</div></div>
                                            <div class="col-sm-2"><div class="news_post_title_user">Calificación</div></div>
                                            <div class="col-sm-2"><div class="news_post_title_user"></div></div>
                                        </div>
                                      </div>
                                     <?php       
                                            foreach ($value as $alumno) {
                                    ?>
                        <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                            <div class="row">
                                <div class="col-sm-2 offset-sm-1 text-center">
                                    <div class="text-center"><?= $alumno["id_alumno"]; ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="news_post_author"><?= $alumno["tareas"]; ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class=""><?= $alumno["examen"]; ?></div>
                                </div>    
                                <div class="col-sm-2">
                                    <div class=""><?= $alumno["calificacion"]; ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <a href="" id="" class="downloadFile"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                </div>
                            </div>
                    </div>
                                    <?php
                                            }
                                        }
                                    ?>                                    
                                </div>                            
                        </div>
                        <?php
                            }
                            }else{
                        ?>
                            <div class="section_title text-center"><h3>No tienes materias asignadas</h3></div>
                        <?php
                            }
                        ?>
                        
                        

                        <!--div class="accordion_container">
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
                        </div-->
                </div>
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