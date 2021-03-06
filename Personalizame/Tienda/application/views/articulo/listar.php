
<div class="card">
	<div class="card-header">
		<h2>
			Listado de Artículos<small>Introduce el filtro que desees para una búsqueda más precisa.</small>
		</h2>
	</div>
	<div id="data-table-command-header"
		class="bootgrid-header container-fluid">
		<form class="row" id="idFormFiltro" role="form"
			action="<?= base_url() ?>articulo/listar" method="post">
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idFiltroNombre">Nombre </label>
					<input type="text" class="search-field form-control"
						 id="idFiltroNombre" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idFiltroImagen">Nombre Imagen </label> 	 
					<input type="text" class="search-field form-control"
						 id="idFiltroImagen" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
				</div>
			</div>			 
			<div class="col-sm-4">
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
				
			</div>
		</form>
	</div>
	<table id="data-table-command"
		class="table table-striped table-vmiddle">
		<thead>
			<tr>
				<th data-column-id="id" data-type="numeric">ID</th>
				<th data-column-id="sender">Imagen</th>
				<th data-column-id="sender">Nombre</th>
				<th data-column-id="sender">Nombre Imagen</th>
				<th data-column-id="sender">Disponible</th>
				<th data-column-id="sender">Descuento</th>
				<th data-column-id="sender">Fecha de alta</th>
				<th data-column-id="sender">Tallas</th>
				<th data-column-id="sender">Colores</th>
				<th data-column-id="commands" data-formatter="commands"
					data-sortable="false">Acción</th>
			</tr>
		</thead>
		<tbody>
                                   <?php foreach ($articulos as $articulo):?>
										<tr>
				<td><?=$articulo['id']?></td>
				<td><img class="media-object" src="../../../../img/articulos/<?=$articulo['nombre_imagen'] ?>" alt="" width="80" height="80"></td>
				<td><?=$articulo['nombre']?></td>
				<td><?=$articulo['nombre_imagen']?></td>
				<td>
					<?php if($articulo['disponible'] == 1):?>
						<?="Sí" ?>
					<?php else:?>
						<?="No" ?>
					<?php endif;?>	
				</td>
				<td><?=$articulo['descuento']?></td>
				<td><?=$articulo['fecha_alta']?></td>
				<td><?php foreach ($articulo->sharedTallaList as $talla):?>
					<?="{$talla['nombre']}" ?>
					<?php endforeach;?>
				</td>
				<td><?php foreach ($articulo->sharedColorList as $color):?>
					<?="{$color['nombre']}" ?>
					<?php endforeach;?>
				</td>
				
				<td class="text-left">
					<form id="idFormedit" action="<?=base_url();?>articulo/editar"
						method="post">
						<input type="hidden" name="idArticulo" value="<?= $articulo -> id?>">
						<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
						<input type="hidden" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
						<input type="hidden" name="mensajeBanner" value="Modificado el artículo <?= $articulo->nombre ?>">
						<button
							class="btn btn-icon command-edit waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormedit').submit();}">
							<span class="zmdi zmdi-edit"></span>
						</button>
					</form>
					<form id="idFormdelete" action="<?=base_url();?>articulo/borrarPost"
						method="post">
						<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
						<input type="hidden" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
						<input type="hidden" name="mensajeBanner" value="Borrado el artículo <?= $articulo->nombre ?>">
						<input type="hidden" name="idArticulos[]" value="<?= $articulo -> id?>">
				<!--		<button
							class="btn btn-icon command-delete waves-effect waves-circle"
							data-row-id="<?= $articulo['id'] ?>">
							<span class="zmdi zmdi-delete"></span>
						</button>   -->
						<button
							class="btn btn-icon command-delete waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormdelete').submit();}">
							<span class="zmdi zmdi-delete"></span>
						</button>
					</form>


				</td>
			</tr>	
									<?php endforeach;?> 
                               
                            </tbody>


	</table>
	<div id="data-table-basic-footer"
		class="bootgrid-footer container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<ul class="pagination">
					<li class="prev <?=$previo ?>" aria-disabled="true"><a data-page="prev"
						class="button" href="?pagina=<?=$paginaAnt ?>"><i class="zmdi zmdi-chevron-left"></i></a></li>
					 <?=$botones ?>
					<li class="next <?=$next ?>" aria-disabled="false"><a data-page="next"
						class="button" href="?pagina=<?=$paginaSig ?>"> <i class="zmdi zmdi-chevron-right"></i></a></li>
					
				</ul>
			</div>
		</div>
	</div>

</div>
 