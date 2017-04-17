<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Categorias</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Editar</th></tr>
		<?php foreach ($categorias as $categoria):?>
		<tr>
			<td><?= $categoria['nombre']?></td>
			<td><a href="<?=base_url() ?>categoria/editar?idCategoria=<?=$categoria['id'] ?>">Editar</a></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
</div>
</div>
</div>
