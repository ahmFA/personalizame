<div class="container">
	<div class="form-group col-xs-12">
		<h2>Datos de usuario</h2>
	</div>
	
	<form class="form" action="<?=base_url() ?>usuario/crearPost" method="post">
	
	<div class="form-group col-xs-4">
		<label for="idNick">Nick </label> 
		<input class="form-control" id="idNick" type="text" name="nick" maxlength="20"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPassword">Password </label> 
		<input class="form-control" id="idPassword" type="password" name="password" maxlength="20"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPerfil">Perfil </label> 
		<select class="form-control" id="idPerfil" name="perfil"> 
			<option value='administrador'>Administrador</option>
 			<option value='usuario' selected="selected">Usuario</option> 
		</select>
		<br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido1">Primer apellido </label>
		<input class="form-control" id="idApellido1" type="text" name="apellido1" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido2">Segundo apellido </label>
		<input class="form-control" id="idApellido2" type="text" name="apellido2" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-12">
		<h2>Datos de contacto</h2>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idTelefono1">Teléfono </label>
		<input class="form-control" id="idTelefono1" type="text" name="telefono1" maxlength="9"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idTelefono2">Teléfono alternativo</label>
		<input class="form-control" id="idTelefono2" type="text" name="telefono2" maxlength="9"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idMail1">Mail </label>
		<input class="form-control" id="idMail1" type="text" name="mail1" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idMail2">Mail alternativo </label>
		<input class="form-control" id="idMail2" type="text" name="mail2" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-12">	
		<label for="idComentarioContacto">Comentario de contacto </label>
		<textarea class="form-control" id="idComentarioContacto" rows="3" name="comentario_contacto" maxlength="200"></textarea><br/>
	</div>
	
	<div class="form-group col-xs-12">
		<h2>Datos de dirección</h2>
	</div>
	
	<div class="form-group col-xs-8">	
		<label for="idDireccion">Dirección </label>
		<input class="form-control" id="idDireccion" type="text" name="direccion" maxlength="60"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idCP">CP </label>
		<input class="form-control" id="idCP" type="text" name="cp" maxlength="5"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idLocalidad">Localidad </label>
		<input class="form-control" id="idLocalidad" type="text" name="localidad" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idProvincia">Provincia </label>
		<select class="form-control" id="idProvincia" name="provincia">         
 			<option value='alava'>Álava</option>
 			<option value='albacete'>Albacete</option>
 			<option value='alicante'>Alicante</option>
 			<option value='almeria'>Almería</option>
			<option value='asturias'>Asturias</option>
			<option value='avila'>Ávila</option>
			<option value='badajoz'>Badajoz</option>
			<option value='barcelona'>Barcelona</option>
			<option value='burgos'>Burgos</option>
			<option value='caceres'>Cáceres</option>
			<option value='cadiz'>Cádiz</option>
			<option value='cantabria'>Cantabria</option>
			<option value='castellon'>Castellón</option>
			<option value='ceuta'>Ceuta</option>
			<option value='ciudadreal'>Ciudad Real</option>
			<option value='cordoba'>Córdoba</option>
			<option value='cuenca'>Cuenca</option>
			<option value='girona'>Girona</option>
			<option value='granada'>Granada</option>
			<option value='guadalajara'>Guadalajara</option>
			<option value='guipuzcoa'>Guipúzcoa</option>
			<option value='huelva'>Huelva</option>
			<option value='huesca'>Huesca</option>
			<option value='islasbaleares'>Islas Baleares</option>
			<option value='jaen'>Jaén</option>
			<option value='lacoruña'>La Coruña</option>
			<option value='larioja'>La Rioja</option>
			<option value='laspalmas'>Las Palmas</option>
			<option value='leon'>León</option>
			<option value='lleida'>Lleida</option>
			<option value='lugo'>Lugo</option>
			<option value='madrid'>Madrid</option>
			<option value='malaga'>Málaga</option>
			<option value='melilla'>Melilla</option>
			<option value='murcia'>Murcia</option>
			<option value='navarra'>Navarra</option>
			<option value='orense'>Orense</option>
			<option value='palencia'>Palencia</option>
			<option value='pontevedra'>Pontevedra</option>
			<option value='salamanca'>Salamanca</option>
			<option value='santacruztenerife'>Santa Cruz de Tenerife</option>
			<option value='segovia'>Segovia</option>
			<option value='sevilla'>Sevilla</option>
			<option value='soria'>Soria</option>
			<option value='tarragona'>Tarragona</option>
			<option value='teruel'>Teruel</option>
			<option value='toledo'>Toledo</option>
			<option value='valencia'>Valencia</option>
			<option value='valladolid'>Valladolid</option>
			<option value='vizcaya'>Vizcaya</option>
			<option value='zamora'>Zamora</option>
			<option value='zaragoza'>Zaragoza</option>
        </select><br/>
	
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idPais">Pais </label>
		<select class="form-control" id="idPais" name="pais">
			<option value='andorra'>Andorra</option>
			<option value='españa' selected="selected">España</option>
			<option value='portugal'>Portugal</option>
		</select><br/>
	</div>
	
	<div class="form-group col-xs-12">	
		<label for="idComentarioDireccion">Comentario de dirección </label>
		<textarea class="form-control" id="idComentarioDireccion" rows="3" name="comentario_direccion" maxlength="200"></textarea> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" type="submit">
	</div>
	
	</form>
</div>