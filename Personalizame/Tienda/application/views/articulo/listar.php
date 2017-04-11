<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Art�culos</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Precio</th><th>Nombre Imagen</th><th>Disponible</th><th>Colores</th><th>Tallas</th><th>Editar</th></tr>
		<?php foreach ($articulos as $art):?>
		<tr>
			<td><?= $art['nombre']?></td>
			<td><?=$art['precio'] ?></td>
			<td><?=$art['imagen'] ?></td>
			<td><?=$art['disponible'] ?></td>
			<td><?php foreach ($art->sharedColorList as $color):?>
				<?="{$color['nombre']} " ?>
				<?php endforeach;?>
			</td>
			<td><?php foreach ($art->sharedTallaList as $talla):?>
				<?="{$talla['nombre']} " ?>
				<?php endforeach;?>
			</td>
			<td><a href="<?=base_url() ?>articulo/editar?idArticulo=<?=$art['id'] ?>">Editar</a></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
</div>
</div>
</div>
