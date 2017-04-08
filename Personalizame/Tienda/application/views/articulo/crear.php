<div class="container">
	<form action="<?=base_url() ?>articulo/crearPost" enctype="multipart/form-data" method="post">
		<label>Nombre: </label>
		<input type="text" id="nombre" name="nombre"><br>
		<label>Precio: </label>
		<input type="text" id="precio" name="precio"><br>
		<input type="file" name="imagen"><br>
		<label>Disponible: </label>
		<input type="radio" name="disponible" value="si" checked="checked">Sí<br>
		<input type="radio" name="disponible" value="no">No<br>
		<input type="submit"><br>
	</form>
	<input type="text" value="<?= isset($ruta)? $ruta : '' ?>">
</div>
