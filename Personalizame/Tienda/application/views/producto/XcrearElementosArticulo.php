<div>
	<label>Tamaños disponibles</label>
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
			<input type="radio" id="id_color_base" name="id_color_base" data-valor="<?= $color->color->valor ?>" value="<?= $color->color_id ?>" checked="checked" onchange="modificarColorDeFondo()">
			<i class="input-helper"></i>
			<?= $color->color->nombre ?>&nbsp; &nbsp; 
		</label>
		<?php endforeach;?>
	</div>
	
	<img id="articulo-front" class="hidden" src="../../../../img/articulos/<?=$body['articulo']->nombre_imagen?>" data-url-relativa="../../../../img/articulos/<?=$body['articulo']->nombre_imagen?>"/>
	<img id="articulo-back" class="hidden" src="../../../../img/articulos/<?=$body['articulo']->nombre_imagen?>" data-url-relativa="../../../../img/articulos/<?=$body['articulo']->nombre_imagen?>"/>
	
</div>