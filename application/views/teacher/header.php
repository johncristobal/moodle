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
<header class="header">			
    
		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
                                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                                <div class="logo_container">
                                                    <a href="<?= base_url(); ?>teacher">
                                                        <div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                                            <div class="logo_img"><img class="logo" src="<?= base_url(); ?>images/logo_instituto.jpg" alt=""></div>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;<div class="logo_text">Idea</div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <nav class="main_nav_contaner ml-auto">
                                                    <ul class="main_nav">
                                                        <li><a href="<?= base_url() ?>teacher/asignatures">Tareas</a></li>
                                                        <li><a href="<?= base_url() ?>teacher/grades">Calificaciones</a></li>
                                                        <li><a href="<?= base_url() ?>teacher/messages">Chat</a></li>
                                                        <li><a href="<?= base_url() ?>teacher/profile">Perfil</a></li>
                                                        <li><a href="<?= base_url() ?>admin/cerrar">Cerrar sesión</a></li>
                                                    </ul>


                                                    <!-- Hamburger -->

                                                    <div class="hamburger menu_mm">
                                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                                    </div>
                                                </nav>
                                            </div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

	<!-- Menu resposinve-->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<!--div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div-->
		<nav class="menu_nav">
			<ul class="menu_mm">
                            <li class="menu_mm"><a href="<?= base_url() ?>teacher/asignatures">Materias</a></li>
                            <li class="menu_mm"><a href="<?= base_url() ?>teacher/messages">Chat</a></li>
                            <li class="menu_mm"><a href="<?= base_url() ?>teacher/profile">Perfil</a></li>
                            <li class="menu_mm"><a href="<?= base_url() ?>admin/cerrar">Cerrar sesión</a></li>
			</ul>
		</nav>
	</div>