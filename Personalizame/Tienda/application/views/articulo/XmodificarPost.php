<?php if ($body['status']):?>
<div class="container alert alert-success col-xs-7">
  Artículo <strong><?=$body['nombre']?></strong> modificado con éxito
</div>
<?php elseif (!$body['status']):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Artículo <strong><?=$body['nombre']?></strong> ya existente
</div>
<?php endif;?>