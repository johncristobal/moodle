<!DOCTYPE html>
<html lang="en">
    <?php 
        $datos = array(
            "titulo" => 'Usuarios'
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
                    <div class="section_title text-center"><h2>Usuarios</h2></div>                
                </div>
                <div class="col-8 col-sm-4 right">
                    <div class="">
                        <form action="<?= base_url() ?>admin/register" method="post" class="">
                            <!--div>
                                <input type="text" class="course_input" placeholder="Course" >
                            </div-->
                            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block">
                                <button class="course_button_add">                                
                                    <span>Crear nuevo usuario</span>   
                                </button>
                                <img class="" src="<?= base_url() ?>images/milestone_2.svg" alt="" width="50px" height="50px">                                
                            </div>
                            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
                                <button class="course_button_add_res">
                                    <span>Crear nuevo usuario</span> 
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <?php 
                if($usuarios){   

            ?>
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center" style="padding: 20px;">
                <div class="row">
                    <div class="col-sm-2 offset-1"><div class="news_post_title_user">Correo</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Rol</div></div>
                    <div class="col-sm-2"><div class="news_post_title_user">Fecha creación</div></div>
                    <div class="col-sm-1"><div class="news_post_title_user">Editar</div></div>
                    <div class="col-sm-1"><div class="news_post_title_user">Borrar</div></div>
                    <div class="col-sm-1"><div class="news_post_title_user">Activo</div></div>
                </div>
            </div>

            <?php 
                foreach ($usuarios as $value) {
                      //Obtenemos el estatus y asignamos checked en caso de que sea necesario
                    $checked=" ";
                     if($value["estatus"]=="1"){
                        $checked="checked";
                     }      
            ?>
            
            <div class="d-none d-sm-block d-sm-block d-md-block d-lg-block d-xl-block text-center justify-content-center">
                <div class="row dataRow">                    
                    <div class="col-sm-2 offset-1">
                        <div class="news_post_date"><?= $value["correo"]; ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class=""><?php 
                        switch ($value["rol"]) {
                            case '1':
                                echo "Administrador";
                                break;
                             case '2':
                                echo "Profesor";
                                break; 
                              case '3':
                                echo "Alumno";
                                break;   
                            case '4':
                                echo "Director";
                                break;   
                            default:
                                echo "Rol no asignado";
                                break;
                        }
                         ?></div>
                    </div>
                    <div class="col-sm-2">
                        <div class="news_post_author"><?= date("m/d/Y", strtotime($value["fecha_alta"])) ?></div>
                    </div>
                        <div class="col-sm-1">
                        <div class="news_post_author"><a href="<?= base_url(); ?>admin/editarUsuario/<?= $value["id"];?>" <i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                        </div> 
                 
                        <div class="col-sm-1 text-center">
                        <div class="news_post_author text-center"><a href="#" id="<?= $value["id"];?>" class="confirmationUser"> <i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                        </div>                       
                        <div class="col-sm-2">
                            <label class="switch">
                              <input type="checkbox" <?=$checked?>  class="confirmationBlockUser" id="<?= $value["id"];?>" >
                              <span class="slider round"></span>
                            </label>
                        </div>   
                    <!--div class="col-1 col-sm-1">
                        <a href=""><img src="<?= base_url() ?>" /></a>
                    </div>
                    <div class="col-1 col-sm-1">
                    </div-->
                </div>
            </div>
            
            <div class="d-block d-sm-none d-sm-none d-md-none d-lg-none d-xl-none">
            <div class="row">
                <!--div class="col-3">
                    <div class="news_post_image">
                        <img src="<?= base_url() ?>images/news_1.jpg" alt="https://unsplash.com/@beccatapert">
                    </div>
                </div-->
                <div class="col-9">
                    <div class="news_post_date_res"><?= $value["correo"]; ?></div>
                    <div class="">Rol: <?= $value["rol"]; ?> </div>
                    <div class="">Alta: <?= date("m/d/Y", strtotime($value["fecha_alta"])) ?></div>
                    <br/>
                </div>
                <div class="col-2">
                    <div class="news_post_author"><a href="<?= base_url(); ?>admin/editarUsuario/<?= $value["id"];?>" <i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                    <div class="news_post_author"><a href="#" id="<?= $value["id"];?>" class="confirmationUser"> <i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                </div>
            </div>
            </div>
            <?php                     
                }            
                }else{
            ?>
                <div class="col-4 col-sm-5 offset-sm-3">
                    <div class="section_title text-center"><h2>Sin usuarios</h2></div>                
                </div>
            <?php
                }
            ?> 

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