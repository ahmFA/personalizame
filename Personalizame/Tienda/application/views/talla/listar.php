<!-- 
<div class="container">
<div class="row">
<div class="col-xs-10">
	<fieldset><legend>Tallas</legend>
	<table class="table table-bordered">
		<tr><th>Nombre</th><th>Editar</th></tr>
		<?php foreach ($tallas as $talla):?>
		<tr>
			<td><?= $talla['nombre']?></td>
			<td><a href="<?=base_url() ?>talla/editar?idTalla=<?=$talla['id'] ?>">Editar</a></td>
		</tr>	
		<?php endforeach;?>
	</table>
	</fieldset>
</div>
</div>
</div>




 -->
<div class="card">
	<div class="card-header">
		<h2>
			Listado de tallas<small>Ensure that the data attribute
				[data-identifier="true"] is set on one column header.</small>
		</h2>
	</div>
	<div id="data-table-command-header"
		class="bootgrid-header container-fluid">
		<div class="row">
			<div class="col-sm-12 actionBar">
				<div class="search form-group">
					<div class="input-group">
						<span class="zmdi icon input-group-addon glyphicon-search"></span>
						<input type="text" class="search-field form-control"
							placeholder="Search" onkeyup="">
					</div>
				</div>
				<div class="actions btn-group">
					<div class="dropdown btn-group">
						<button class="btn btn-default dropdown-toggle" type="button"
							data-toggle="dropdown">
							<span class="dropdown-text">10</span> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li class="active" aria-selected="true"><a data-action="10"
								class="dropdown-item dropdown-item-button">10</a></li>
							<li aria-selected="false"><a data-action="25"
								class="dropdown-item dropdown-item-button">25</a></li>
							<li aria-selected="false"><a data-action="50"
								class="dropdown-item dropdown-item-button">50</a></li>
							<li aria-selected="false"><a data-action="-1"
								class="dropdown-item dropdown-item-button">All</a></li>
						</ul>
					</div>
					<div class="dropdown btn-group">
						<button class="btn btn-default dropdown-toggle" type="button"
							data-toggle="dropdown">
							<span class="dropdown-text"><span
								class="zmdi icon zmdi-view-module"></span></span> <span
								class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<div class="checkbox">
									<label class="dropdown-item"> <input name="id" type="checkbox"
										value="1" class="dropdown-item-checkbox" checked="checked"> ID<i
										class="input-helper"></i>
									</label>
								</div>
							</li>
							<li><div class="checkbox">
									<label class="dropdown-item"><input name="sender"
										type="checkbox" value="1" class="dropdown-item-checkbox"
										checked="checked"> Sender<i class="input-helper"></i></label>
								</div></li>
							<li><div class="checkbox">
									<label class="dropdown-item"><input name="received"
										type="checkbox" value="1" class="dropdown-item-checkbox"
										checked="checked"> Received<i class="input-helper"></i></label>
								</div></li>
							<li><div class="checkbox">
									<label class="dropdown-item"><input name="commands"
										type="checkbox" value="1" class="dropdown-item-checkbox"
										checked="checked"> Commands<i class="input-helper"></i></label>
								</div></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
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
