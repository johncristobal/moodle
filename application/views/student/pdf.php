<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    /*
        $datos = array(
            "titulo" => 'Alumno'
        );
        $this->load->view('head',$datos);
    
     */
    ?>
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
    
    .container-fluid{
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    
    .row{
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .shadowGray{
        border-radius: 10px;
        box-shadow: 5px 5px #ededed;
    }
    .backGray{
    padding: 10px;
    background-color: #f2f1f8;
    }
</style>
</head>

<body>
        <div class="container-fluid">            
            <div class="">
                
                <br><br><br>
                <table style="margin-top: 60px; text-align:center; margin-left: 8.333333%; position: relative; width: 100%;">
                    <tbody>
                        <tr>
                            <td style="text-align: center!important;">
                            <img class="logo" src="./images/logo_instituto.jpg" alt="">
                            </td>
                            <td style="text-align: center!important;">
                            <h3>Instituto de Educación Avanzada</h3>                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="backGray shadowGray" style="text-align:center; margin-left: 8.333333%; position: relative; width: 100%; margin-right: 8.3333%">
                    <tbody>
                        <tr>
                            <td>
                            <h2><strong>Nombre: </strong> <?= $alumnoData["nombre"] ?></h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><strong>Matrícula: </strong> <?= $alumnoData["matricula"] ?> </h4> 
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br><br>

                <!--div class="col-10 col-sm-10 offset-1">
                    <div class="mt-3 mb-3">                        
                        <div class="row">
                            <div class="col-3 text-center">
                            <a href="<?= base_url(); ?>student">
                                <div class="">
                                    <div class="logo_img"><img class="logo" src="<?= base_url(); ?>images/logo_instituto.jpg" alt=""></div>
                                </div>
                            </a>  
                            </div>
                            <div class="col-9 text-center middle_inner">
                                <br>
                                <h3>Instituto de Educación Avanzada</h3>
                            </div>
                        </div>                                                              
                    </div> 
                    <div class="backGray mt-3 mb-3 shadowGray">
                        <div class="row mt-3 mb-3">
                            <div class="col-3 text-center">
                                <img src="<?=base_url()?>/images/usericon.jpg" class="rounded-circle" width="100px" height="100px"> 
                            </div>
                            <div class="col-8">
                                <h2><strong>Nombre: </strong> <?= $alumnoData["nombre"] ?></h2>
                                <br>
                                <h4><strong>Matrícula: </strong> <?= $alumnoData["matricula"] ?> </h4>                                                        
                            </div>                        
                        </div>  
                    </div>                
                </div--> <!--header...-->
            </div>

            <div class="container">
            <div class="row">   <!--Materias-->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 text-center">
                            <br>
                            <h3><strong>Resumen de calificaciones</strong></h3>
                            <br>
                        </div>
                    </div>
                    <div class="redborder">
                        
                        <div class="row">
                            <div class="col-4 text-center">
                                <h4 class="redColor">Materia</h4>
                            </div>
                            <div class="col-2">
                                <h4 class="redColor">Grupo</h4>
                            </div>
                            <div class="col-2">
                                <h4 class="redColor">Exámen</h4>
                            </div>
                            <div class="col-2">
                                <h4 class="redColor">Tareas</h4>
                            </div>
                            <div class="col-2">
                                <h4 class="redColor">Calificación</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <hr>
                            </div>
                        </div>

                        <?php 
                            if($calificaciones){
                                foreach ($calificaciones as $value) {
                        ?>
                            <div class="row">
                                <div class="col-4 text-center">
                                    <p><?= $value["materia"] ?></p>
                                </div>
                                <div class="col-2">
                                    <p><?= $value["grupo"] ?></p>
                                </div>
                                <div class="col-2">
                                    <p><?= $value["examen"] ?></p>
                                </div>
                                <div class="col-2">
                                    <p><?= $value["tareas"] ?></p>
                                </div>
                                <div class="col-2 text-center">
                                    <p><?= $value["calificacion"] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>                           
                    </div>
                    
                    <div class="row mt-3">
                        <br>
                        <div class="col-4 text-center">
                            <p></p>
                        </div>
                        <div class="col-2">
                            <p></p>
                        </div>
                        <div class="col-2">
                            <p></p>
                        </div>
                        <div class="col-2">
                            <h4><strong>Promedio</strong></h4>
                        </div>
                        <div class="col-2 text-center">
                            <h4><strong><?= $promedio ?></strong></h4>
                        </div>
                    </div>
                </div><!--Fin de materias-->
                
                <div class="col-12">
                    <br>
                </div>
            </div>
            </div>
	<!-- Home -->	
	</div>
	
	<!-- menu respnsibe -->
        <footer class="footerPdf">
		<div class="container">
			<div class="row">
                            <div class="col-12 text-center">
                                <div class="footer_contact_title">Este documento carece de validez oficial.</div>
                            </div>
			</div>
		</div>
	</footer>
</body>
</html>