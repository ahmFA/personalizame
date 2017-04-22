<div class="container">
<div class="row">
<div class="col-xs-6">
	<h2>Datos del artículo</h2>
	<form class="form" action="<?= base_url() ?>imagen/editarPost" enctype="multipart/form-data" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$imagen['id'];?>" >
		</div>
		
		<div class="form-group">
			<label for="idPrecio">Precio</label> <input  class="form-control" type="number" id="idPrecio"
				name="precio" value="<?=$imagen['precio'];?>" >
		</div>
		
		<div class="form-group">
			<label for="comentario">Comentario</label> <input  class="form-control" type="text" id="comentario"
				name="comentario" value="<?=$imagen['comentario'];?>" >
		</div>
		
		<div class="form-group">
			<label for="descuento">Descuento</label> <input  class="form-control" type="number" id="descuento"
				name="descuento" value="<?=$imagen['descuento'];?>" >
		</div>

		<img src="../../../../img/imagenes/<?=$imagen['nombre'] ?>" width="100" height="100">
		
		<div class="form-group">
			<input type="file" name="nueva">
		</div>
		
		<div class="form-group">
			<label>Disponible</label>
			<?php if($imagen['disponible'] == 'si'):?>
			 <input type="radio" name="disponible" checked="checked" value="si">Sí
			 <input type="radio" name="disponible" value="no" >No
			<?php else :?> 
			<input type="radio" name="disponible" value="si" >Sí
			 <input type="radio" name="disponible" checked="checked" value="no" >No
			<?php endif;?> 
		</div>

		<div class="form-group">
			<fieldset>
			<legend>Categoría</legend> 
				<select name="id_categoria">
					<?php foreach ($categorias as $categoria):?>
							<?php if($categoria['id'] == $imagen['categoria_id']):?>
								<option value="<?=$categoria['id']; ?>" selected="selected"> <?=$categoria['nombre']; ?></option>
							<?php else :?>
								<option value="<?=$categoria['id']; ?>"> <?=$categoria['nombre']; ?></option>
						<?php endif;?>
					<?php endforeach;?>
				</select>
			</fieldset>
		</div>
		
		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
			
	</form>
	</div>
	</div>
</div>
