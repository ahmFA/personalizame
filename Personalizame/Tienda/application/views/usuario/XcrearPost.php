<?php if ($body['status']==0):?>
<div class="container alert alert-success col-xs-5">
  Usuario con nick <strong><?=$body['nick']?></strong> creado con éxito
</div>
<?php elseif ($body['status']==-1):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Cliente con nick <strong><?=$body['nick']?></strong> ya existente
</div>
<?php endif;?>