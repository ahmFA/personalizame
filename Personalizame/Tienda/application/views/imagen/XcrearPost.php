<?php if ($body['status']):?>
<div class="container alert alert-success col-xs-5">
  Imagen con nombre <strong><?=$body['nombre']?></strong> creada con éxito
</div>
<?php elseif (!$body['status']):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Cambia el nombre de la imagen, <strong><?=$body['nombre_imagen']?></strong> ya existente.
</div>
<?php endif;?>