<div class="container">
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>usuario/listarPost" method="post">
		
		<div class="form-group col-xs-4">
			<label for="idFiltroNick">Nick</label>  
			<input class="form-control" type="text" id="idFiltroNick" name="filtroNick" value="<?= $body['filtroNick'] ?>">
		</div>
		
		<div class="form-group col-xs-4">
			<label for="idFiltroNombre">Nombre </label>  
			<input class="form-control" type="text" id="idFiltroNombre" name="filtroNombre" value="<?= $body['filtroNombre']?>">
		</div>
		
		<div class="form-group col-xs-4">
			<br/>
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
		</div>
	</form>
</div>
<br/>
<div class="container">
	<div class="form-group col-xs-12">
		<h4>Listado de usuarios</h4>
	</div>
	<table class="table table-striped">
		<tr>
			<th>Nick</th>
			<th>Perfil</th>
			<th>Estado</th>
			<th>Nombre</th>
			<th>Teléfonos</th>
			<th>Mails</th>
			<th>Descuento</th>
			<th>Alta</th>
			<th>Baja</th>
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['usuarios'] as $usuario): ?>
		<tr>
			<td><?= $usuario->nick ?></td>
			<td><?= $usuario->perfil ?></td>
			<td><?= $usuario->estado ?></td>
			<td><?= $usuario->nombre ?> <?= $usuario->apellido1 ?> <?= $usuario->apellido2 ?></td>
			<td><?= $usuario->telefono1 ?> <?= $usuario->telefono2 ?></td>
			<td><?= $usuario->mail1 ?> <?= $usuario->mail2 ?></td>
			<td><?= $usuario->descuento ?></td>
			<td><?= $usuario->fecha_alta ?></td>
			<td><?= $usuario->fecha_baja ?> <?= $usuario->motivo_baja ?></td>

			<td>
				<form id="idFormEdit" action="<?=base_url()?>usuario/modificarPost" method="post">
					<input type="hidden" name="idUsuario" value="<?= $usuario->id ?>">
					<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<?php if($usuario->estado == "Alta"):?>
			<td>
				<form id="idFormBaja" action="<?=base_url()?>usuario/bajaPost" method="post">
					<input type="hidden" name="idUsuario" value="<?= $usuario->id?>">
					<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<button class="btn btn-danger" title="Dar de Baja" onclick="function f() {document.getElementById('idFormBaja').submit();}"><span class="glyphicon glyphicon-arrow-down"></span></button>
				</form>
			</td>
			<?php elseif($usuario->estado == "Baja"):?>
			<td>
				<form id="idFormAlta" action="<?=base_url()?>usuario/altaPost" method="post">
					<input type="hidden" name="idUsuario" value="<?= $usuario->id?>">
					<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
					<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
					<button class="btn btn-success" title="Dar de Alta" onclick="function f() {document.getElementById('idFormAlta').submit();}"><span class="glyphicon glyphicon-arrow-up"></span></button>
				</form>
			</td>
			<?php endif;?>
		</tr>
		<?php endforeach;?>
	</table>
</div> 