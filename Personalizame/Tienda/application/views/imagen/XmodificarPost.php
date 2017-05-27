<?php if ($body['status']):?>
<div class="container alert alert-success col-xs-7">
  Imagen con nombre <strong><?=$body['nombre']?></strong> modificada con éxito
</div>
<?php elseif (!$body['status']):?>
<div class="container alert alert-danger col-xs-7">
  <strong>ERROR</strong> El nombre o la imagen ya existe.
</div>
<?php endif;?>