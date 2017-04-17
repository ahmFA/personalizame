
<div class="container">
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>tamano/listarPost" method="post">
		
		<div class="form-group col-xs-3">
			<label for="idFiltroNombre">Nombre </label>  
			<input class="form-control" type="text" id="idFiltroNombre" name="filtroNombre">
		</div>

		<div class="form-group col-xs-3">
			<br/>
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
		</div>
	</form>
</div>
<br/>