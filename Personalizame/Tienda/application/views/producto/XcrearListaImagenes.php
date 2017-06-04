<?php foreach ($body['imagenes'] as $imagen): ?> 
	<img src="../../../../img/imagenes/<?= $imagen->imagen->nombre_imagen?>" data-url-relativa="../../../../img/imagenes/<?= $imagen->imagen->nombre_imagen?>" width="80px" height="80px" onClick="selectImagen(this.dataset.urlRelativa)"/>
<?php endforeach;?>