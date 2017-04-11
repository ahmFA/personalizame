<div class="container">
<div class="row">
<div class="col-xs-5">
<h2>Lista de colores</h2>
<form action="<?=base_url()?>color/borrarPost" method="post">
<table class="table table-bordered">
<tr><th></th><th>Nombre</th><th>Valor</th><</tr>
<?php foreach ($colores as $color):?>
	<tr>
	<td><input type="checkbox" name="idColores[]" value="<?=$color['id'] ?>"></td>
	<td><?=$color['nombre'] ?></td>
	<td><?=$color['valor'] ?></td>
	</tr>
	<?php endforeach;?>
	</table>
	<input type="submit" value="Borrar">
</form>
</div>
</div>
</div>