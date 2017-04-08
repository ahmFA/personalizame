<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Artículos</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Precio</th><th>Nombre Imagen</th><th>Disponible</th></tr>
		<?php foreach ($articulos as $art):?>
		<tr>
			<td><?= $art['nombre']?></td>
			<td><?=$art['precio'] ?></td>
			<td><?=$art['imagen'] ?></td>
			<td><?=$art['disponible'] ?></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
</div>
</div>
</div>
