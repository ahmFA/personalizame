<div class="card">
	<div class="card-header">
		<h2>
			Listado de imágenes<small>Ensure that the data attribute
				[data-identifier="true"] is set on one column header.</small>
		</h2>
	</div>
	<div id="data-table-command-header"
		class="bootgrid-header container-fluid">
		<div class="row">
			<div class="col-sm-12 actionBar">
				<div class="search form-group">
					<div class="input-group">
						<span class="zmdi icon input-group-addon glyphicon-search"></span>
						<input type="text" class="search-field form-control"
							placeholder="Search">
					</div>
				</div>
				<div class="actions btn-group">
					<div class="dropdown btn-group">
						<button class="btn btn-default dropdown-toggle" type="button"
							data-toggle="dropdown">
							<span class="dropdown-text">10</span> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li class="active" aria-selected="true"><a data-action="10"
								class="dropdown-item dropdown-item-button">10</a></li>
							<li aria-selected="false"><a data-action="25"
								class="dropdown-item dropdown-item-button">25</a></li>
							<li aria-selected="false"><a data-action="50"
								class="dropdown-item dropdown-item-button">50</a></li>
							<li aria-selected="false"><a data-action="-1"
								class="dropdown-item dropdown-item-button">All</a></li>
						</ul>
					</div>
					<div class="dropdown btn-group">
						<button class="btn btn-default dropdown-toggle" type="button"
							data-toggle="dropdown">
							<span class="dropdown-text"><span
								class="zmdi icon zmdi-view-module"></span></span> <span
								class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<div class="checkbox">
									<label class="dropdown-item"> <input name="id" type="checkbox"
										value="1" class="dropdown-item-checkbox" checked="checked"> ID<i
										class="input-helper"></i>
									</label>
								</div>
							</li>
							<li><div class="checkbox">
									<label class="dropdown-item"><input name="sender"
										type="checkbox" value="1" class="dropdown-item-checkbox"
										checked="checked"> Sender<i class="input-helper"></i></label>
								</div></li>
							<li><div class="checkbox">
									<label class="dropdown-item"><input name="received"
										type="checkbox" value="1" class="dropdown-item-checkbox"
										checked="checked"> Received<i class="input-helper"></i></label>
								</div></li>
							<li><div class="checkbox">
									<label class="dropdown-item"><input name="commands"
										type="checkbox" value="1" class="dropdown-item-checkbox"
										checked="checked"> Commands<i class="input-helper"></i></label>
								</div></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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
					<form id="idFormedit" action="<?=base_url();?>imagen/borrarPost"
						method="post">
						<input type="hidden" name="idImagenes[]" value="<?= $imagen -> id?>">
						<button title="Borrar"
							class="btn btn-icon command-delete waves-effect waves-circle"
							data-row-id="<?= $categoria['id'] ?>">
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
 