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
			
		<!-- Top Bar -->
		<!--<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Have any questions?</div></li>
									<li>
										<div>(009) 35475 6688933 32</div>
									</li>
									<li>
										<div>info@elaerntemplate.com</div>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<ul>
										<li><a href="#">Register</a></li>
										<li><a href="#">Login</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>-->

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="<?= base_url(); ?>">
									<div class="logo_content d-flex flex-row align-items-end justify-content-start">
                                                                            <div class="logo_img"><img class="logo" src="<?=base_url()?>images/logo_instituto.jpg" alt=""></div>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;<div class="logo_text">Idea</div>
									</div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li><a href="<?= base_url() ?>">Inicio</a></li>
									<li><a href="<?= base_url() ?>OfertaEducativa">Oferta educativa</a></li>
                                    <li><a href="<?= base_url() ?>nosotros">Nosotros</a></li>
                                    <li><a href="<?= base_url() ?>contacto">Contacto</a></li>
                                   <li><a href="<?= base_url() ?>login">Iniciar sesión</a></li>
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
		<nav class="menu_nav">
			<ul class="menu_mm">
                                <li class="menu_mm"><a href="<?= base_url() ?>">Inicio</a></li>
                                <li><a href="<?= base_url() ?>OfertaEducativa">Oferta educativa</a></li>
                                <li><a href="<?= base_url() ?>nosotros">Nosotros</a></li>
                                <li><a href="<?= base_url() ?>contacto">Contacto</a></li>
                                <li><a href="<?= base_url() ?>login">Iniciar sesión</a></li>
			</ul>
		</nav>
	</div>