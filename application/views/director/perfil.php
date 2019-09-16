<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Perfil Profesor'
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
    <!--
        correo
        nombre
        imagen_perfil
        fech_nac
        matricula
        
    -->
    	<!-- login module -->        
        <div class="container login">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-12 col-sm-6 backGray">
                    <div class="section_title text-center"><h2>Información del profesor</h2></div>                    
                    <br>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <?php
                                if($data["imagen_perfil"] == ""){
                            ?>
                                <img src="http://localhost/Moodle//images/usericon.jpg" class="img-rounded" width="200px" height="200px">
                            <?php
                                }else{
                            ?>
                                <img src="<?= base_url() ?>perfilProfesor/<?= $idprofesor ?>/<?= $data["imagen_perfil"]; ?>" class="img-rounded" width="200px" height="200px">                                    
                            <?php
                                }
                            ?>    
                        </div>
                    </div>
                    <br>
                    
                    <div class="row mt-2">
                        <div class="col-4 offset-2">Nombre:</div>
                        <div class="col-3">
                        <strong>
                            <?= $data["nombre"]; ?>
                        </strong>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 offset-2">Correo:</div>
                        <div class="col-3">
                        <strong>
                            <?= $data["correo"]; ?>
                        </strong>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 offset-2">Fecha nacimiento:</div>
                        <div class="col-3">
                        <strong>
                            <?= date("m/d/Y", strtotime($data["fecha_nac"])); ?>
                        </strong>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 offset-2">Matricula:</div>
                        <div class="col-3">
                        <strong>
                            <?= $data["matricula"]; ?>
                        </strong>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <button class="btn msg-warning" data-toggle="modal" data-target="#modalEditarInfo">Editar información</button>
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="col-sm-3"></div>
            </div>
            
        </div>

	<!-- Courses -->
	
<?php $this->load->view('footer')?>
        
        <!--Validar borrar-->
        <div class="modal fade" id="modalEditarInfo" tabindex="-1" role="dialog" aria-labelledby="modalEditarInfo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form id="formularioEditarInfo" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <input type="hidden" name="idusuario" value="<?= $data["Fk_usuario"] ?>" >  
                <div class="form-group row">
                <div class="col-sm-12 text-center">

                    <?php
                        if($data["imagen_perfil"] == ""){
                    ?>
                    <img id="imagePerfil" src="http://localhost/Moodle//images/usericon.jpg" class="img-rounded" width="200px" height="200px">
                    <?php
                        }else{
                    ?>
                        <img id="imagePerfil" src="<?= base_url() ?>perfilProfesor/<?= $idprofesor ?>/<?= $data["imagen_perfil"]; ?>" class="img-rounded" width="200px" height="200px">                                    
                    <?php
                        }
                    ?>                    
                    <br>
                    <br>
                    <div class="form-group">
                        <input type="file" class="form-control" id="archivo" name="archivo" placeholder="Elige nueva foto..." value="<?= $data["imagen_perfil"] ?>">
                      <small id="emailHelp" class="form-text text-muted">Elige una nueva foto</small>
                    </div>
                </div>                  
                </div>                  
                <div class="form-group row">
                  <label class="col-sm-3" for="nombre">Nombre: </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?= $data["nombre"] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3" for="correo">Correo: </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" id="correo" name="correo" placeholder="" value="<?= $data["correo"] ?>">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3" for="dateDown">Fecha nacimiento:</label>
                    <div class="col-sm-8 input-group date" style="display: inline-flex;" data-provide="datepicker" data-date-format="dd/mm/yyyy" language="es">
                        <input type="text" class="form-control" id="dateDown" name="dateDown" placeholder="" value="<?= date("m/d/Y", strtotime($data["fecha_nac"])); ?>">
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>                     
                </div>                  
                <div class="form-group row">
                  <label class="col-sm-3" for="matricula">Matricula: </label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" value="<?= $data["matricula"] ?>">
                  </div>
                </div>
                <!--button type="submit" class="btn btn-primary">Submit</button-->              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger addTareaStudent msg-warning">Actualizar</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
<script src="<?= base_url() ?>js/profile.js"></script>
<script src="<?= base_url() ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>js/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

</body>
</html>