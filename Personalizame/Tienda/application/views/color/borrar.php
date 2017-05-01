<div class="card">
	<div class="card-header">
		<h2>
			Listado de colores<small>Ensure that the data attribute
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
							placeholder="Search">
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
	<form role="form" method="post"
					action="<?= base_url() ?>color/borrarPost">
	<table id="data-table-command"
		class="table table-striped table-vmiddle">
		<thead>
			<tr>
				<th class="select-cell"><div class="checkbox"><label><input name="select" type="checkbox" class="select-box" value="all" {{ctx.checked}}=""><i class="input-helper"></i></label></div></th>
				<th data-column-id="id" data-type="numeric">ID</th>
				<th data-column-id="sender">Nombre</th>
				<th data-column-id="received" data-order="desc">Valor</th>
			</tr>
		</thead>
		<tbody>
		
                                   <?php foreach ($colores as $color):?>
										<tr>
				<td class="select-cell" style="{{ctx.style}}">
					<div class="checkbox">
						<label><input type="checkbox" name="idColores[]" class="select-box" value="<?=$color['id']?>"><i class="input-helper"></i></label>
					</div>
				</td>
				<td><?=$color['id']?></td>
				<td><?=$color['nombre']?></td>
				<td><?=$color['valor']?></td>
				
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
