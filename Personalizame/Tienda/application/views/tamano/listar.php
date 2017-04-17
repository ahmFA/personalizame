
<div class="container">
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>tamano/listarPost" method="post">
		
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
	<div class="form-group col-xs-12">
		<h4>Listado de tamaños</h4>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['tamanos'] as $tamano): ?>
		<tr>
			<td><?= $tamano->nombre ?></td>
			<td>
				<form id="idFormEdit" action="<?=base_url()?>tamano/modificarPost" method="post">
					<input type="hidden" name="idTamano" value="<?= $tamano->id ?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<td>
				<form id="idFormBorrar" action="<?=base_url()?>tamano/borrarPost" method="post">
					<input type="hidden" name="idTamano" value="<?= $tamano->id?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<button class="btn btn-danger" title="Borrar" onclick="function f() {document.getElementById('idFormAlta').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div> 