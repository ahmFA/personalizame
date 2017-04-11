<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Tallas</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Editar</th></tr>
		<?php foreach ($tallas as $talla):?>
		<tr>
			<td><?= $talla['nombre']?></td>
			<td><a href="<?=base_url() ?>talla/editar?idTalla=<?=$talla['id'] ?>">Editar</a></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
</div>
</div>
</div>
