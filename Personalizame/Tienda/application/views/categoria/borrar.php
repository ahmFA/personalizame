<div class="card">
	<div class="card-header">
		<h2>
			Listado de categorias<small>Introduce el filtro que desees para una búsqueda más precisa.</small>
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
			action="<?= base_url() ?>categoria/borrar" method="post">
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
	<form role="form" method="post"
					action="<?= base_url() ?>categoria/borrarPost">
					<input type="hidden" name="vuelveBorrar" id="vuelveBorrar" value="1">
	<table id="data-table-command"
		class="table table-striped table-vmiddle">
		<thead>
			<tr>
				<th></th>
				<th data-column-id="id" data-type="numeric">ID</th>
				<th data-column-id="sender">Nombre</th>
			</tr>
		</thead>
		<tbody>
		
                                   <?php foreach ($categorias as $categoria):?>
										<tr>
				<td class="select-cell" style="{{ctx.style}}">
					<div class="checkbox">
						<label><input type="checkbox" name="idCategorias[]" class="select-box" value="<?=$categoria['id']?>"><i class="input-helper"></i></label>
					</div>
				</td>
				<td><?=$categoria['id']?></td>
				<td><?=$categoria['nombre']?></td>
				
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
 