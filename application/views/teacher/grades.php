<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Calificaciones profesor'
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
                                        <div class="col-md-4 col-sm-12">
                                            <p>El porcentaje de tareas Moodle es: <b> <?= $porcentaje[$key] ?> % </b></p>
                                        </div>
                                        <div class="col offset-1 ">
                                            <button class="btn btn-danger nuevoPorcentaje msg-warning" id="<?= $idpm[$key] ?>">Definir porcentaje</button>
                                        </div>
                                       <!-- <div class="col offset-3 ">
                                            <button class="btn btn-danger nuevatarea msg-warning" id="<?= $idpm[$key] ?>">Subir excel</button>
                                        </div> -->
                                    </div>
                                
                                    <?php 
                                        if($value != "-1"){
                                     ?>
                                       <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                                        <div class="row">
                                            <br>
                                            <div class="col-sm-2"><div class="news_post_title_user">Alumno</div></div>
                                            <div class="col-sm-2"><div class="news_post_title_user">Moodle</div></div>
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
                                <div class="col-sm-2  text-center">
                                    <div class="text-center"><?= $alumno["nombre"]; ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="news_post_author"><?= $alumno["tareas"]; ?></div>
                                </div>
                                 <div class="col-sm-2">
                                    <div class="news_post_author"><?= $alumno["tareasComp"]; ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class=""><?= $alumno["examen"]; ?></div>
                                </div>    
                                <div class="col-sm-2">
                                    <div class=""><?= $alumno["calificacion"]; ?></div>
                                </div>
                                <div class="col-sm-2">
                                    <a href="" id="" class=""><a href="<?= base_url()?>teacher/editGrades/<?= $alumno["id_alumno"];?>/<?= $idpm[$key] ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
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
                </div>
                </div>
            </div>
        </div>

    <!-- Courses -->
    
<?php $this->load->view('footer')?>
        
        <!--Validar borrar-->
        <div class="modal fade" id="modalAddPor" tabindex="-1" role="dialog" aria-labelledby="modalAddPor" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Definición de porcentaje de tareas Moodle </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form id="formularioPorTarea" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <input type="hidden" name="idpm" id="id_pm">
                <div class="form-group">
                  <label for="description">Escriba el porcentaje (máximo 40%)</label>
                  <input type="number" class="form-control" max=40 min=1 id="porcentaje" name="porcentaje" placeholder="Escriba el porcentaje %">
                </div>
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger addTarea msg-warning">Guardar</button>
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