<div class="container">
	<form action="<?=base_url() ?>imagen/crearPost" enctype="multipart/form-data" method="post">
	<input type="hidden" id="id_usuario" name="id_usuario" value="1"><br>
		<label>Foto: </label>
		<input type="file" name="imagen"><br>
		<label>Comentario: </label>
		<input type="text" id="comentario" name="comentario"><br>
		<label>Descuento: </label>
		<input type="text" id="descuento" name="descuento"><br>
		<label>Disponible: </label>
		<input type="radio" name="disponible" value="si" checked="checked">Sí<br>
		<input type="radio" name="disponible" value="no">No<br>
		
		<div class="form-group">
			<fieldset>
			<legend>Categorías disponibles</legend> 
				<?php $contador = 0;?>
				<?php foreach ($categorias as $categoria):?>
					<?php if($contador == 0):?>
						<input type="radio" name="id_categoria" checked="checked" value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?>
					<?php else:?>
						<input type="radio" name="id_categoria" value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?>
					<?php endif;?>	
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<input type="submit"><br>
	</form>
</div>
