<?php if($body['status']):?>
<div class="container alert alert-success col-xs-12">
	Se ha registro correctamente
</div>
<?php else:?>
<div class="container alert alert-danger col-xs-12">
  <strong>ERROR:</strong> Usuario o email ya existentes
</div>
<?php endif;?>