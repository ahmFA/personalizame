<!-- /////////////////////////////////////////Footer -->
<footer>
	<div class="wrap-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-footer footer-1">
					<div class="content">
						<a href="#"><img src="<?=base_url() ?>assets/images/logo.png" alt=""></a>
						
					</div>
				</div>
				<div class="col-md-4 col-footer footer-2">
					<div class="heading">
						<h4>Sobre Nosotros</h4>
					</div>
					<div class="content">
						<div class="row">
							<p>Somos un par de chavales en la flor de la vida, aprendiendo de este bonito mundo
							 que es el desarrollo web, tratando de aprobar el proyecto y así incorporarnos en el
							  mercado laboral para ser los Fucking Masters of the Universe.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-footer footer-4">
					<div class="heading">
						<h4>Categorías</h4>
					</div>
					<div class="content">
						<ul>
							 <li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Deportes">Deportes</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Deportes</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Terror">Terror</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Terror</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Infantil">Infantil</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Infantil</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Animales">Animales</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Animales</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Ficción">Ciencia Ficción</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Ciencia Ficción</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Profesiones">Profesiones</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Profesiones</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Humor">Humor</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Humor</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Gaming">Gaming</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Humor</a>
							<?php endif; ?>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					Copyright &copy; Personalízame -  Desarrollado por Alejandro y Luis de 2º de DAW
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer -->
<!-- 

							
							
							
							
							<form action="<?= base_url() ?>producto/crear" method="post" name="catDeportes">
							<input type="hidden" name="categoria" value="Deportes">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catFiccion">
							<input type="hidden" name="categoria" value="Ficción">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catGaming">
							<input type="hidden" name="categoria" value="Gaming">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catProfesiones">
							<input type="hidden" name="categoria" value="Profesiones">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catHumor">
							<input type="hidden" name="categoria" value="Humor">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catInfantil">
							<input type="hidden" name="categoria" value="Infantil">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catTerror">
							<input type="hidden" name="categoria" value="Terror">
						</form>
						<form action="<?= base_url() ?>producto/crear" method="post" name="catAnimales">
							<input type="hidden" name="categoria" value="Animales">
						</form>
						<ul>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catDeportes.submit()" class="portfolio-link" data-toggle="modal">Deportes</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Deportes</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catTerror.submit()" class="portfolio-link" data-toggle="modal">Terror</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Terror</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catInfantil.submit()" class="portfolio-link" data-toggle="modal">Infantil</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Infantil</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catAnimales.submit()" class="portfolio-link" data-toggle="modal">Animales</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Animales</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catFiccion.submit()" class="portfolio-link" data-toggle="modal">Ciencia Ficción</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Ciencia Ficción</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catProfesiones.submit()" class="portfolio-link" data-toggle="modal">Profesiones</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Profesiones</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catHumor.submit()" class="portfolio-link" data-toggle="modal">Humor</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Humor</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="javascript:document.catGaming.submit()" class="portfolio-link" data-toggle="modal">Gaming</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Gaming</a>
							<?php endif; ?>
							</li>
 -->
