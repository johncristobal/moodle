<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Materias'
        );
        $this->load->view('head',$datos);
    ?>
<body>
        <div class="super_container">

        <!-- Header -->
        <?php $this->load->view('student/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Calificaciones</h2></div>                
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <?php 
                if($calificaciones){                
            ?>
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                <div class="row">
                    <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Materia</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Grupo</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Examen</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Tareas</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Calificación</div></div>                   
                </div>
            </div>

            <?php 
                foreach ($calificaciones as $value) {
            ?>
            
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
            <div class="row dataRow">
                    <div class="col-sm-2 offset-1">
                        <div class="news_post_date"><?= $value["materia"] ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class=""><?= $value["grupo"] ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="news_post_author"><?= $value["examen"] ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="news_post_author"><?=  $value["tareas"] ?></div>
                    </div>                   
                    <div class="col-sm-2">
                         <div class="news_post_author"><?= $value["calificacion"] ?></div>
                    </div>                 
                
            </div>
            </div>         
            <!--responsive-->
            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">

            </div>
            <?php                     
                }    
                ?>
             <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
            <div class="row dataRow">
                    <div class="col-sm-2 offset-7">
                        <div class="news_post_date">Promedio:</div>
                    </div>               
                     <div class="col-sm-2 offset-9">
                        <div class="news_post_date"><?= $promedio ?></div>
                    </div>                   
            </div>
            </div>     
                <?php        
                }else{
            ?>
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Sin materias</h2></div>                
                </div>
            <?php
                }
            ?> 

            <!--div class="row">
                <div class="col-10 col-sm-4 offset-2 offset-sm-8 asignar">
                    <a href="<?= base_url() ?>admin/asignaturesTeacher" class="btn btn-danger msg-warning"> Asignar materias a profesor </a>
                </div>
            </div-->
            
            
        </div>
   
	<!-- Courses -->
	
<?php $this->load->view('footer')?>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
</body>
</html>