<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Alumnos en grupo'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('admin/headerBack'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container login">
            
            <div class="row justify-content-between">
                <div class="col-12 text-center">
                    <div class="section_title text-center">
                        <h2>Grupo: <?= $grupo["grupo"] ?></h2>                        
                    </div>                
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-sm-12 text-center">
                    <div class="text-center">
                        <p><strong>Profesor: <?= $grupo["nombre"] ?></strong></p>  
                    </div>                
                </div>
                <div class="col-12 col-sm-12 text-center">
                    <div class="text-center">
                        <p><strong>Materia: <?= $grupo["materia"] ?></strong></p>                        
                    </div>                
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <br>
                    <p>
                        Alumnos registrados en el grupo.<br>
                        Da click sobre <i class="fa fa-trash-o" aria-hidden="true"></i> para eliminar el alumno del grupo.
                        <br>
                        Da click sobre el boton <strong>Agregar alumnos</strong> para asignar alumnos a este grupo.<br>
                    </p>
                    
                </div>
            </div>
            
            <div class="row">
                <div class="col offset-3 offset-sm-10">
                    <br>
                    <button class="btn btn-danger addAlumnos msg-warning" id="<?= $grupo['id_pm'] ?>">Agregar alumnos</button>
                </div>
            </div>
            <div class="row">
                <br>
            </div>

            
            <?php 
                if($alumnosMateriaArray != "-1"){
                    foreach ($alumnosMateriaArray as $alumno) {
            ?>
                <div class="row">
                    <div class="col-5 col-sm-2 offset-2 offset-sm-4">
                    <div class="p">
                        <div class="news_post_comments">
                            <?= $alumno["nombre"] ?>
                        </div>                                                                                                                               
                    </div>
                    </div>
                    <div class="col-2 col-sm-2">
                        <div class="news_post_author">
                            <i class="fa fa-trash-o eliminaAlumnoMateria" id="<?= $alumno["id_alumno"]; ?>" itemid="<?= $grupo['id_pm'];  ?>" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            <?php
                    }
                }else{
            ?>
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-1 text-center">
                        <h3>Da click en el botón <strong>Agregar alumno</strong> para asignar alumnos a este grupo</h3>
                    </div>
                </div>
            <?php
                }
            ?>            
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

	<!-- Courses -->
	
<?php $this->load->view('footer')?>
        
       
        
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
<script src="<?= base_url() ?>js/materias.js"></script>

</body>
</html>