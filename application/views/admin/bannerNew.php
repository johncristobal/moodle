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
                    <div class="section_title text-center"><h2>Crear nuevo anuncio</h2></div>                
                </div>                
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-sm-5 offset-sm-3">
                    <div class="section_title text-center">                            
                        <p>
                            Selecciona una imagen y coloca un texto para el anuncio.
                            <br>
                        </p>
                    </div>                
                </div>
            </div>
        </div>
        
        <div class="container-fluid">            
            <div class="row text-center">
                <div class="col-12">
                    <form method="post" action="" enctype="multipart/form-data" id="form">    
                        <img src="<?= base_url() ?>banners/templateBanner.png" width="50%" height="70%" id="previewing">
                        <br><br>
                        <strong>Elegir imagen:</strong> <input type="file" name="foto" id="foto" value="0"/>
                        <br><br>
                        <strong>Texto: </strong>  <input type="text" name="fototext" id="fototext" size="50"/>
                        <br><br>
                        <input type="submit" name="createBannerButton" id="createBannerButton" value="Guardar anuncio" class="_button msg-warning">
                    </form>
                </div>
            </div>

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