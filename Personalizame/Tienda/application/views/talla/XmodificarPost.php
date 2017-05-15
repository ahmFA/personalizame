<?php if ($body['status']):?>
<div class="container alert alert-success col-xs-7">
  Talla <strong><?=$body['nombre']?></strong> modificada con éxito
</div>
<?php elseif (!$body['status']):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Talla <strong><?=$body['nombre']?></strong> ya existente
</div>
<?php endif;?>