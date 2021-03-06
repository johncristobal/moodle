<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Registrar usuario'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>	
<div class="super_container">

	<!-- Header -->

	<div class="super_container">

        <!-- Header -->
        <?php $this->load->view('admin/header'); ?>

	</div>	
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Editar materia</h2></div>                
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

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
                            <div class="col-12 col-sm-6 offset-sm-3">
                                <div class="">						
                                    <form  id="subject_form" action="<?= base_url() ?>admin/editSubject/<?= $idSubject?> " method="post" class="_form">

                                        <div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 contact_name_col">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre de la materia</label>
                                                        <input type="text" class="form-control" name="nombreMateria" id="nombreMateria" placeholder="" required="required" value="<?= $info->materia?>">
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
                                                        <label for="fecha_nacim">Estatus</label>
                                                        <select class="form-control" name="estatusMateria" id="estatusMateria" required="required">
                                                         <option value="1">Activo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                          
                                            <input type="button" name="editSubjectForm" id="editSubjectForm" value="Guardar cambios" class="_button msg-warning">
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
</script>
</body>
</html>