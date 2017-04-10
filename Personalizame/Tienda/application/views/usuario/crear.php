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
		var miPassword = document.getElementById("idPassword").value.length;
		//longitud entre 5 y 20 caracteres
		if(miPassword > 5 && miPassword < 20){
			valido = true;
		}
		return valido;
	}
	
	function validarNombre(){
		var valido = false;
		var miNombre = document.getElementById("idNombre").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚ]{2,35}$/.test(miNombre)){
			valido = true;
		}
		return valido;
	}
	
	function validarApellido1(){
		var valido = false;
		var miApellido1 = document.getElementById("idApellido1").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚ]{2,35}$/.test(miApellido1)){
			valido = true;
		}
		return valido;
	}

	function validarApellido2(){
		var valido = false;
		var miApellido2 = document.getElementById("idApellido2").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚ]{2,35}$/.test(miApellido2)){
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
		
	function validarMail1(){
		var valido = false;
		var miMail1 = document.getElementById("idMail1").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail1)){
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
			document.getElementById("idPassword").style.color = "red";
			if (foco == true){
				document.getElementById("idPassword").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idPassword").style.color = "black";
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

		//Si todo esta a TRUE hace el submit
		if(valNick && valPassword && valNombre && valApellido1 && valApellido2 && valTelefono1 && valMail1){
			document.form1.submit();
		}	

	}

</script>

<div class="container">
	<div class="form-group col-xs-12">
		<h2>Datos de usuario</h2>
	</div>
	
	<form name="form1" class="form" action="<?=base_url() ?>usuario/crearPost" method="post">
	
	<div class="form-group col-xs-4">
		<label for="idNick">Nick </label> 
		<input class="form-control" id="idNick" type="text" name="nick" maxlength="20" required="required" placeholder="completa este campo"> <br/>
	</div>
	
	<div class="form-group col-xs-4">
		<label for="idPassword">Password </label> 
		<input class="form-control" id="idPassword" type="password" name="password" maxlength="20" required="required" placeholder="completa este campo"> <br/>
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
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35" required="required" placeholder="completa este campo"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido1">Primer apellido </label>
		<input class="form-control" id="idApellido1" type="text" name="apellido1" maxlength="35" required="required" placeholder="completa este campo"> <br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<label for="idApellido2">Segundo apellido </label>
		<input class="form-control" id="idApellido2" type="text" name="apellido2" maxlength="35" required="required" placeholder="completa este campo"> <br/>
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
		<input class="form-control" id="idMail1" type="text" name="mail1" maxlength="35" required="required" placeholder="completa este campo"> <br/>
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
 			<option value=' '>Seleccione una</option>
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
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
	</div>
	
	</form>
</div>