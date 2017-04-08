<div class="container">
<div class="row">
<div class="col-xs-7">
<h2>Lista de artículos</h2>
<form action="<?=base_url()?>articulo/borrarPost" method="post">
<table class="table table-bordered">
<tr><th></th><th>Nombre</th><th>Precio</th><th>Imagen</th></tr>
<?php foreach ($articulos as $art):?>
	<tr>
	<td><input type="checkbox" name="idArticulos[]" value="<?=$art['id'] ?>"></td>
	<td><?=$art['nombre'] ?></td>
	<td><?=$art['precio'] ?></td>
	<td><?=$art['imagen'] ?></td>
	</tr>
	<?php endforeach;?>
	</table>
	<input type="submit" value="Borrar">
</form>
</div>
</div>
</div>