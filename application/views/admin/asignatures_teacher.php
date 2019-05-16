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
                <div class="col-12 col-sm-5 offset-sm-3">
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
                    <div class="col-12 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">                            
                            <p>
                                Da clic en el boton <button class="btn btn-danger"><i class="fa fa-plus-circle" aria-hidden="true"></i></button> para agregar relaciones. <br>
                                Después da clic en <strong>Guardar relaciones</strong> para <br>salvar las relaciones creadas
                            </p>
                        </div>                
                    </div>
                    </div>
                    <div class="row">
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-2 offset-9">
                            <button class="btn btn-danger agregar">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>                            
                        </div>
                    </div>
                    <div class="row">
                        <br>
                    </div>

                    <div class="nueva_materia">
                        <div class="row combosMaterias">
                            <div class="col-12 col-sm-3"></div>
                            <div class="col-5 col-sm-2 select1">
                                <select name="materia_0">
                                <option value="0">Elige una materia...</option>
                                <?php
                                    foreach ($materias as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["materia"]."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-2 col-sm-1 text-center">
                                <strong>></strong>
                            </div>
                            <div class="col-5 col-sm-2 select2">   
                                <select name="profesor_0">
                                    <option value="0">Asigna profesor...</option>
                                    <?php
                                    foreach ($profesores as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["nombre"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-3"></div>
                        </div>
                    </div>
                    <div class="row">                  
                        <div class="col text-right">
                            <br><br>
                            <button class="btn btn-danger msg-warning saveRelations">Guardar relaciones</button>
                        </div>
                    </div>
                </div>
            </div>
                
            <!--Tab materias asignadas-->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-12 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">                            
                            <p>
                                Visualiza las materias asignadas y sus profesores. <br>Usa el botón de <i class="fa fa-trash-o" aria-hidden="true"></i> para borrar la relación.
                                <br>
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
                        <div class="row"><br></div>
                        <div class="row">
                            <div class="col-sm-1 offset-3">
                                <div class="news_post_date"><?= $value["id_pm"]; ?></div>
                            </div>
                            <div class="col-sm-2 nombre" id="<?= $value["nombre"]; ?>">
                                <div><?= $value["nombre"]; ?></div>
                            </div>
                            <div class="col-sm-2 materia" id="<?= $value["materia"]; ?>">
                                <div><?= $value["materia"]; ?></div>
                            </div>
                                              
                            <div class="col-sm-1 delete">
                                <div class="news_post_author">
                                    <i class="fa fa-trash-o" id="<?= $value["id_pm"]; ?>" aria-hidden="true"></i>
                                </div>
                            </div>

                            <!--div class="col-1 col-sm-1">
                                <a href=""><img src="<?= base_url() ?>" /></a>
                            </div>
                            <div class="col-1 col-sm-1">
                            </div-->
                        </div>
                    </div>

                    <!--responsive-->
                    <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                        <div class="row"><br></div>
                        <div class="row">
                        <!--div class="col-3">
                            <div class="news_post_image">
                                <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                            </div>
                        </div-->
                        <div class="col-9">
                            <div class="news_post_date_res">Id: <?= $value["id_pm"]; ?></div>
                            <div class="">Profesor: <?= $value["nombre"]; ?> </div>
                            <div class="">Materia: <?= $value["materia"]; ?></div>
                            <br/>
                        </div>
                        <div class="materia" id="<?= $value["materia"]; ?>">                            
                        </div>
                        <div class="nombre" id="<?= $value["nombre"]; ?>">                            
                        </div>
                        <div class="col-2 delete">
                            <div class="news_post_author">
                                <i class="fa fa-trash-o" id="<?= $value["id_pm"]; ?>" aria-hidden="true"></i>
                            </div>
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
<?php $this->load->view('footer')?>
        
        <!-- Modal -->
        <div class="modal fade" id="modalRelations" tabindex="-1" role="dialog" aria-labelledby="modalRelations" aria-hidden="true">
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
                <button type="button" class="btn btn-danger msg-warning lastSaveRelations">Guardar</button>
              </div>
            </div>
          </div>
        </div>
        
        <!--Validar borrar-->
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar esta relación?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body body-deleted">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger deleteRelations">Borrar</button>
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