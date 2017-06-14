
<div class="card">
	<div class="card-header">
		<h2>
			Listado de Fuentes<small>Introduce el filtro que desees para una búsqueda más precisa.</small>
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
			action="<?= base_url() ?>fuente/listarPost" method="post">
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
                                   <?php foreach ($fuentes as $fuente):?>
										<tr>
				<td><?=$fuente['id']?></td>
				<td><?=$fuente['nombre']?></td>
				
				<td class="text-left">
					<form id="idFormedit" action="<?=base_url();?>fuente/modificarPost"
						method="post">
						<input type="hidden" name="idFuente" value="<?= $fuente -> id?>">
						<button
							class="btn btn-icon command-edit waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormedit').submit();}">
							<span class="zmdi zmdi-edit"></span>
						</button>
					</form>
					<form id="idFormedit" action="<?=base_url();?>fuente/borrarPost"
						method="post">
						<input type="hidden" name="idFuentes[]" value="<?= $fuente -> id?>">
						<button
							class="btn btn-icon command-delete waves-effect waves-circle"
							data-row-id="<?= $fuente['id'] ?>">
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
						class="button" href="?pagina=<?=$paginaAnt?>&filtroNombre=<?=$body['filtroNombre']?>"><i class="zmdi zmdi-chevron-left"></i></a></li>
					 <?=$botones ?>
					<li class="next <?=$next ?>" aria-disabled="false"><a data-page="next"
						class="button" href="?pagina=<?=$paginaSig ?>&filtroNombre=<?=$body['filtroNombre']?>"> <i class="zmdi zmdi-chevron-right"></i></a></li>
					
				</ul>
			</div>
		</div>
	</div>

</div>





<!-- ********************************************************************************************** -->
<!-- ********************************************************************************************** -->
<!-- ********************************************************************************************** -->
<!-- ********************************************************************************************** -->
<!-- ********************************************************************************************** -->
<!-- ********************************************************************************************** -->


<!-- 
<div class="container">
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>fuente/listarPost" method="post">
		
		<div class="form-group col-xs-3">
			<label for="idFiltroNombre">Nombre </label>  
			<input class="form-control" type="text" id="idFiltroNombre" name="filtroNombre" value="<?= $body['filtroNombre']?>">
		</div>

		<div class="form-group col-xs-3">
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
		<h4>Listado de fuentes</h4>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['fuentes'] as $fuente): ?>
		<tr>
			<td><?= $fuente->nombre ?></td>
			<td>
				<form id="idFormEdit" action="<?=base_url()?>fuente/modificarPost" method="post">
					<input type="hidden" name="idFuente" value="<?= $fuente->id ?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<input type="hidden" name="mensajeBanner" value="Modificada la fuente <?= $fuente->nombre ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<td>
				<form id="idFormBorrar" action="<?=base_url()?>fuente/borrarPost" method="post">
					<input type="hidden" name="idFuente" value="<?= $fuente->id?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<input type="hidden" name="mensajeBanner" value="Eliminada la fuente <?= $fuente->nombre ?>">
					<button class="btn btn-danger" title="Borrar" onclick="function f() {document.getElementById('idFormAlta').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>


 --> 