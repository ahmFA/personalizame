<?php include_once 'desplegables.php';?>
<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript">
var conexion;

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;
		document.getElementById("idForm1").reset();
	}

	function crear() {
		conexion = new XMLHttpRequest();

		var datosSerializados = serialize(document.getElementById("idForm1"));
		conexion.open('POST', '<?=base_url() ?>usuario/crearPost', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datosSerializados);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
</script>
<script type="text/javascript">

	function validarTodo(){
		
		//Si todo esta a TRUE hace el submit
		if(true){
			//document.form1.submit();
			crear();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>
<form class="row" id="idForm1" >
<div class="card">
	<div class="card-header">
		<h2>
			Crea un nuevo usuario
		</h2>
	</div>
	
	<div id="idBanner"></div>
	

		<div class="bootgrid-header container-fluid">
			<div class="col-sm-12 m-b-15">
				<h3>Datos de usuario</h3>
			</div>
			<br/>
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idNick">Nick</label>
					<input type="text" class="search-field form-control"
						 id="idNick" name="nick" maxlength="20" required="required" placeholder="completa este campo" title="El Nick debe contener 3 caracteres como mínimo">
					
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idPwd">Contraseña </label> 	 
					<input type="password" class="search-field form-control"
						 id="idPwd" name="pwd" maxlength="20" required="required" placeholder="completa este campo" title="La Password debe contener 5 caracteres como mínimo">
				</div>
			</div>			 
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idPerfil">Perfil </label>
					<div class="select"> 	 
					<select class="form-control" id="idPerfil" name="perfil">
						<?php foreach ($perfiles as $perfil): ?>
		 					<option value='<?= $perfil?>'><?= $perfil?></option>
						<?php endforeach;?>
					</select>
					</div>
				</div>
				
			</div>
		
		
		
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idNombre">Nombre </label>
					<input type="text" class="search-field form-control"
						 id="idNombre"  name="nombre" maxlength="35" title="El Nombre debe contener entre 2 y 35 letras">
					
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idApellido1">Apellido 1 </label> 	 
					<input type="text" class="search-field form-control"
						 id="idApellido1"  name="apellido1" maxlength="35" title="El Apellido debe contener entre 2 y 35 letras">
				</div>
			</div>			 
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idApellido2">Apellido 2 </label> 	 
					<input type="text" class="search-field form-control"
						 id="idApellido2"  name="apellido2" maxlength="35" title="El Apellido debe contener entre 2 y 35 letras">
				</div>
				
			</div>
			<br/><br/>
			<div class="col-sm-12 m-b-15">
				<h3>Datos de contacto</h3>
			</div>
			<br/>
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idTelefono1">Telefono </label> 	 
					<input type="text" class="search-field form-control"
						 id="idTelefono1" name="telefono1" maxlength="9" title="El Teléfono debe contener 9 dígitos y empezar por 6-9">
				</div>
				
			</div>
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idTelefono2">Telefono alternativo </label> 	 
					<input type="text" class="search-field form-control"
						 id="idTelefono2" name="telefono2" maxlength="9" title="El Teléfono debe contener 9 dígitos y empezar por 6-9">
					
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group fg-line">
					<label for="idMail1">Mail </label> 	 
					<input type="text" class="search-field form-control"
						 id="idMail1" name="mail1" maxlength="40" required="required" placeholder="completa este campo" title="El Correo debe contener @ y . dominio">
				</div>
			</div>			 
			<div class="col-sm-6">
				<div class="form-group fg-line">
					<label for="idMail2">Mail alternativo </label> 	 
					<input type="text" class="search-field form-control"
						 id="idMail2" name="mail2" maxlength="40" placeholder="completa este campo" title="El Correo debe contener @ y . dominio">
				</div>
				
			</div>
			<div class="col-sm-12">
				<div class="form-group fg-line">
					<label for="idComentarioContacto">Comentario de contacto </label>
					<textarea class="form-control" id="idComentarioContacto" rows="3" name="comentario_contacto" maxlength="200">
					</textarea>
				</div>	
			</div>
			<br/><br/>
			<div class="col-sm-12 m-b-15">
				<h3>Datos de dirección</h3>
			</div>
			<br/>
			<div class="col-sm-8">
				<div class="form-group fg-line">
					<label for="idDireccion">Dirección </label> 	 
					<input type="text" class="search-field form-control"
						 id="idDireccion" name="direccion" maxlength="60">
				</div>
				
			</div>
			<div class="col-sm-4">
				<div class="form-group fg-line">
					<label for="idCP">Código Postal </label>
					<input type="text" class="search-field form-control"
						 id="idCP" name="cp" maxlength="5" title="El C.P. debe contener 5 dígitos">
					
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group fg-line">
					<label for="idLocalidad">Localidad </label> 	 
					<input type="text" class="search-field form-control"
						 id="idLocalidad" id="idLocalidad" name="localidad" maxlength="35" >
				</div>
			</div>			 
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idProvincia">Provincia </label>
					<div class="select"> 
						<select class="form-control"  id="idProvincia" name="provincia">
							<option value=' '>Seleccione una</option>       	
						 		<?php foreach ($provincias as $provincia): ?>
						 			<option value='<?= $provincia?>'><?= $provincia?></option>
								<?php endforeach;?>
						</select>
					</div>
				</div>
				
			</div>
			<div class="col-sm-3">
				<div class="form-group fg-line">
					<label for="idPais">Pais </label>
					<div class="select">	 
						<select class="form-control"  id="idPais" name="pais">
							<?php foreach ($paises as $pais): ?>
				 				<option value='<?= $pais?>'><?= $pais?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				
			</div>
			<div class="col-sm-12">
				<div class="form-group fg-line">
					<label for="idComentarioDireccion">Comentario Dirección </label>
					<textarea class="form-control" id="idComentarioDireccion" rows="3" name="comentario_direccion" maxlength="200">
					</textarea>
				</div>	
			</div>

				<div class="col-sm-3">
					<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
				</div>
			
		</div>
	</div>
 </form>


</div>
</section>

<!-- **************************     ANTIGUO      ***************************** -->
<!-- 
<div class="container">
	<div id="idBanner"></div>
	<div class="form-group col-xs-12">
		<h2>Datos de usuario</h2>
	</div>
	
	<form name="form1" class="form" id="idForm1">
	
	<div class="form-group col-xs-4">
		<label for="idNick">Nick </label> 
		<input class="form-control" id="idNick" type="text" name="nick" maxlength="20" required="required" placeholder="completa este campo" title="El Nick debe contener 3 caracteres como mínimo"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPwd">Password </label> 
		<input class="form-control" id="idPwd" type="password" name="pwd" maxlength="20" required="required" placeholder="completa este campo" title="La Password debe contener 5 caracteres como mínimo"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPerfil">Perfil </label> 
		<select class="form-control" id="idPerfil" name="perfil"> 
			<?php foreach ($perfiles as $perfil): ?>
 				<option value='<?= $perfil?>'><?= $perfil?></option>
			<?php endforeach;?> 
		</select>
		<br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35" title="El Nombre debe contener entre 2 y 35 letras"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido1">Primer apellido </label>
		<input class="form-control" id="idApellido1" type="text" name="apellido1" maxlength="35" title="El Apellido debe contener entre 2 y 35 letras"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido2">Segundo apellido </label>
		<input class="form-control" id="idApellido2" type="text" name="apellido2" maxlength="35" title="El Apellido debe contener entre 2 y 35 letras"> <br/>
	</div>
	
	<div class="form-group col-xs-12">
		<h2>Datos de contacto</h2>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idTelefono1">Teléfono </label>
		<input class="form-control" id="idTelefono1" type="text" name="telefono1" maxlength="9" title="El Teléfono debe contener 9 dígitos y empezar por 6-9"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idTelefono2">Teléfono alternativo</label>
		<input class="form-control" id="idTelefono2" type="text" name="telefono2" maxlength="9" title="El Teléfono debe contener 9 dígitos y empezar por 6-9"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idMail1">Mail </label>
		<input class="form-control" id="idMail1" type="text" name="mail1" maxlength="40" required="required" placeholder="completa este campo" title="El Correo debe contener @ y . dominio"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idMail2">Mail alternativo </label>
		<input class="form-control" id="idMail2" type="text" name="mail2" maxlength="40" title="El Correo debe contener @ y . dominio"> <br/>
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
		<input class="form-control" id="idCP" type="text" name="cp" maxlength="5" title="El C.P. debe contener 5 dígitos"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idLocalidad">Localidad </label>
		<input class="form-control" id="idLocalidad" type="text" name="localidad" maxlength="35"> <br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idProvincia">Provincia </label>
		<select class="form-control" id="idProvincia" name="provincia">         
 			<option value=' '>Seleccione una</option>       	
 		<?php foreach ($provincias as $provincia): ?>
 			<option value='<?= $provincia?>'><?= $provincia?></option>
		<?php endforeach;?>
        </select><br/>
	
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idPais">Pais </label>
		<select class="form-control" id="idPais" name="pais">
		<?php foreach ($paises as $pais): ?>
 				<option value='<?= $pais?>'><?= $pais?></option>
		<?php endforeach;?>
		</select><br/>
	</div>
	
	<div class="form-group col-xs-12">	
		<label for="idComentarioDireccion">Comentario de dirección </label>
		<textarea class="form-control" id="idComentarioDireccion" rows="3" name="comentario_direccion" maxlength="200"></textarea> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
	</div>
	
	</form>
</div>

 -->