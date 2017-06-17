<table class="table table-striped table-bordered table-hover">
<tr class="text-center info">
	<th></th>
	<th>Artículo</th>
	<th>Precio</th>
	<th>Unid.</th>
	<th></th>
</tr>
<?php $contador = 1; ?>
<?php foreach ($body['lineasp'] as $lineap): ?> 
<tr class="text-center">
	<td><?= $contador ?></td>
	<td><?=$lineap['producto']->articulo->nombre." - ".$lineap['producto']->talla->nombre." - ".$lineap['producto']->color->nombre ?></td>
	<td ><?=$lineap['precio_unidad'] ?> €</td>
	<td><?=$lineap['unidades']?></td>
	<td><img src="../../../../img/productos/<?=$lineap['producto']->imagen_producto ?>" height="70" width="140"/></td>
</tr>	
<?php $contador++; ?>
<?php endforeach;?>
<tr><td colspan="5" class="text-right">* Gastos de envío 4.95€</td></tr>
</table>
