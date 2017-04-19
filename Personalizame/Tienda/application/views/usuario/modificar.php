<?php include_once 'desplegables.php';?>
<script type="text/javascript">
	
	function validarNick(){
		var valido = false;
		var miNick = document.getElementById("idNick").value;
		//entre 3 y 20 caracteres
		if(/^\w{3,20}$/.test(miNick)){
			valido = true;
		}
		return valido;
	}

	function validarPassword(){
		var valido = false;
		var miPwd = document.getElementById("idPwd").value.length;
		//longitud entre 5 y 20 caracteres
		if(miPwd >= 5 && miPwd <= 20){
			valido = true;
		}
		return valido;
	}
	
	function validarNombre(){
		var valido = false;
		var miNombre = document.getElementById("idNombre").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miNombre) || miNombre == ""){
			valido = true;
		}
		return valido;
	}
	
	function validarApellido1(){
		var valido = false;
		var miApellido1 = document.getElementById("idApellido1").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miApellido1) || miApellido1 == ""){
			valido = true;
		}
		return valido;
	}

	function validarApellido2(){
		var valido = false;
		var miApellido2 = document.getElementById("idApellido2").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miApellido2) || miApellido2 == ""){
			valido = true;
		}
		return valido;
	}
		
	function validarTelefono1(){
		var valido = false;
		var miTelefono1 = document.getElementById("idTelefono1").value;
		//telefono correcto o vacio
		if(/^[6-9][0-9]{8}$/.test(miTelefono1) || miTelefono1 == ""){
			valido = true;
		}
		return valido;
	}

	function validarTelefono2(){
		var valido = false;
		var miTelefono2 = document.getElementById("idTelefono2").value;
		//telefono correcto o vacio
		if(/^[6-9][0-9]{8}$/.test(miTelefono2) || miTelefono2 == ""){
			valido = true;
		}
		return valido;
	}
		
	function validarMail1(){
		var valido = false;
		var miMail1 = document.getElementById("idMail1").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail1)){
			valido = true;
		}
		return valido;
	}

	function validarMail2(){
		var valido = false;
		var miMail2 = document.getElementById("idMail2").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail2) || miMail2 == ""){
			valido = true;
		}
		return valido;
	}

	function validarCP(){
		var valido = false;
		var miCP = document.getElementById("idCP").value;
		//5 digitos
		if(/^[0-9]{5}$/.test(miCP) || miCP == ""){
			valido = true;
		}
		return valido;
	}
	
	function validarTodo(){
		var foco = true;
		
		//NICK
		var valNick = validarNick();
		if (valNick == false){
			document.getElementById("idNick").style.color = "red";
			if (foco == true){
				document.getElementById("idNick").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNick").style.color = "black";
		}

		//PASSWORD
		var valPassword = validarPassword();
		if (valPassword == false){
			document.getElementById("idPwd").style.color = "red";
			if (foco == true){
				document.getElementById("idPwd").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idPwd").style.color = "black";
		}
		
		//NOMBRE
		var valNombre = validarNombre();
		if (valNombre == false){
			document.getElementById("idNombre").style.color = "red";
			if (foco == true){
				document.getElementById("idNombre").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNombre").style.color = "black";
		}
		
		//APELLIDO1
		var valApellido1 = validarApellido1();
		if (valApellido1 == false){
			document.getElementById("idApellido1").style.color = "red";
			if (foco == true){
				document.getElementById("idApellido1").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idApellido1").style.color = "black";
		}

		//APELLIDO2
		var valApellido2 = validarApellido2();
		if (valApellido2 == false){
			document.getElementById("idApellido2").style.color = "red";
			if (foco == true){
				document.getElementById("idApellido2").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idApellido2").style.color = "black";
		}
		
		//TELEFONO1
		var valTelefono1 = validarTelefono1();
		if (valTelefono1 == false){
			document.getElementById("idTelefono1").style.color = "red";
			if (foco == true){
				document.getElementById("idTelefono1").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idTelefono1").style.color = "black";
		}

		//TELEFONO2
		var valTelefono2 = validarTelefono2();
		if (valTelefono2 == false){
			document.getElementById("idTelefono2").style.color = "red";
			if (foco == true){
				document.getElementById("idTelefono2").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idTelefono2").style.color = "black";
		}
		
		//MAIL1
		var valMail1 = validarMail1();
		if (valMail1 == false){
			document.getElementById("idMail1").style.color = "red";
			if (foco == true){
				document.getElementById("idMail1").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idMail1").style.color = "black";
		}

		//MAIL2
		var valMail2 = validarMail2();
		if (valMail2 == false){
			document.getElementById("idMail2").style.color = "red";
			if (foco == true){
				document.getElementById("idMail2").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idMail2").style.color = "black";
		}

		//CP
		var valCP = validarCP();
		if (valCP == false){
			document.getElementById("idCP").style.color = "red";
			if (foco == true){
				document.getElementById("idCP").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idCP").style.color = "black";
		}
		
		//Si todo esta a TRUE hace el submit
		if(valNick && valPassword && valNombre && valApellido1 && valApellido2 && valTelefono1 && valTelefono2 && valMail1 && valMail2 && valCP){
			document.form1.submit();
		}	

	}

</script>

<div class="container">
	<div class="form-group col-xs-12">
		<h2>Modificar datos de usuario</h2>
	</div>
	
	<form name="form1" class="form" action="<?=base_url() ?>usuario/modificarPost2" method="post">
	
	<!-- campos ocultos para volver al filtro en la misma posicion y ver los resultados del cambio -->
	<input type="hidden" name="filtroNick" value="<?= $body['filtroNick'] ?>">
	<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
	<input type="hidden" name="filtroMail" value="<?= $body['filtroMail'] ?>">
	<input type="hidden" name="filtroEstado" value="<?= $body['filtroEstado'] ?>">
	<input type="hidden" name="idUsuario" value="<?= $body['usuario']->id ?>">
	
	<div class="form-group col-xs-4">
		<label for="idNick">Nick </label> 
		<input class="form-control" id="idNick" type="text" name="nick" maxlength="20" required="required" placeholder="completa este campo" title="El Nick debe contener 3 caracteres como mínimo" value="<?= $body['usuario']->nick ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPwd">Password </label> 
		<input class="form-control" id="idPwd" type="password" name="pwd" maxlength="20" required="required" placeholder="completa este campo" title="La Password debe contener 5 caracteres como mínimo" value="<?= $body['usuario']->pwd ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPerfil">Perfil </label> 
		<select class="form-control" id="idPerfil" name="perfil"> 
		<?php foreach ($perfiles as $perfil): ?>
 			<?php if($body['usuario']->perfil == $perfil):?>
 				<option value='<?= $perfil?>' selected="selected"><?= $perfil?></option>
 			<?php else:?>
 				<option value='<?= $perfil?>'><?= $perfil?></option>
 			<?php endif;?>
		<?php endforeach;?>
		</select>
		<br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35" title="El Nombre debe contener entre 2 y 35 letras" value="<?= $body['usuario']->nombre ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido1">Primer apellido </label>
		<input class="form-control" id="idApellido1" type="text" name="apellido1" maxlength="35" title="El Apellido debe contener entre 2 y 35 letras" value="<?= $body['usuario']->apellido1 ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido2">Segundo apellido </label>
		<input class="form-control" id="idApellido2" type="text" name="apellido2" maxlength="35" title="El Apellido debe contener entre 2 y 35 letras" value="<?= $body['usuario']->apellido2 ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-12">
		<h2>Modificar datos de contacto</h2>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idTelefono1">Teléfono </label>
		<input class="form-control" id="idTelefono1" type="text" name="telefono1" maxlength="9" title="El Teléfono debe contener 9 dígitos y empezar por 6-9" value="<?= $body['usuario']->telefono1 ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idTelefono2">Teléfono alternativo</label>
		<input class="form-control" id="idTelefono2" type="text" name="telefono2" maxlength="9" title="El Teléfono debe contener 9 dígitos y empezar por 6-9" value="<?= $body['usuario']->telefono2 ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idMail1">Mail </label>
		<input class="form-control" id="idMail1" type="email" name="mail1" maxlength="40" required="required" placeholder="completa este campo" title="El Correo debe contener @ y . dominio" value="<?= $body['usuario']->mail1 ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idMail2">Mail alternativo </label>
		<input class="form-control" id="idMail2" type="email" name="mail2" maxlength="40" title="El Correo debe contener @ y . dominio" value="<?= $body['usuario']->mail2 ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-12">	
		<label for="idComentarioContacto">Comentario de contacto </label>
		<textarea class="form-control" id="idComentarioContacto" rows="3" name="comentario_contacto" maxlength="200"><?= $body['usuario']->comentario_contacto ?></textarea><br/>
	</div>
	
	<div class="form-group col-xs-12">
		<h2>Modificar datos de dirección</h2>
	</div>
	
	<div class="form-group col-xs-8">	
		<label for="idDireccion">Dirección </label>
		<input class="form-control" id="idDireccion" type="text" name="direccion" maxlength="60" value="<?= $body['usuario']->direccion ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idCP">CP </label>
		<input class="form-control" id="idCP" type="text" name="cp" maxlength="5" title="El C.P. debe contener 5 dígitos" value="<?= $body['usuario']->cp ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-6">	
		<label for="idLocalidad">Localidad </label>
		<input class="form-control" id="idLocalidad" type="text" name="localidad" maxlength="35" value="<?= $body['usuario']->localidad ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idProvincia">Provincia </label>
		<select class="form-control" id="idProvincia" name="provincia">  
				<option value=' '>Seleccione una</option>       	
 		<?php foreach ($provincias as $provincia): ?>
 			<?php if($body['usuario']->provincia == $provincia):?>
 				<option value='<?= $provincia?>' selected="selected"><?= $provincia?></option>
 			<?php else:?>
 				<option value='<?= $provincia?>'><?= $provincia?></option>
 			<?php endif;?>
		<?php endforeach;?>
        </select><br/>
	
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idPais">Pais </label>
		<select class="form-control" id="idPais" name="pais">
		<?php foreach ($paises as $pais): ?>
 			<?php if($body['usuario']->pais == $pais):?>
 				<option value='<?= $pais?>' selected="selected"><?= $pais?></option>
 			<?php else:?>
 				<option value='<?= $pais?>'><?= $pais?></option>
 			<?php endif;?>
		<?php endforeach;?>
		</select><br/>
	</div>
	
	<div class="form-group col-xs-12">	
		<label for="idComentarioDireccion">Comentario de dirección </label>
		<textarea class="form-control" id="idComentarioDireccion" rows="3" name="comentario_direccion" maxlength="200"><?= $body['usuario']->comentario_direccion ?></textarea> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
	</div>
	
	</form>
</div>