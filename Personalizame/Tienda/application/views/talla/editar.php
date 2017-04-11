<div class="container">
<div class="row">
<div class="col-xs-4">
	<h2>Datos de la talla</h2>
	<form class="form" action="<?= base_url() ?>talla/editarPost" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$talla['id'];?>" >
		</div>
		<div class="form-group">
			<label for="idNombre">Nombre</label> <input  class="form-control" type="text" name="nombre"
			value="<?=$talla['nombre']; ?>" >
		</div>
	
		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
		
		
	</form>
	</div>
	</div>
</div>
