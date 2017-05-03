<?php include_once 'desplegables.php';?>
<div class="container">
	
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>usuario/listarPost" method="post">
		
		<div class="form-group col-xs-3">
			<label for="idFiltroNick">Nick</label>  
			<input class="form-control" type="text" id="idFiltroNick" name="filtroNick" value="<?= $body['filtroNick'] ?>">
		</div>

		<div class="form-group col-xs-3">
			<label for="idFiltroMail">Mail </label>  
			<input class="form-control" type="text" id="idFiltroMail" name="filtroMail" value="<?= $body['filtroMail']?>">
		</div>
		
		<div class="form-group col-xs-2">
			<label for="idFiltroEstado">Estado </label>  
			<select class="form-control" id="idFiltroEstado" name="filtroEstado">  
				<option value=''>Todos</option>     	
 			<?php foreach ($estados as $estado): ?>
 			<?php if($body['filtroEstado'] == $estado):?>
 				<option value='<?= $estado?>' selected="selected"><?= $estado?></option>
 			<?php else:?>
 				<option value='<?= $estado?>'><?= $estado?></option>
 			<?php endif;?>
			<?php endforeach;?>
			</select><br/>
		</div>
		
		<div class="form-group col-xs-2">
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
			<th colspan="2">Acciones</th>
		</tr>
		<?php foreach($body['usuarios'] as $usuario): ?>
		<tr>
			<td><?= $usuario->nick ?></td>
			<td><?= $usuario->perfil ?></td>
			<td title="Alta: <?= $usuario->fecha_alta ?>&#13;&#10;Baja: <?= $usuario->fecha_baja ?> - <?= $usuario->motivo_baja ?>"><?= $usuario->estado ?></td>
			<td><?= $usuario->nombre ?> <?= $usuario->apellido1 ?> <?= $usuario->apellido2 ?></td>
			<td><?= $usuario->telefono1 ?> <?= $usuario->telefono2 ?></td>
			<td><?= $usuario->mail1 ?> <?= $usuario->mail2 ?></td>
			<td><?= $usuario->descuento ?></td>

			<td>
				<form id="idFormEdit" action="<?=base_url()?>usuario/modificarPost" method="post">
					<input type="hidden" name="idUsuario" value="<?= $usuario->id ?>">
					<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
					<input type="hidden" name="filtroMail" value="<?= $body['filtroMail'] ?>">
					<input type="hidden" name="filtroEstado" value="<?= $body['filtroEstado'] ?>">
					<input type="hidden" name="mensajeBanner" value="Modificado el usuario <?= $usuario->nick ?>">
					<button class="btn btn-info" title="Modificar" onclick="function f() {document.getElementById('idFormEdit').submit();}"><span class="glyphicon glyphicon-pencil"></span></button>
				</form>
			</td>
			<?php if($usuario->estado == "Alta"):?>
			<td>
				<form id="idFormBaja" action="<?=base_url()?>usuario/bajaPost" method="post">
					<input type="hidden" name="idUsuario" value="<?= $usuario->id?>">
					<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
					<input type="hidden" name="filtroMail" value="<?= $body['filtroMail'] ?>">
					<input type="hidden" name="filtroEstado" value="<?= $body['filtroEstado'] ?>">
					<input type="hidden" name="mensajeBanner" value="Dado de Baja el usuario <?= $usuario->nick ?>">
					<button class="btn btn-danger" title="Dar de Baja" onclick="function f() {document.getElementById('idFormBaja').submit();}"><span class="glyphicon glyphicon-arrow-down"></span></button>
				</form>
			</td>
			<?php elseif($usuario->estado == "Baja"):?>
			<td>
				<form id="idFormAlta" action="<?=base_url()?>usuario/altaPost" method="post">
					<input type="hidden" name="idUsuario" value="<?= $usuario->id?>">
					<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
					<input type="hidden" name="filtroMail" value="<?= $body['filtroMail'] ?>">
					<input type="hidden" name="filtroEstado" value="<?= $body['filtroEstado'] ?>">
					<input type="hidden" name="mensajeBanner" value="Dado de Alta el usuario <?= $usuario->nick ?>">
					<button class="btn btn-success" title="Dar de Alta" onclick="function f() {document.getElementById('idFormAlta').submit();}"><span class="glyphicon glyphicon-arrow-up"></span></button>
				</form>
			</td>
			<?php endif;?>
		</tr>
		<?php endforeach;?>
	</table>
</div> 