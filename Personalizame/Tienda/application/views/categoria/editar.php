<div class="container">
<div class="row">
<div class="col-xs-4">
	<h2>Datos de la categoria</h2>
	<form class="form" action="<?= base_url() ?>categoria/editarPost" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$categoria['id'];?>" >
		</div>
		<div class="form-group">
			<label for="idNombre">Nombre</label> <input  class="form-control" type="text" name="nombre"
			value="<?=$categoria['nombre']; ?>" >
		</div>
	
		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
		
		
	</form>
	</div>
	</div>
</div>
