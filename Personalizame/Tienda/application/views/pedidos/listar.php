<div class="card">
<div class="card-header">
<h2>
Listado de pedidos<small>Introduce el filtro que desees para una búsqueda más precisa.</small>
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
			action="<?= base_url() ?>pedido/listar" method="post">
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idFiltroNick">Usuario </label>
					<input type="text" class="search-field form-control"
						 id="idFiltroNick" name="filtroNick" value="<?= $body['filtroNick']?>" placeholder="Buscar">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idFiltroEstado">Estado </label>
					<input type="text" class="search-field form-control"
						 id="idFiltroEstado" name="filtroEstado" value="<?= $body['filtroEstado']?>" placeholder="Buscar">
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
				<th data-column-id="received" data-order="desc">Dirección de entrega</th>
				<th data-column-id="received" data-order="desc">Fecha</th>
				<th data-column-id="received" data-order="desc">Importe</th>
				<th data-column-id="received" data-order="desc">Fecha Entrega</th>
				<th data-column-id="received" data-order="desc">Estado</th>
				<th data-column-id="commands" data-formatter="commands"
					data-sortable="false">Acción</th>
			</tr>
		</thead>
		<tbody>
                                   <?php foreach ($pedidos as $pedido):?>
										<tr>
				<td><?=$pedido['usuario']->nick?></td>
				<td><?=$pedido['direccion']?></td>
				<td><?=$pedido['fecha']?></td>
				<td><?=$pedido['importe']?></td>
				<td><?=$pedido['fecha_entrega']?></td>
				<td><?=$pedido['estado']?></td>
				<td class="text-left">
				<?php if($pedido['estado'] == 'Pendiente' ):?>
					<form id="idFormedit" action="<?=base_url();?>pedido/editar"
						method="post">
						<input type="hidden" name="idPedido" value="<?= $pedido -> id?>">
						<button
							class="btn btn-icon command-edit waves-effect waves-circle"
							onclick="function f() {document.getElementById('idFormedit').submit();}">
							<span class="zmdi zmdi-edit"></span>
						</button>
					</form>
				<?php endif; ?>	
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
