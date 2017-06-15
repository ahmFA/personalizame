
<div class="card">
	<div class="card-header">
		<h2>
			Listado de Artículos<small>Introduce el filtro que desees para una búsqueda más precisa.</small>
		</h2>
	</div>
	
	<div id="data-table-command-header"
		class="bootgrid-header container-fluid">
		<form class="row" id="idFormFiltro" role="form"
			action="<?= base_url() ?>articulo/borrar" method="post">
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
	<form role="form" method="post"
					action="<?= base_url() ?>articulo/borrarPost">
					<input type="hidden" name="vuelveBorrar" id="vuelveBorrar" value="1">
	<table id="data-table-command"
		class="table table-striped table-vmiddle">
		<thead>
			<tr>
				<th class="select-cell"><div class="checkbox"><label><input name="select" type="checkbox" class="select-box" value="all" {{ctx.checked}}=""><i class="input-helper"></i></label></div></th>
				<th data-column-id="id" data-type="numeric">ID</th>
				<th data-column-id="sender">Nombre</th>
				<th data-column-id="sender">Imagen</th>
				<th data-column-id="sender">Nombre Imagen</th>
				<th data-column-id="sender">Disponible</th>
				<th data-column-id="sender">Precio</th>
				<th data-column-id="sender">Coste</th>
				<th data-column-id="sender">Descuento</th>
				<th data-column-id="sender">Fecha alta</th>
			</tr>
		</thead>
		<tbody>
		
                                   <?php foreach ($articulos as $articulo):?>
										<tr>
				<td class="select-cell" style="{{ctx.style}}">
					<div class="checkbox">
						<label><input type="checkbox" name="idArticulos[]" class="select-box" value="<?=$articulo['id']?>"><i class="input-helper"></i></label>
					</div>
				</td>
				<td><?=$articulo['id']?></td>
				<td><img class="media-object" src="../../../../img/articulos/<?=$articulo['nombre_imagen'] ?>" alt="" width="80" height="80"></td>
				<td><?=$articulo['nombre']?></td>
				<td><?=$articulo['nombreImagen']?></td>
				<td>
					<?php if($articulo['disponible'] == 1):?>
						<?="Sí" ?>
					<?php else:?>
						<?="No" ?>
					<?php endif;?>	
				</td>
				<td><?=$articulo['precio']?></td>
				<td><?=$articulo['coste']?></td>
				<td><?=$articulo['descuento']?></td>
				<td><?=$articulo['fecha_alta']?></td>
				
			</tr>	
									<?php endforeach;?> 
                               
                            </tbody>


	</table>
<div id="data-table-basic-footer">
	<div class="row container-fluid">
		<div class="col-sm-3">
			<button type="submit" class="btn btn-danger btn-sm m-t-10">Borrar</button>
		</div>
	</div>
	</div>
	</form>
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
 