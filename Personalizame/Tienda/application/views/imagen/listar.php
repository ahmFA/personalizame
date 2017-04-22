<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Art�culos</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Precio</th><th>Categoría</th><th>Disponible</th><th>Usuario</th><th>Fecha Alta</th></tr>
		<?php foreach ($imagenes as $imagen):?>
		<tr>
			<td><?= $imagen['nombre']?></td>
			<td><?=$imagen['precio'] ?></td>
			<td><?=$imagen['categoria']['nombre'] ?></td>
			<td><?=$imagen['disponible'] ?></td>
			<td><?=$imagen['usuario_id'] ?></td>
			<td><?=$imagen['fecha_alta'] ?></td>
			
			<td><a href="<?=base_url() ?>imagen/editar?idImagen=<?=$imagen['id'] ?>">Editar</a></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
	
</div>
</div>
</div>
