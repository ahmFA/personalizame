<div>
	<label>Tallas disponibles</label>
	<div class="radio m-b-15">
		<?php foreach ($body['tallas'] as $talla): ?>
		<label>
			<input type="radio" name="id_talla" value="<?= $talla->talla_id ?>" checked="checked">
			<i class="input-helper"></i>
			<?= $talla->talla->nombre ?>&nbsp; &nbsp; 
		</label>
		<?php endforeach;?>
	</div>

	<label>Colores disponibles</label>
	<div class="radio m-b-15">
		<?php foreach ($body['colores'] as $color): ?>
		<label>
			<input type="radio" name="id_color_base" value="<?= $color->color_id ?>" checked="checked">
			<i class="input-helper"></i>
			<?= $color->color->nombre ?>&nbsp; &nbsp; 
		</label>
		<?php endforeach;?>
	</div>
</div>