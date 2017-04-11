<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Artículos</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Valor</th><th>Editar</th></tr>
		<?php foreach ($colores as $color):?>
		<tr>
			<td><?= $color['nombre']?></td>
			<td><?=$color['valor'] ?></td>
			<td><a href="<?=base_url() ?>color/editar?idColor=<?=$color['id'] ?>">Editar</a></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
</div>
</div>
</div>
