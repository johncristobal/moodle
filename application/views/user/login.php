<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $datos = array(
            "titulo" => 'Iniciar sesión'
        );
        $this->load->view('head',$datos);
    ?>
</head>
<body>

        <div class="super_container">

            <!-- Header -->
            <?php $this->load->view('header') ?>	

	<!-- Home -->	
	</div>
    
    	<!-- login module -->
        
        <div class="container login">
            <div class="row justify-content-between">
                <div class="col-12 col-sm-6 offset-sm-3">
                    <div class="section_title text-center"><h2>Inicia sesión</h2><br></div>
                    <form id="login_form" class="_form">
                    <div class="form-group">
                        <label for="mail">Correo electrónico</label>
                        <input type="email" class="form-control" id="mail" placeholder="usuario@cuenta...">
                        <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" id="pass" placeholder="">
                        <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                    </div>
                    <div class="text-center d-none" id="error">
                        <div class="alert-danger">
                            Favor de verificar datos...
                        </div>
                    </div>                    
                    <div class="text-center">
                         <button class="_button msg-warning" type="submit">
                            <span>Ingresar</span>
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>

<?php $this->load->view('footer')?>
</div>
<script>
    var urlApi = "<?php echo base_url() ?>";
</script>
<?php $this->load->view('scripts'); ?>    

</body>
</html>