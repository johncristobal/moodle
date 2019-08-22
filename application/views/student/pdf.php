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
                <div class="col-10 col-sm-10 offset-1">
                <div class="mt-3 mb-3">                        
                    <div class="row">
                        <div class="col-3 text-center">
                        <a href="<?= base_url(); ?>student">
                            <div class="">
                                <div class="logo_img"><img class="logo" src="<?= base_url(); ?>images/logo_instituto.jpg" alt=""></div>
                                <!--&nbsp;&nbsp;&nbsp;&nbsp;<div class="logo_text">Idea</div>-->
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
                            <h2><strong>Nombre: </strong> John Cristobal</h2>
                            <br>
                            <h4><strong>Matrícula: </strong> 2011630059</h4>                                                        
                        </div>                        
                    </div>  
                </div>                
                </div> <!--header...-->
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
                            <h4 class="redColor">Moodle</h4>
                        </div>
                        <div class="col-2">
                            <h4 class="redColor">Proyectos</h4>
                        </div>
                        <div class="col-2">
                            <h4 class="redColor">Exámen</h4>
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
                    
                    <div class="row">
                        <div class="col-4 text-center">
                            <p>Español</p>
                        </div>
                        <div class="col-2">
                            <p>20%</p>
                        </div>
                        <div class="col-2">
                            <p>10%</p>
                        </div>
                        <div class="col-2">
                            <p>60%</p>
                        </div>
                        <div class="col-2">
                            <p>90%</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-center">
                            <p>Español</p>
                        </div>
                        <div class="col-2">
                            <p>20%</p>
                        </div>
                        <div class="col-2">
                            <p>10%</p>
                        </div>
                        <div class="col-2">
                            <p>60%</p>
                        </div>
                        <div class="col-2">
                            <p>90%</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>   
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
                        <div class="col-2">
                            <h4><strong>90%</strong></h4>
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
                            
				<!-- About -->
				
			</div>
		</div>
	</footer>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    

</body>
</html>