<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Perfil Alumno'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('student/headerBack'); ?>

	<!-- Home -->	
	</div>

        <div class="container login">
            <div class="row">
                <section id="middle" class="error_page">
                    <div class="middle_inner">
                        <div class="entry">
                            <div class="error">
                                <div class="error_bg" style="background:rgba(245, 2, 2, 1);">
                                    <div class="error_inner" style=""><h1 class="error_title">Usuario bloqueado</h1></div>
                                </div>
                            </div>
                        </div>
                        <section class="content_wrap fullwidth">
                            <div class="error">
                                <h2 class="error_subtitle">Esta cuenta está bloqueada. Para cualquier aclaración consulte con el administrador.</h2>
                            </div>
                        </section>
                    </div>
                </section>
                    
                </div>
                <div class="col-sm-3"></div>
            </div>
            
        </div>

	<!-- Courses -->
	
<?php $this->load->view('footer')?>
     
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    
<script src="<?= base_url() ?>js/profile.js"></script>
<script src="<?= base_url() ?>js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>js/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

</body>
</html>