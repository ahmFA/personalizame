<div class="container">
<div class="row">
<div class="col-xs-6">
	<h2>Datos del color</h2>
	<form class="form" action="<?= base_url() ?>color/editarPost" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$color['id'];?>" >
		</div>
		<div class="form-group">
			<label for="idNombre">Nombre</label> <input  class="form-control" type="text" name="nombre"
			value="<?=$color['nombre']; ?>" >
		</div>
		
		<div class="form-group">
			<label for="idValor">Valor</label> <input  class="form-control" type="text" id="idValor"
				name="valor" value="<?=$color['valor'];?>" >
		</div>

		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
		
		
	</form>
	</div>
	</div>
</div>
