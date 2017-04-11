<div class="container">
<div class="row">
<div class="col-xs-5">
<h2>Lista de tallas</h2>
<form action="<?=base_url()?>talla/borrarPost" method="post">
<table class="table table-bordered">
<tr><th></th><th>Nombre</th></tr>
<?php foreach ($tallas as $talla):?>
	<tr>
	<td><input type="checkbox" name="idTallas[]" value="<?=$talla['id'] ?>"></td>
	<td><?=$talla['nombre'] ?></td>
	</tr>
	<?php endforeach;?>
	</table>
	<input type="submit" value="Borrar">
</form>
</div>
</div>
</div>