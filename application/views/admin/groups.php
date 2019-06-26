<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Grupos'
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
                        <h2>Grupos</h2>                        
                    </div>                
                </div>
            </div>
            <ul class="nav nav-tabs mb-5 mt-3 nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Grupos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Nuevo grupo</a>
                </li>
                <!--li class="nav-item">
                  <a class="nav-link" id="pills-alumnos-tab" data-toggle="pill" href="#pills-alumnos" role="tab" aria-controls="pills-profile" aria-selected="false">Asignar alumnos</a>
                </li-->
                
            </ul>
            
            <!--Tabs content-->
            <div class="tab-content" id="pills-tabContent">
                
            <!--Tab grupos creados asignadas-->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-12 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">                            
                            <p>
                                Visualiza los grupos asignados y sus profesores. <br>
                                Usa el botón de <i class="fa fa-trash-o" aria-hidden="true"></i> para borrar la relación.                                
                                <br>
                                Da click sobre el <strong>grupo</strong> para visualizar los alumnos.
                            </p>
                        </div>                
                    </div>
                    </div>
                    <?php 
                    if($materias_profesor){
                    ?>
                    <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                        <div class="row">
                            <div class="col-sm-1 offset-2"><div class="news_post_title_user">Id</div></div>
                            <div class="col-sm-2"><div class="news_post_title_user">Grupo</div></div>
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
                        <div class="row dataRow">
                            <div class="col-sm-1 offset-2">
                                <div class="news_post_date"><?= $value["id_pm"]; ?></div>
                            </div>
                            <div class="col-sm-2 nombre" id="<?= $value["grupo"]; ?>">
                                <a href="<?= base_url() ?>admin/studentsGroups/<?= $value["id_pm"]; ?>" class="" id="<?= $value["id_pm"]; ?>"> 
                                <div><?= $value["grupo"]; ?></div>
                                </a>
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
                            <div class="">
                                <a href="<?= base_url() ?>admin/studentsGroups/<?= $value["id_pm"]; ?>" class="" id="<?= $value["id_pm"]; ?>"> 
                                <div>Grupo: <?= $value["grupo"]; ?></div>
                                </a>
                                Grupo: <?= $value["grupo"]; ?>
                            </div>
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
                            <div class="section_title text-center"><h2>Sin Grupos</h2></div>                
                        </div>
                    <?php
                        }
                    ?> 
                    
                    <!--div class="accordions">
                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center active"><div><strong class="nombreMateria">Da clic sobre el grupo para visualizar los alumnos</strong></div></div>                           
                                <div class="accordion_panel">
                                    <div class="row">
                                        <div class="col offset-4 offset-sm-10">
                                            <br>
                                            <button class="btn btn-danger addAlumnos msg-warning" id="<?= $value["id_pm"]; ?>">Agregar alumnos</button>
                                        </div>
                                    </div>
                                    <div class="dataAlumno">

                                    </div>
                                </div>                            
                        </div>
                    </div-->
                    
                </div>
            </div>
            
            <!--Tab nuevas grupos-->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-12 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">                            
                            <p>
                                Da clic en el boton <button class="btn btn-danger"><i class="fa fa-plus-circle" aria-hidden="true"></i></button> para agregar grupo. <br>
                                Después da clic en <strong>Guardar relaciones</strong> para <br>salvar los grupos asignados.
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
                            <div class="col-12 col-sm-3 offset-sm-2 text-center">
                                 <div class="form-group">
                                    <!--label for="nombreGrupo">Nombre del grupo</label-->
                                    <input type="text" class="form-control text-center" name="nombreGrupo_0" placeholder="Nombre del grupo" required="required">
                                </div>
                            </div>
                            <div class="col-6 col-sm-2 select1">
                                <select class="select" name="materia_0">
                                <option value="0">Elige una materia...</option>
                                <?php
                                    foreach ($materias as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["materia"]."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <!--div class="col-2 col-sm-1 text-center">
                                <strong>></strong>
                            </div-->
                            <div class="col-6 col-sm-2 select2">   
                                <select class="select" name="profesor_0">
                                    <option value="0">Asigna profesor...</option>
                                    <?php
                                    foreach ($profesores as $value) {
                                        echo "<option value='".$value["id"]."'>".$value["nombre"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <hr class="hr">
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">                  
                        <div class="col text-right">
                            <br><br>
                            <button class="btn btn-danger msg-warning saveRelations">Guardar grupos</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Tab alumnos en grupos-->
            <!--div class="tab-pane fade" id="pills-alumnos" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-12 col-sm-5 offset-sm-3">
                        <div class="section_title text-center">                            
                            <p>
                                Asigna alumnos a grupos. <br>
                                Usa el botón de <i class="fa fa-trash-o" aria-hidden="true"></i> para borrar la relación.
                                <br>
                                Con el boton de <strong>Agregar alumnos</strong> selecciona alumnos para materias. 
                                <br>
                            </p>
                        </div>                
                    </div>
                    </div>
                    
                    <div class="accordions">
                        <?php
                            if($materias_profesor != "-1"){
                            foreach ($materias_profesor as $key => $value) {
                        ?>
                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center active"><div><?= $value["grupo"]; ?></div></div>                           
                                <div class="accordion_panel" style="max-height: 164px;">
                                    <div class="row">
                                        <div class="col offset-4 offset-sm-10">
                                            <br>
                                            <button class="btn btn-danger addAlumnos msg-warning" id="<?= $value["id_pm"]; ?>">Agregar alumnos</button>
                                        </div>
                                    </div>

                                    <?php 
                                        if($alumnosMateriaArray[$value["grupo"]] != "-1"){
                                            foreach ($alumnosMateriaArray[$value["grupo"]] as $alumno) {
                                    ?>
                                        <div class="row">
                                            <div class="col-5 col-sm-2 offset-1">
                                            <div class="p">
                                                <div class="news_post_comments">
                                                    <a href="<?= base_url() ?>admin/homework_alumno/<?= $alumno["id_alumno"]?>"><?= $alumno["nombre"] ?></a>
                                                </div>                                                                                                                               
                                            </div>
                                            </div>
                                            <div class="col-2 col-sm-2">
                                                <div class="news_post_author">
                                                    <i class="fa fa-trash-o eliminaAlumnoMateria" id="<?= $alumno["id_alumno"]; ?>" itemid="<?= $value["id_pm"];  ?>" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <div class="row">
                                            <div class="col-8 col-sm-8 offset-1">
                                                <h3>Da click en el botón <strong>Agregar alumno</strong> para asignar alumnos a este grupo</h3>
                                            </div>
                                        </div>
                                    <?php
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
            </div-->
            
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
        
        <!--modal to show alumnos-->
        <div class="modal fade" id="modalAlumnos" tabindex="-1" role="dialog" aria-labelledby="modalAlumnos" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selecciona alumnos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body boxes">
                <?php
                    foreach ($alumnos as $value) {
                ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="caja<?= $value["id"] ?>" value="<?= $value["id"] ?>"><?= $value["nombre"] ?>
                        </label>
                    </div>  
                <?php
                    }
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger addRelationAlumnos">Agregar</button>
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