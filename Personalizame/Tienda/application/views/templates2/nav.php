<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">Personalízame</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden"><a href="#page-top"></a></li>

				<li><a class="page-scroll" href="#services">Productos</a></li>
				<li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
				<li><a class="page-scroll" href="#about">Nosotros</a></li>
				<li><a class="page-scroll" href="#contact">Contacto</a></li>
				<?php if(!isset($_SESSION['nick']) && !isset($_SESSION['perfil'])):?>
					<li><a data-toggle="modal" href="#myModal">Login</a></li>
					
				<?php else:?>
					<?php if($_SESSION['perfil'] == 'Administrador'):?>
						<li><a href="<?=base_url()?>home/indexAdmin">ADMIN</a></li>
					<?php else :?>
						<li><a href="#">Mi perfil</a></li>	
					<?php endif;?>
					
					<li><a href="<?=base_url()?>usuario/logout">LOGOUT</a></li>
					
				<?php endif;?>
				
				
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<!-- Navigation -->