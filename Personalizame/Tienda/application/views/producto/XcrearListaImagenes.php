<?php if ($body['tipo']=="imagenes_comunes"):?>
	<?php foreach ($body['imagenes'] as $imagen): ?> 
	<img class="btn btn-default" data-id-imagen="<?= $imagen->imagen->id?>" src="../../../../img/imagenes/<?= $imagen->imagen->nombre_imagen?>" data-url-relativa="../../../../img/imagenes/<?= $imagen->imagen->nombre_imagen?>" width="80px" height="80px" onClick="selectImagen(this.dataset.urlRelativa,this.dataset.idImagen)"/>
	<?php endforeach;?>
<?php elseif ($body['tipo']=="imagenes_propias"):?>
	<?php foreach ($body['imagenes'] as $imagen): ?> 
	<img class="btn btn-default" data-id-imagen="<?= $imagen->id?>" src="../../../../img/imagenes/<?= $imagen->nombre_imagen?>" data-url-relativa="../../../../img/imagenes/<?= $imagen->nombre_imagen?>" width="80px" height="80px" onClick="selectImagen(this.dataset.urlRelativa,this.dataset.idImagen)"/>
	<?php endforeach;?>
<?php endif;?>