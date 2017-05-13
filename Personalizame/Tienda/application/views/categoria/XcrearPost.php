 
<?php if ($body['status']):?>
<div class="container alert alert-success col-xs-5">
  Categoría con nombre <strong><?=$body['nombre']?></strong> creada con éxito
</div>
<?php elseif (!$body['status']):?>
<div class="container alert alert-danger col-xs-5">
  <strong>ERROR</strong> Categoría con nombre <strong><?=$body['nombre']?></strong> ya existe
</div>
<?php endif;?>


<!-- 
<?php if ($body['status']==0):?>
<div data-growl="container"
	class="alert alert-success alert-dismissable growl-animated animated fadeInDown"
	role="alert" data-growl-position="top-right">
	<button type="button" class="close" data-growl="dismiss" data-animation-out="animated fadeOutUp">
		<span aria-hidden="true">×</span>
	</button>
	<span data-growl="icon"></span><span data-growl="title"> Fuente con nombre </span><span data-growl="message"><strong><?=$body['nombre']?></strong>
	 creada con éxito</span><a href="#" data-growl="url"></a>
</div>
<?php elseif ($body['status']==-1):?>
<div data-growl="container"
	class="alert alert-danger alert-dismissable growl-animated animated fadeInDown"
	role="alert" data-growl-position="top-right">
	<button type="button" class="close" data-growl="dismiss">
		<span aria-hidden="true">×</span><span class="sr-only">Close</span>
	</button>
	<span data-growl="icon"></span><span data-growl="title"><strong>ERROR: </strong></span>
	<span data-growl="message">Fuente con nombre <strong><?=$body['nombre']?></strong> ya existe.</span><a href="#" data-growl="url"></a>
</div>
<?php endif;?>



 -->