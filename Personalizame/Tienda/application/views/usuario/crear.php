<div class="container">
	<h2>Introduce los datos de usuario</h2>
	<form class="form" action="<?=base_url() ?>usuario/crearPost" method="post">
	
	<div class="form-group">
		<label for="idNick">Nick </label> 
		<input class="form-control" id="idNick" type="text" name="nick"> <br/>
	</div>
	
	<div class="form-group">
		<label for="idPassword">Password </label> 
		<input class="form-control" id="idPassword" type="password" name="password"> <br/>
	</div>
	
	<div class="form-group">
		<label for="idPerfil">Perfil </label> 
		<input class="form-control" id="idPerfil" type="text" name="perfil"> <br/>
	</div>
	
	<div class="form-group">
		<label for="idEstado">Estado </label> 
		<input class="form-control" id="idEstado" type="text" name="estado"> <br/>
	</div>
	
	<div class="form-group">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre"> <br/>
	</div>
	
	<div class="form-group">	
		<label for="idApellido1">Primer apellido </label>
		<input class="form-control" id="idApellido1" type="text" name="apellido1"> <br/>
	</div>
	
	<div class="form-group">	
		<label for="idApellido2">Segundo apellido </label>
		<input class="form-control" id="idApellido2" type="text" name="apellido2"> <br/>
	</div>
	
	<div class="form-group">	
		<label for="idTelefono1">Teléfono </label>
		<input class="form-control" id="idTelefono1" type="text" name="telefono1"> <br/>
	</div>
	
	<div class="form-group">	
		<input class="form-control" type="submit">
	</div>
	
	</form>
</div>