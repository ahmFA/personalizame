<div class="card">
	<div class="card-header">
		<h2>
			Listado de imágenes<small>Ensure that the data attribute
				[data-identifier="true"] is set on one column header.</small>
		</h2>
	</div>
	<?php if ($body['mensajeBanner'] != ""):?>
	<div id="idBanner" class="container alert alert-info col-xs-5">
  		<strong><?= $body['mensajeBanner'] ?></strong>
	</div>
	<?php endif;?>
	<div id="data-table-command-header"
		class="bootgrid-header container-fluid">
		<form class="row" id="idFormFiltro" role="form"
			action="<?= base_url() ?>imagen/listar" method="post">
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
				<th data-column-id="sender">Nombre imagen</th>
				<th data-column-id="sender">Comentario</th>
				<th data-column-id="sender">Disponible</th>
				<th data-column-id="sender">Descuento</th>
				<th data-column-id="sender">Fecha de alta</th>
				<th data-column-id="sender">Categorías</th>
				<th data-column-id="commands" data-formatter="commands"
					data-sortable="false">Acción</th>
			</tr>
		</thead>
		<tbody>
                                   <?php foreach ($imagenes as $imagen):?>
										<tr>
				<td><?=$imagen['id']?></td>
				<td><img class="media-object" src="../../../../img/imagenes/<?=$imagen['nombre_imagen'] ?>" alt="" width="80" height="80"></td>
				<td><?=$imagen['nombre']?></td>
				<td><?=$imagen['nombre_imagen']?></td>
				<td><?=$imagen['comentario']?></td>
				<td>
					<?php if($imagen['disponible'] == 1):?>
						<?="Sí" ?>
					<?php else:?>
						<?="No" ?>
					<?php endif;?>	
				</td>
				<td><?=$imagen['descuento']?></td>
				<td><?=$imagen['fecha_alta']?></td>
				<td><?php foreach ($imagen->sharedCategoriaList as $categoria):?>
					<?="{$categoria['nombre']}" ?>
					<?php endforeach;?>
				</td>
				
				<td class="text-left">
					<form id="idFormedit" action="<?=base_url();?>imagen/editar"
						method="post">
						<input type="hidden" name="idImagen" value="<?= $imagen -> id?>">
						<button title="Editar"
							class="btn btn-icon command-edit waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormedit').submit();}">
							<span class="zmdi zmdi-edit"></span>
						</button>
					</form>
					<form id="idFormdelete" action="<?=base_url();?>imagen/borrarPost"
						method="post">
						<input type="hidden" name="idImagenes[]" value="<?= $imagen -> id?>">
					<!--<button title="Borrar" class="btn btn-icon command-delete waves-effect waves-circle"
							data-row-id="<?= $categoria['id'] ?>">
							<span class="zmdi zmdi-delete"></span>
						</button>   -->
						<button title="Borrar" class="btn btn-icon command-delete waves-effect waves-circle"
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
 