<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Profesor'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('teacher/header'); ?>

	<!-- Home -->	
	</div>
    
    	<!-- login module -->
        
        <div class="container login">
            <div class="row justify-content-between">
                <div class="col-6 offset-3">
                    <div class="section_title text-center"><h2>Hola Profesor</h2></div>                
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