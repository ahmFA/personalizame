<div class="container">
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>usuario/listarPost" method="post">
		
		<div class="form-group col-xs-4">
			<label for="idFiltroNick">Nick</label>  
			<input class="form-control" type="text" id="idFiltroNick" name="filtroNick">
		</div>
		
		<div class="form-group col-xs-4">
			<label for="idFiltroNombre">Nombre </label>  
			<input class="form-control" type="text" id="idFiltroNombre" name="filtroNombre">
		</div>
		
		<div class="form-group col-xs-4">
			<br/>
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
		</div>
	</form>
</div>
<br/>