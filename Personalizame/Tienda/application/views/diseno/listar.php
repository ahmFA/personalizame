<div class="container">
	
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>diseno/listarPost" method="post">
		
		<div class="form-group col-xs-4">
			<label for="idFiltroNombreDiseno">Diseño </label>  
			<input class="form-control" type="text" id="idFiltroNombreDiseno" name="filtroNombreDiseno" value="<?= $body['filtroNombreDiseno'] ?>">
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
		<h4>Listado de diseños</h4>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Usuario</th>
			<th>Nombre Diseño</th>
			<th>Ubicación</th>
			<th>Fecha</th>
			<th>Texto</th>
			<th>Imagen</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['disenos'] as $diseno): ?>
		<tr>
			<td><?= $diseno->usuario_id ?></td>
			<td><?= $diseno->nombre_diseno ?></td>
			<td><?= $diseno->ubicacion ?></td>
			<td><?= $diseno->fecha_alta ?></td>
			<td><?= $diseno->texto->datos_texto ?></td>
			<td><?= $diseno->imagen->nombre ?></td>
			<td>
				<form id="idFormEdit" action="<?=base_url()?>diseno/modificarPost" method="post">
					<input type="hidden" name="id_diseno" value="<?= $diseno->id ?>">
					<input type="hidden" name="filtroNombreDiseno" value="<?= $body['filtroNombreDiseno'] ?>">
					<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
					<input type="hidden" name="mensajeBanner" value="Modificado el diseño <?= $diseno->nombre_diseno ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<td>
				<form id="idFormBorrar" action="<?=base_url()?>diseno/borrarPost" method="post">
					<input type="hidden" name="id_diseno" value="<?= $diseno->id ?>">
					<input type="hidden" name="filtroNombreDiseno" value="<?= $body['filtroNombreDiseno'] ?>">
					<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
					<input type="hidden" name="mensajeBanner" value="Borrado el diseño <?= $diseno->nombre_diseno ?>">
					<button class="btn btn-danger" title="Borrar" onclick="function f() {document.getElementById('idFormBorrar').submit();}"><span class="glyphicon glyphicon-remove"></span></button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div> 