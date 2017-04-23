<div class="container">
	<div class="form-group col-xs-12">
		<h4>Introduce el filtro que desees</h4>
	</div>

	<form id="idFormFiltro" class="form" action="<?= base_url() ?>texto/listarPost" method="post">
		
		<div class="form-group col-xs-4">
			<label for="idFiltroDatosTexto">Texto </label>  
			<input class="form-control" type="text" id="idFiltroDatosTexto" name="filtroDatosTexto">
		</div>
		
		<div class="form-group col-xs-4">
			<label for="idFiltroUsuario">Usuario </label>  
			<input class="form-control" type="text" id="idFiltroUsuario" name="filtroUsuario">
		</div>
		
		<div class="form-group col-xs-4">
			<br/>
			<button class="btn btn-primary" onclick="function f() {document.getElementById('idFormFiltro').submit();}"><span class="glyphicon glyphicon-search"></span> Filtrar</button>
		</div>
	</form>
</div>
<br/>