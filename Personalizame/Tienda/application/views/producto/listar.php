<div class="container">
	
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>producto/listarPost" method="post">
		
		<div class="form-group col-xs-4">
			<label for="idFiltroNombreProducto">Producto </label>  
			<input class="form-control" type="text" id="idFiltroNombreProducto" name="filtroNombreProducto" value="<?= $body['filtroNombreProducto'] ?>">
		</div>
		
		<div class="form-group col-xs-4">
			<label for="idFiltroUsuario">Usuario </label>  
			<input class="form-control" type="text" id="idFiltroUsuario" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
		</div>
		
		<div class="form-group col-xs-4">
			<br/>
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
		</div>
	</form>
</div>
<br/>

<div class="container">
	<?php if ($body['mensajeBanner'] != ""):?>
	<div id="idBanner" class="container alert alert-info col-xs-5">
  		<strong><?= $body['mensajeBanner'] ?></strong>
	</div>
	<?php endif;?>
	
	<div class="form-group col-xs-12">
		<h4>Listado de productos</h4>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Usuario</th>
			<th>Nombre Producto</th>
			<th>Artículo</th>
			<th>Color</th>
			<th>Talla</th>
			<th>Diseño F.</th>
			<th>Diseño B.</th>
			<th>Imagen</th>
			<th>Fecha</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['productos'] as $producto): ?>
		<tr>
			<td><?= $producto->usuario_id ?></td>
			<td><?= $producto->nombre_producto ?></td>
			<td><?= $producto->articulo->nombre_imagen ?></td>
			<td><?= $producto->color->nombre ?></td>
			<td><?= $producto->talla->nombre ?></td>
			<td>
			<?php foreach ($producto->sharedDisenoList as $diseno):?>
				<?php if($diseno['ubicacion']=="Frontal"){echo($diseno['nombre_diseno']);}?>
			<?php endforeach;?>
			</td>
			<td>
			<?php foreach ($producto->sharedDisenoList as $diseno):?>
				<?php if($diseno['ubicacion']=="Trasera"){echo($diseno['nombre_diseno']);}?>
			<?php endforeach;?>
			</td>
			<td><?= $producto->imagen_producto ?></td>
			<td><?= $producto->fecha_alta ?></td>
			<td>
				<form id="idFormEdit" action="<?=base_url()?>producto/modificarPost" method="post">
					<input type="hidden" name="id_producto" value="<?= $producto->id ?>">
					<input type="hidden" name="filtroNombreProducto" value="<?= $body['filtroNombreProducto'] ?>">
					<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
					<input type="hidden" name="mensajeBanner" value="Modificado el producto <?= $producto->nombre_producto ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<td>
				<form id="idFormBorrar" action="<?=base_url()?>producto/borrarPost" method="post">
					<input type="hidden" name="id_producto" value="<?= $producto->id ?>">
					<input type="hidden" name="filtroNombreProducto" value="<?= $body['filtroNombreProducto'] ?>">
					<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
					<input type="hidden" name="mensajeBanner" value="Borrado el producto <?= $producto->nombre_producto ?>">
					<button class="btn btn-danger" title="Borrar" onclick="function f() {document.getElementById('idFormBorrar').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div> 