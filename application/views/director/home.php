<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Director'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('director/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->
        
        <div class="container login">
            <div class="row justify-content-between">
                <div class="col text-center">
                    <div class="section_title text-center"><h2>Hola Director</h2></div>                
                    <p>
                        Selecciona alguna de las opciones del menú para comenzar...
                    </p>
                </div>
            </div>
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