<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Editar usuario'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>	
<div class="super_container">

	<!-- Header -->

	<div class="super_container">

        <!-- Header -->
        <?php $this->load->view('director/header'); ?>

	</div>	
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-12 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Editar usuario</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                    <div id="excelRead">
                        <!--div>
                            <input type="text" class="course_input" placeholder="Course" >
                        </div-->
                    </div>
                </div>
            </div>
	</div>
	<div class="contact">
		<div class="container">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
                            <div class="col-12 col-sm-6 offset-sm-3">
                                <div class="">						
                                    <form  id="contact_form"  action="<?=base_url()?>director/guardarCambios" method="post" class="_form">
                                        <input type="hidden" name="idUser" value="<?= $idUser?>"/>
                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 contact_name_col">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" required="required" value="<?=  $info->nombre?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <!--div class='input-group date' id='datetimepicker1'>
                                                            <input type='text' class="form-control" />
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div-->
                                                        <label for="fecha_nacim">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control" name="fecha_nacim" id="fecha_nacim" value="<?=  $info->fecha_nac?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 contact_name_col">
                                                    <div class="form-group">
                                                        <label for="tipoUser">Tipo de usuario</label>

                                                        <select id="tipoUser" name="tipoUser" class="form-control">
                                                            <option <?php if($info->rol==3) {echo'selected';} ?>>Alumno</option>
                                                            <option <?php if($info->rol==2) {echo'selected';} ?>>Maestro</option>
                                                            <!--option <?php if($info->rol==4) {echo'selected';} ?>>Director</option-->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                    <label for="matricula">Matrícula</label>
                                                    <input type="text" class="form-control" io="matricula" name="matricula" placeholder="" value="<?=$info->matricula?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label for="correo">Correo electrónico</label>
                                                <input type="email" class="form-control" id="correo" name="correo" placeholder=""value="<?=$info->correo?>" required="required">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label for="password">Contraseña</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Escriba una contraseña" required="required" >
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label for="password2">Repita la contraseña</label>
                                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Escriba nuevamente la contraseña" required="required">
                                            </div>
                                            <span id='message'></span>
                                        </div>	
                                        <div class="text-center">
                                            <input type="button" value="Guardar cambios" id ="editForm" class="msg-warning btn btn-info" >
                                            <!--<button type="button" class="msg-warning btn btn-info">Advertencia con condicion</button>-->
                                           </input>
                                        </div>
                                        <div>
                                            <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
			</div>				
		</div>
	</div>
    <?php $this->load->view('footer')?>
        
        <!--Importar archivo excel-->
        <div class="modal fade" id="openDoc" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Importar archivo de excel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="<?= base_url()?>admin/readExcelUsuarios" enctype="multipart/form-data"> 
                  
                    <div class="modal-body">
                      <p>Selecciona el documento de excel con la plantilla definida.</p>
                        <div class="form-group">
                          <input type="file" class="form-control-file" id="excelFile" name="excelFile">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-danger" value="Leer excel"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>

              </div>
            </div>
      </div>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>

<?php $this->load->view('scripts'); ?>  
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });

$('#password, #password2').on('keyup', function () {
  if ($('#password').val() == $('#password2').val()) {
    $('#message').html('Correcto').css('color', 'green');
    $('#editForm').removeAttr("disabled");
  } else {
    $('#message').html('Las contraseña no coincide').css('color', 'red');
    $('#editForm').attr("disabled", true);
  }

});      
</script>
</body>
</html>