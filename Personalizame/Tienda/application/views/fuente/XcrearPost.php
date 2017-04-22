<?php if ($body['status']==0):?>
<div class="container alert alert-success col-xs-5">
  Fuente con nombre <strong><?=$body['nombre']?></strong> creada con éxito
</div>
<?php elseif ($body['status']==-1):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Fuente con nombre <strong><?=$body['nombre']?></strong> ya existe
</div>
<?php endif;?>