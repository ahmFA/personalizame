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
			<td><?= $texto->idTamano ?></td>
			<td><?= $texto->idFuente ?></td>
			<td><?= $texto->idColor ?> </td>

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