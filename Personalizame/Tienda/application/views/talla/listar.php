<div class="card">
	<div class="card-header">
		<h2>
			Listado de tallas<small>Introduce el filtro que desees para una búsqueda más precisa.</small>
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
			action="<?= base_url() ?>talla/listar" method="post">
			<div class="col-sm-3">
				<div class="form-group fg-line">

					<input type="text" class="search-field form-control"
						 id="idFiltroNombre" name="filtroNombre" value="<?= $body['filtroNombre']?>" placeholder="Buscar">
				</div>
			</div>
			
			<div class="col-sm-4">
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
				
			</div>
		</form>

	</div>
	<div class="col-offset-2 col-sm-8">
	<table id="data-table-command"
		class="table table-striped table-vmiddle">
		<thead>
			<tr>
				<th data-column-id="id" data-type="numeric">ID</th>
				<th data-column-id="sender">Nombre</th>
				<th data-column-id="commands" data-formatter="commands"
					data-sortable="false">Acción</th>
			</tr>
		</thead>
		<tbody>
                                   <?php foreach ($tallas as $talla):?>
										<tr>
				<td><?=$talla['id']?></td>
				<td><?=$talla['nombre']?></td>
				
				<td class="text-left">
					<form id="idFormedit" action="<?=base_url();?>talla/editar"
						method="post">
						<input type="hidden" name="idTalla" value="<?= $talla -> id?>">
						<button
							class="btn btn-icon command-edit waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormedit').submit();}">
							<span class="zmdi zmdi-edit"></span>
						</button>
					</form>
					<form id="idFormedit" action="<?=base_url();?>talla/borrarPost"
						method="post">
						<input type="hidden" name="idTallas[]" value="<?= $talla -> id?>">
						<button
							class="btn btn-icon command-delete waves-effect waves-circle"
							data-row-id="<?= $talla['id'] ?>">
							<span class="zmdi zmdi-delete"></span>
						</button>
					</form>


				</td>
			</tr>	
									<?php endforeach;?> 
                               
                            </tbody>


	</table>
	</div>
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
