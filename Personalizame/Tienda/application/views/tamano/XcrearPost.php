<?php if ($body['status']==0):?>
<div class="container alert alert-success col-xs-5">
  Tamaño con nombre <strong><?=$body['nombre']?></strong> creado con éxito
</div>
<?php elseif ($body['status']==-1):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Tamaño con nombre <strong><?=$body['nombre']?></strong> ya existe
</div>
<?php endif;?>