
<div class="card">
	<div class="card-header">
		<h2>
			Listado de Textos<small>Introduce el filtro que desees.</small>
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
			action="<?= base_url() ?>texto/listarPost" method="post">
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idFiltroDatosTexto">Texto </label>
					<input type="text" class="search-field form-control"
						 id="idFiltroDatosTexto" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
					
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idFiltroUsuario">Usuario </label> 	 
					<input type="text" class="search-field form-control"
						 id="idFiltroUsuario" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
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
				<th data-column-id="sender">Usuario</th>
				<th data-column-id="sender">Texto</th>
				<th data-column-id="sender">Tamaño</th>
				<th data-column-id="sender">Fuente</th>
				<th data-column-id="sender">Color</th>
				<th data-column-id="commands" data-formatter="commands"
					data-sortable="false">Acción</th>
			</tr>
		</thead>
		<tbody>
            <?php foreach ($textos as $texto):?>
										<tr>
			<td><?= $texto->usuario_id ?></td>
			<td><?= $texto->datos_texto ?></td>
			<td><?= $texto->tamano_fuente ?></td>
			<td><?= $texto->fuente->nombre ?></td>
			<td><?= $texto->color->nombre ?> </td>

				
				<td class="text-left">
					<form id="idFormedit" action="<?=base_url();?>texto/modificarPost"
						method="post">
						<input type="hidden" name="id_texto" value="<?= $texto->id ?>">
						<input type="hidden" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
						<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
						<input type="hidden" name="mensajeBanner" value="Modificado el texto <?= $texto->datos_texto ?>">
						<button
							class="btn btn-icon command-edit waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormedit').submit();}">
							<span class="zmdi zmdi-edit"></span>
						</button>
					</form>
					<form id="idFormedit" action="<?=base_url();?>texto/borrarPost"
						method="post">
						<input type="hidden" name="idTextos[]" value="<?= $texto->id ?>">
						<input type="hidden" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
						<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
						<input type="hidden" name="mensajeBanner" value="Borrado el texto <?= $texto->datos_texto ?>">
						<button
							class="btn btn-icon command-delete waves-effect waves-circle"
							data-row-id="<?= $texto['id'] ?>">
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
						class="button" href="?pagina=<?=$paginaAnt?>&filtroDatosTexto=<?=$body['filtroDatosTexto']?>&filtroUsuario=<?= $body['filtroUsuario'] ?>"><i class="zmdi zmdi-chevron-left"></i></a></li>
					 <?=$botones ?>
					<li class="next <?=$next ?>" aria-disabled="false"><a data-page="next"
						class="button" href="?pagina=<?=$paginaSig ?>&filtroDatosTexto=<?=$body['filtroDatosTexto']?>&filtroUsuario=<?= $body['filtroUsuario'] ?>">
						 <i class="zmdi zmdi-chevron-right"></i></a></li>
					
				</ul>
			</div>
		</div>
	</div>

</div>







<!-- ********ANTIGUO************* -->

<!-- 
<div class="container">
	
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>texto/listarPost" method="post">
		
		<div class="form-group col-xs-4">
			<label for="idFiltroDatosTexto">Texto </label>  
			<input class="form-control" type="text" id="idFiltroDatosTexto" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
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
		<h4>Listado de textos</h4>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Usuario</th>
			<th>Texto</th>
			<th>Tamaño</th>
			<th>Fuente</th>
			<th>Color</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['textos'] as $texto): ?>
		<tr>
			<td><?= $texto->idUsuario ?></td>
			<td><?= $texto->datosTexto ?></td>
			<td><?= $texto->tamano->nombre ?></td>
			<td><?= $texto->fuente->nombre ?></td>
			<td><?= $texto->color->nombre ?> </td>

			<td>
				<form id="idFormEdit" action="<?=base_url()?>texto/modificarPost" method="post">
					<input type="hidden" name="idTexto" value="<?= $texto->id ?>">
					<input type="hidden" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
					<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
					<input type="hidden" name="mensajeBanner" value="Modificado el texto <?= $texto->datosTexto ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<td>
				<form id="idFormBorrar" action="<?=base_url()?>texto/borrarPost" method="post">
					<input type="hidden" name="idTexto" value="<?= $texto->id ?>">
					<input type="hidden" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
					<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
					<input type="hidden" name="mensajeBanner" value="Borrado el texto <?= $texto->datosTexto ?>">
					<button class="btn btn-danger" title="Borrar" onclick="function f() {document.getElementById('idFormBorrar').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>

 --> 