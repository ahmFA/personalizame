<div class="container">
<div class="row">
<div class="col-xs-5">
<h2>Lista de categorias</h2>
<form action="<?=base_url()?>categoria/borrarPost" method="post">
<table class="table table-bordered">
<tr><th></th><th>Nombre</th></tr>
<?php foreach ($categorias as $categoria):?>
	<tr>
	<td><input type="checkbox" name="idCategorias[]" value="<?=$categoria['id'] ?>"></td>
	<td><?=$categoria['nombre'] ?></td>
	</tr>
	<?php endforeach;?>
	</table>
	<input type="submit" value="Borrar">
</form>
</div>
</div>
</div>