<?php foreach ($body['imagenes'] as $imagen): ?> 
	<img data-id-imagen="<?= $imagen->imagen->id?>" src="../../../../img/imagenes/<?= $imagen->imagen->nombre_imagen?>" data-url-relativa="../../../../img/imagenes/<?= $imagen->imagen->nombre_imagen?>" width="80px" height="80px" onClick="selectImagen(this.dataset.urlRelativa,this.dataset.idImagen)"/>
<?php endforeach;?>