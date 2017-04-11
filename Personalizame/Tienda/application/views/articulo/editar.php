<div class="container">
<div class="row">
<div class="col-xs-6">
	<h2>Datos del artículo</h2>
	<form class="form" action="<?= base_url() ?>articulo/editarPost" enctype="multipart/form-data" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$articulo['id'];?>" >
		</div>
		<div class="form-group">
			<label for="idNombre">Nombre</label> <input  class="form-control" type="text" name="nombre"
			value="<?=$articulo['nombre']; ?>" >
		</div>
		
		<div class="form-group">
			<label for="idPrecio">Precio</label> <input  class="form-control" type="text" id="idPrecio"
				name="precio" value="<?=$articulo['precio'];?>" >
		</div>

		<img src="../../../../img/articulos/<?=$articulo['imagen'] ?>" width="100" height="100">
		
		<div class="form-group">
			<input type="file" name="nueva">
		</div>
		
		<div class="form-group">
			<label>Disponible</label>
			<?php if($articulo['disponible'] == 'si'):?>
			 <input type="radio" name="disponible" checked="checked" value="si">Sí
			 <input type="radio" name="disponible" value="no" >No
			<?php else :?> 
			<input type="radio" name="disponible" value="si" >Sí
			 <input type="radio" name="disponible" checked="checked" value="no" >No
			<?php endif;?> 
		</div>

		<div class="form-group">
			<fieldset>
			<legend>Colores del artículo</legend> 
				
				<?php foreach ($colores as $color):?>
					<?php $mismo=false; ?>
					<?php foreach ($articulo->sharedColorList as $micolor):?>
						<?php if($micolor['id'] == $color['id']):?>
							<?php $mismo=true; ?>
							<input type="checkbox" name="idColores[]" value="<?=$color['id']; ?>" checked="checked"> <?=$color['nombre']; ?>
						<?php endif;?>
					<?php endforeach;?>
					<?php if(!$mismo):?>
						<input type="checkbox" name="idColores[]" value="<?=$color['id']; ?>"> <?=$color['nombre']; ?>
					<?php endif;?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<div class="form-group">
			<fieldset>
			<legend>Tallas del artículoe</legend> 
				
				<?php foreach ($tallas as $talla):?>
					<?php $mismot=false; ?>
					<?php foreach ($articulo->sharedTallaList as $mitalla):?>
						<?php if($mitalla['id'] == $talla['id']):?>
							<?php $mismot=true; ?>
							<input type="checkbox" name="idTallas[]" value="<?=$talla['id']; ?>" checked="checked"> <?=$talla['nombre']; ?>
						<?php endif;?>
					<?php endforeach;?>
					<?php if(!$mismot):?>
						<input type="checkbox" name="idTallas[]" value="<?=$talla['id']; ?>"> <?=$talla['nombre']; ?>
					<?php endif;?>
				<?php endforeach;?>
			</fieldset>
		</div>	

		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
		
		
	</form>
	</div>
	</div>
</div>
