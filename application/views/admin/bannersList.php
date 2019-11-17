<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Anuncios'
        );
        $this->load->view('head',$datos);
    ?>
<body>
        <div class="super_container">

        <!-- Header -->
        <?php $this->load->view('admin/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Anuncios</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                    <div class="">
                        <form action="<?= base_url() ?>admin/createBanner" method="post" class="">
                            <!--div>
                                <input type="text" class="course_input" placeholder="Course" >
                            </div-->
                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
                                <button class="course_button_add">                                
                                    <span>Crear nuevo anuncio</span>   
                                </button>
                                <img class="" src="<?= base_url() ?>images/milestone_2.svg" alt="" width="50px" height="50px">                                
                            </div>
                            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                                <button class="course_button_add_res">
                                    <span>Crear nuevo anuncio</span> 
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-sm-5 offset-sm-3">
                    <div class="section_title text-center">                            
                        <p>
                            Visualiza los anuncion activos en tu sitio. <br>
                            Selecciona el orden solamente arrastrando cada anuncio.                                
                            <br>
                        </p>
                    </div>                
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            
            <?php 
                if($banners != "-1"){                
            ?>
            <!--div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                <div class="row">
                    <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Materia</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Descripción</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Fecha creación</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Editar</div></div>
                    <div class="col-sm-1"><div class="news_post_title_user">Borrar</div></div>
                </div>
            </div-->

            <?php 
                foreach ($banners as $value) {
            ?>
            
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block justify-content-center filterData">
                <div class="row dataRow">    
                    
                    <div class="col-12 col-sm-3">
                        <img src="<?= base_url() ?>/<?= $urlfolder ?>/<?= $value["imagen"]; ?>" width="100%" height="150px">
                    </div>
                    <div class="col-6 col-sm-5">
                        <h3><strong>Texto:</strong> <?= $value["texto"]; ?></h3><br>
                        <strong>Fecha:</strong><p><?= $value["fecha_create"]; ?></p>                        
                    </div>
                    <div class="col-1">
                        <div class="news_post_author">
                            <i class="fa fa-3x fa-trash-o delete" id="<?= $value["id"]; ?>" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!--div class="col-1">
                        <div class="news_post_author">
                            <i class="fa fa-3x fa-pencil update" id="<?= $value["id"]; ?>" aria-hidden="true"></i>
                        </div>
                    </div-->
                    <!--<?=base_url();?>admin/deleteSubject/<?= $value["id"];?>-->
                    <!--div class="col-1 col-sm-1">
                        <a href=""><img src="<?= base_url() ?>" /></a>
                    </div>
                    <div class="col-1 col-sm-1">
                    </div-->
                </div>
            </div>
            
            <?php                     
                }            
                }else{
            ?>
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Sin anuncios</h2></div>                
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
<script src="<?php echo base_url() ?>js/banner.js"></script>
</body>
</html>