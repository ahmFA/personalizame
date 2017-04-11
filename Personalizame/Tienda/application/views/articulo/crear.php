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
		
		<div class="form-group">
			<fieldset>
			<legend>Colores disponibles</legend> 
				
				<?php foreach ($colores as $color):?>
				<input type="checkbox" name="idColores[]" value="<?=$color['id'] ?>"> <?=$color['nombre'] ?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<div class="form-group">
			<fieldset>
			<legend>Tallas disponibles</legend> 
				
				<?php foreach ($tallas as $talla):?>
				<input type="checkbox" name="idTallas[]" value="<?=$talla['id'] ?>"> <?=$talla['nombre'] ?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<input type="submit"><br>
	</form>
</div>
