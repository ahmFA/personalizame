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
			<a class="navbar-brand page-scroll" href="<?=base_url()?>home/index#page-top">Personalízame</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden"><a href="#page-top"></a></li>
				<li><a href="<?=base_url() ?>producto/crear">Crear</a></li>
				<li><a class="page-scroll" href="<?=base_url()?>home/index#services">Productos</a></li>
				<li><a class="page-scroll" href="<?=base_url()?>home/index#portfolio">Categorías</a></li>
				<li><a class="page-scroll" href="<?=base_url()?>home/index#about">Nosotros</a></li>
				<li><a class="page-scroll" href="<?=base_url()?>home/index#contact">Contacto</a></li>
				<?php if(!isset($_SESSION['nick']) && !isset($_SESSION['perfil'])):?>
					<li><a data-toggle="modal" href="#myModal">Login</a></li>
					
				<?php else:?>
					<?php if($_SESSION['perfil'] == 'Administrador'):?>
						<li><a href="<?=base_url()?>home/indexAdmin">ADMIN</a></li>
					<?php else :?>
						<li><a href="<?=base_url()?>usuario/perfil">Mi perfil</a></li>	
					<?php endif;?>
					
					<li><a href="<?=base_url()?>usuario/logout">LOGOUT</a></li>
					<li><a href="<?=base_url()?>usuario/cesta"><img alt="" src="<?= base_url() ?>assets/images/carrito.png">
                                <i id="carrito"><?= $_SESSION['carrito'] ?></i></a></li>
					
				<?php endif;?>
				
				
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<!-- Navigation -->