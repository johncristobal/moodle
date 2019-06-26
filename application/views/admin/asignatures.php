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
        <?php $this->load->view('admin/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->        
        <div class="container headerTitle">
            <div class="row justify-content-between">
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Materias</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                    <div class="">
                        <form action="<?= base_url() ?>admin/createSubject" method="post" class="">
                            <!--div>
                                <input type="text" class="course_input" placeholder="Course" >
                            </div-->
                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
                                <button class="course_button_add">                                
                                    <span>Crear nueva materia</span>   
                                </button>
                                <img class="" src="<?= base_url() ?>images/milestone_2.svg" alt="" width="50px" height="50px">                                
                            </div>
                            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                                <button class="course_button_add_res">
                                    <span>Crear nueva materia</span> 
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <?php 
                if($materias){                
            ?>
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                <div class="row">
                    <div class="col-sm-2 offset-sm-1"><div class="news_post_title_user">Materia</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Descripción</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Fecha creación</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Editar</div></div>
                    <div class="col-sm-1"><div class="news_post_title_user">Borrar</div></div>
                </div>
            </div>

            <?php 
                foreach ($materias as $value) {
            ?>
            
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                <div class="row dataRow">                   
                    <div class="col-sm-2 offset-1">
                        <div class="news_post_date"><?= $value["materia"]; ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class=""><?= $value["materia"]; ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="news_post_author"><?= date("m/d/Y", strtotime($value["fecha_alta"])) ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="news_post_author"><a href="<?= base_url()?>admin/editSubject/<?= $value["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                    </div>                   
                    <div class="col-sm-1">
                        <div class="news_post_author"><a href="#" id="<?= $value["id"];?>" class="confirmation" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                    </div>  
                    <!--<?=base_url();?>admin/deleteSubject/<?= $value["id"];?>-->
                    <!--div class="col-1 col-sm-1">
                        <a href=""><img src="<?= base_url() ?>" /></a>
                    </div>
                    <div class="col-1 col-sm-1">
                    </div-->
                </div>
            </div>
            
            <!--responsive-->
            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
            <div class="row">
                <!--div class="col-3">
                    <div class="news_post_image">
                        <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                    </div>
                </div-->
                <div class="col-9">
                    <div class="news_post_date_res">Materia: <?= $value["materia"]; ?></div>
                    <div class=""><?= $value["materia"]; ?> </div>
                    <div class="">Alta: <?= date("m/d/Y", strtotime($value["fecha_alta"]))  ?></div>
                    <br/>
                </div>
                <div class="col-2">
                    <div class="news_post_author"><a href="<?= base_url()?>admin/editSubject/<?= $value["id"];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                    <div class="news_post_author"><a href="#" id="<?= $value["id"];?>" class="confirmation" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
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