<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Editar Calificaciones'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>	
<div class="super_container">

	<!-- Header -->

	<div class="super_container">

        <!-- Header -->
        <?php $this->load->view('teacher/header'); ?>

	</div>	
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Editar calificaciones</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                   <!-- <div id="excelRead">
                        <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
                            <button class="course_button_add" id="">                                
                                <span>Importar excel</span>   
                            </button>
                        </div>
                        <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                            <button class="course_button_add_res">
                                <span>Importar excel</span> 
                            </button>
                        </div>
                    </div> -->
                </div>
            </div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
                                <div class="">						
                                    <form  id="subject_form" action="<?= base_url() ?>teacher/editGrades/<?= $info["idAlumno"]?>/ <?= $info["idpm"]?>" method="post" class="_form">

                                        <div>
                                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                                                <div class="row">
                                                    <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Nombre</div></div>
                                                    <div class="col-sm-2"><div class="news_post_title_user">Moodle</div></div>
                                                    <div class="col-sm-2"><div class="news_post_title_user">Tareas</div></div>
                                                    <div class="col-sm-2"><div class="news_post_title_user">Exámenes</div></div>
                                                    <div class="col-sm-2"><div class="news_post_title_user">Calificación</div></div>
                                                </div>
                                            </div>
                                             <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center filterData">
                                           <input type="hidden" name="tareasMoodle" id="tareasMoodle" value="<?= $info["tareasMoodle"]?>">
                                           <input type="hidden" name="idAlumno" id="idAlumno" value="<?= $info["idAlumno"]?>">
                                           
                                            <div class="row dataRow">                   
                                                <div class="col-sm-2 offset-1">
                                                    <div class="news_post_author"><?= $info["nombre"]?></div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="news_post_author"><?= $info["tareasMoodle"]?></div>
                                                </div>
                                                <div class="col-sm-2">
                                                     <input type="number" class="form-control" name="tareasComp" id="tareasComp" placeholder="" max=20 min=0 required="required" value="<?= $info["tareasComp"]?>">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" min=0  max=40 class="form-control" name="examenes" id="examenes" placeholder="" required="required" value="<?= $info["examen"]?>">
                                                </div>                   
                                                <div class="col-sm-2">
                                                    <div class="news_post_author"><b><?= $info["calificacion"]?></b></div>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="text-center">
                                          <br>
                                            <input type="button" name="editSubjectForm" id="editSubjectForm" value="Guardar cambios" class="_button msg-warning">
                                        </div>
                                        <div>
                                            <br>
                                        </div>
                                    </form>

                                </div>
		</div>
	</div>
<?php $this->load->view('footer')?>
        
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