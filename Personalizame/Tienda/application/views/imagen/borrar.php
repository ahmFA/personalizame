<div class="container">
<div class="row">
<div class="col-xs-7">
<h2>Lista de imágenes</h2>
<form action="<?=base_url()?>articulo/borrarPost" method="post">
<table class="table table-bordered">
<tr><th></th><th>Nombre</th><th>Precio</th><th>Fecha baja</th></tr>
<?php foreach ($imagenes as $imagen):?>
	<tr>
	<td><input type="checkbox" name="idImagenes[]" value="<?=$imagen['id'] ?>"></td>
	<td><?=$imagen['nombre'] ?></td>
	<td><?=$imagen['precio'] ?></td>
	<td><?=$imagen['fecha_baja'] ?></td>
	</tr>
	<?php endforeach;?>
	</table>
	<input type="submit" value="Borrar">
</form>
</div>
</div>
</div>