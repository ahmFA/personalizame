	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
    
<div class="container-fluid" style="padding-bottom: 400px; padding-top: 100px; background-color: #ddef8d;">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<h3 style="color: green;">Su compra ha sido realizada con éxito</h3>
			<h4>Gracias por confiar en Personalízame</h4>
		</div>
	</div>
	<!-- Esto es lo nuevo -->
	<div class="row">
		<div class="col-sm-2 col-sm-offset-5">
			<form action="<?= base_url() ?>usuario/generaPDF" method="post">
				<input type="hidden" name="persona" value="<?= $persona ?>">
				<input type="hidden" name="direccion" value="<?= $direccion ?>">
				<input type="hidden" name="precio_total" value="<?= $precio_total ?>">
				<input type="submit" class="btn btn-info" value="Descargar PDF del pedido">
			</form>
		</div>
	</div>
	<!--  FIN de lo nuevo  -->
</div>