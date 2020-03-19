<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Alumno'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<style>
    .logo{
        height: 80px;
        width: 115px;
    }
    @media only screen and (max-width: 575px)
    {
        .logo {
            height: 35px;
            width: 40px;
        }
    }
</style>
<body>

        <div class="container-fluid">            
            <div class="row">
                <div class="col-12 col-sm-3 nopadding">
                    <div class="backGray">                        
                    <div class="row">
                        <div class="col-6">
                        <a href="<?= base_url(); ?>student">
                            <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                <div class="logo_img"><img class="logo" src="<?= base_url(); ?>images/logo_instituto.jpg" alt=""></div>
                                &nbsp;&nbsp;&nbsp;&nbsp;<div class="logo_text">Idea</div>
                            </div>
                        </a>  
                        </div>
                        <div class="col-6 text-right">
                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>                            
                        </div>
                        
                    </div>
                        
                    <!-- Header -->
                    <div class="d-none d-sm-block">
                    <div class="panelMaterial">
                        <?php
                            if($materias != "-1"){
                                foreach ($materias as $value) {
                                    
                        ?>
                        <div class="row mt-2">
                           <div class="col-6">
                           <div class="p">                            
                               <div class="news_post">
                                   <a href="<?php echo base_url()?>student/asignature/<?= $value["id_pm"] ?>"><?= $value["materia"] ?></a>
                               </div>                                                                                                                               
                           </div>
                           </div>
                           <div class="col-6">
                               <div>
                                   <span class="small"><?= $value["grupo"] ?> - <?= $value["nombre"] ?></span>
                               </div>
                           </div>
                        </div>
                        <?php
                                }
                            }else{
                        ?>
                            <div class="p">                            
                               <div class="news_post_comments">
                                   <a href="">Sin materias asignadas</a>
                               </div>
                           </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="footerPanel">
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student">
                            <span class="fa fa-home"></span>                            
                            <span class="smallCustom">Home</span>
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student/messages">
                            <span class="fa fa-comments"></span>                            
                            <span class="smallCustom">Chat</span>
                            </a>
                        </div>
                         <div class="row mt-2">
                            <a href="<?= base_url() ?>student/grades">
                            <span class="fa fa-clipboard"></span>                            
                            <span class="smallCustom">Calificaciones</span>
                            </a>
                        </div>
                        <!--<div class="row mt-2">
                            <a href="<?= base_url() ?>student/profile">
                            <span class="fa fa-image"></span>                            
                            <span class="smallCustom">Perfil</span>
                            </a>
                        </div> -->
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>admin/cerrar">
                            <span class="fa fa-power-off"></span>                            
                            <span class="smallCustom">Cerrar sesión</span>
                            </a>
                        </div>
                    </div>
                    </div>                   
                </div>
                </div>
                <div class="col-12 col-sm-9">
                    <!-- login module -->
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="panelMaterial">
                                <div class="row"> 
                                    <div class="col-5">
                                        <?php
                                            if($infoAlumno["imagen_perfil"] == ""){
                                        ?>
                                            <img src="<?=base_url()?>/images/usericon.jpg" class="rounded-circle" width="200px" height="200px">
                                        <?php
                                            }else{
                                        ?>
                                            <img src="<?= base_url() ?>perfilAlumno/<?= $idalumno ?>/<?= $infoAlumno["imagen_perfil"]; ?>" class="rounded-circle" width="150px" height="150px">                                    
                                        <?php
                                            }
                                        ?>   
                                        <!--img src="<?=base_url()?>/images/usericon.jpg" class="img-rounded"  width="100" height="100"--> 
                                    </div>
                                    <div class="col-7">
                                        <div class="section_title text-center"><h2>Bienvenido <?=$infoAlumno["nombre"]?></h2></div>                                    
                                    </div>
                                </div>
                                
                                <!--Info alumno-->
                                <div class="row">
                                    <div class="col-12 col-sm-6"> 
                                    <div class="card-box1">    
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Información de perfil
                                            <i class="lnr lnr-chevron-down"></i>
                                            <i class="lnr lnr-chevron-up"></i>
                                            </button>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                           <li class="list-group-item"><b>Nombre:</b> <?= $infoAlumno["nombre"]?> </li>
                                           <li class="list-group-item"><b>Matrícula:</b> <?= $infoAlumno["matricula"]?> </li>
                                           <!--li class="list-group-item"><b>Edad:</b> <?= $infoAlumno["edad"]?> </li-->
                                           <li class="list-group-item"><b>Fecha de Nacimiento:</b> <?= date("m/d/Y", strtotime($infoAlumno["fecha_nac"])) ?>  </li>
                                            </ul> 
                                        </div>
                                        </div>
                                    </div>   
                                    </div>                             
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="card-box1"> 
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                                Información de cuenta
                                                <i class="lnr lnr-chevron-down"></i>
                                                <i class="lnr lnr-chevron-up"></i>
                                                </button>
                                            </div>
                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                <ul class="list-group">
                                                <li class="list-group-item"><b>Correo:</b> <?= $infoAlumno["correo"]?> </li>
                                                <li class="list-group-item"><b>Fecha de alta:</b> <?= $infoAlumno["fecha_alta"]?> </li>
                                                </ul> 
                                                </div>
                                            </div>
                                        </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                        
                      <!--div class="row">    
                      <div class="container">
                       <h2>Tareas próximas</h2>                   
                     <div class="col-lg 12 col-sm-9">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th>Materia</th>
                            <th>Tarea</th>
                            <th>Fecha límite</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Física</td>
                            <td>Reporte de teoría de cuerdas</td>
                            <td>4 de Mayo del 2019</td>
                          </tr>
                          <tr>
                            <td>Fundamentos económicos</td>
                            <td>Análisis FODA</td>
                            <td>8 de Mayo del 2019</td>
                          </tr>
                          <tr>
                            <td>Derecho</td>
                            <td>Resumen de la constitución mexicana</td>
                            <td>15 de Mayo del 2019</td>
                          </tr>
                        </tbody>
                      </table>
                        </div>
                    </div>

                    </div-->              
                    </div>
                </div> 
            </div>
	<!-- Home -->	
	</div>
	
	<!-- menu respnsibe -->
        <div class="menu d-flex flex-column justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<!--div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div-->
		<div class="panelMaterial">
                        <?php
                            if($materias != "-1"){
                                foreach ($materias as $value) {
                                    
                        ?>
                        <div class="row mt-2">
                           <div class="col-6">
                           <div class="p">                            
                               <div class="news_post_comments">
                                   <a href="<?php echo base_url()?>student/asignature/<?= $value["id_pm"] ?>"><?= $value["materia"] ?></a>
                               </div>                                                                                                                               
                           </div>
                           </div> 
                           <div class="col-6">
                               <div>
                                   <span class="small"><?= $value["grupo"] ?> - <?= $value["nombre"] ?></span>
                               </div>
                           </div>
                        </div>
                        <?php
                                }
                            }else{
                        ?>
                            <div class="p">                            
                               <div class="news_post_comments">
                                   <a href="">Sin materias asignadas</a>
                               </div>
                           </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="footerPanel d-flex flex-column align-items-end text-right">
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student">                                                       
                            <span class="smallCustom">Home</span>
                            <span class="fa fa-home"></span> 
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student/messages">
                            <span class="smallCustom">Chat</span>
                            <span class="fa fa-comments"></span>                            
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="#">
                            <span class="smallCustom">Contacto</span>
                            <span class="fa fa-phone"></span>                            
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>student/profile">
                            <span class="smallCustom">Perfil</span>
                            <span class="fa fa-image"></span>                            
                            </a>
                        </div>
                        <div class="row mt-2">
                            <a href="<?= base_url() ?>admin/cerrar">
                            <span class="smallCustom">Cerrar sesión</span>
                            <span class="fa fa-power-off"></span>                            
                            </a>
                        </div>
                    </div>
		<!--div class="menu_extra">
			<div class="menu_phone"><span class="menu_title">phone:</span>(009) 35475 6688933 32</div>
			<div class="menu_social">
				<span class="menu_title">follow us</span>
				<ul>
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div-->
	</div>
        
<?php $this->load->view('footer')?>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    

</body>
</html>