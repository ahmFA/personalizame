<?php include_once 'desplegables.php';?>




	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
 
 <section class="box-content box-style">
			<div class="container-fluid">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Pago y Envío</h2>
						
	                </div>
				</div>
	<div class="row m-t-25">


<fieldset>

<!-- Form Name -->
<legend></legend>
<form class="form-horizontal" name="form1" action="<?=base_url() ?>usuario/confirmacionPago" method="post">
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="Card">Nº de tarjeta</label>
<div class="col-md-5">
<input id="tarjeta" name="tarjeta" type="text" placeholder="" class="form-control input-md" required="required">
<span class="help-block">Introduce los 16 dígitos de la tarjeta</span>
</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="nombre">Nombre completo</label>
<div class="col-md-2">
<input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control input-md" required="required" value="<?=isset($usuario->nombre) ? $usuario->nombre : '' ?>">
</div>

<div class="col-md-3">
<input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" class="form-control input-md" required="required" value="<?=isset($usuario) ? $usuario->apellido1.' '.$usuario->apellido2 : '' ?>">
</div>
<span class="help-block">Exactamente como aparece en la tarjeta</span>
</div>

<!-- Select Basic -->
<div class="form-group">
<label class="col-md-4 control-label" for="mes">Fecha de expiración</label>
<div class="col-md-2">
<select id="mes" name="mes" class="form-control">
<option value="mes">Mes</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
</div>

<!-- Select Basic -->

<div class="col-md-2">
<select id="anio" name="anio" class="form-control">
<option value="anio">Año</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
</select>
</div></div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="cvv">Código de seguridad</label>
<div class="col-md-1">
<input id="cvv" name="cvv" type="text" placeholder="" class="form-control input-md" required="required" maxlength="3">
</div></div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="direccion">Dirección de entrega</label>
<div class="col-md-5">
<input id="direccion" name="direccion" type="text" placeholder="" class="form-control input-md" required="required" value="<?=isset($usuario) ? $usuario->direccion : '' ?>">
</div></div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="cp">Código Postal</label>
<div class="col-md-2">
<input id="cp" name="cp" type="text" placeholder="" class="form-control input-md" required="required" value="<?=isset($usuario) ? $usuario->cp : '' ?>">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="localidad">Localidad</label>
<div class="col-md-2">
<input id="localidad" name="localidad" type="text" placeholder="" class="form-control input-md" required="required" value="<?=isset($usuario) ? $usuario->localidad : '' ?>"></div></div>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="provincia">Provincia</label>
<div class="col-md-2">
<input id="provincia" name="provincia" type="text" placeholder="" class="form-control input-md" required="required" value="<?=isset($usuario) ? $usuario->provincia : '' ?>"></div></div>


<!-- Select Basic -->
<div class="form-group">
<label class="col-md-4 control-label" for="pais">País</label>
<div class="col-md-2">
<select id="pais" name="pais" class="form-control">
<?php foreach ($paises as $pais): ?>
	<option value='<?= $pais?>'><?= $pais?></option>
<?php endforeach;?>
</select>
</div></div>
 

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="mail">Email de contacto</label>
<div class="col-md-3">
<input id="mail" name="mail" type="email" placeholder="" class="form-control input-md" required="required" value="<?=isset($usuario) ? $usuario->mail1 : '' ?>">
<span class="help-block">Introduzca la dirección de correo electrónico en la que desea recibir la confirmación de compra.</span>

  </div>
</div>

<!-- Button -->

  <div class="col-md-4 col-md-offset-4">
    <input type="button" class="btn btn-success" id="continue" name="continue" value="Confirmar y Pagar">
  </div>
</form>
</fieldset>

</div>
</div>
</section>

<script type="text/javascript">
	function hola(){
		alert('hola');
	}	
</script>

<script type="text/javascript">
window.onload = function(){
	document.getElementById('continue').onclick = validarPago;
	document.getElementById('pais').onchange = hola;
	
}

	function validarTarjeta(){
		var valido = false;
		var miTarjeta = document.getElementById('tarjeta').value;
		if(/^[0-9]{16}$/.test(miTarjeta)){
			valido = true;
		}
		return valido;
	}

	function validarCVV(){
		var valido = false;
		var micvv = document.getElementById('cvv').value;
		if(/^[0-9]{3}$/.test(micvv)){
			valido = true;
		}
		return valido;
	}

	function validarMesExp(){
		var valido = false;
		var mesTarjeta = document.getElementById('mes').options[document.getElementById('mes').selectedIndex].value;
		if(mesTarjeta != 'mes'){
			valido = true;
		}
		return valido;
	}	

	function validarAnioExp(){
		var valido = false;
		var anioTarjeta = document.getElementById('anio').options[document.getElementById('anio').selectedIndex].value;
		if(anioTarjeta != 'anio'){
			valido = true;
		}
		return valido;
	}		
	
	function validarNombre(){
		var valido = false;
		var miNombre = document.getElementById("nombre").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miNombre) || miNombre == ""){
			valido = true;
		}
		return valido;
	}
	
	function validarApellidos(){
		var valido = false;
		var miApellido1 = document.getElementById("apellidos").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miApellido1) || miApellido1 == ""){
			valido = true;
		}
		return valido;
	}
		
	function validarMail(){
		var valido = false;
		var miMail = document.getElementById("mail").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail)){
			valido = true;
		}
		return valido;
	}

	function validarCP(){
		var valido = false;
		var miCP = document.getElementById("cp").value;
		//5 digitos
		if(/^[0-9]{5}$/.test(miCP)){
			valido = true;
		}
		return valido;
	}

	function validarDireccion(){
		var valido = false;
		var miDireccion = document.getElementById("direccion").value;
		if(miDireccion != ''){
			valido = true;
		}
		return valido;
	}	

	function validarLocalidad(){
		var valido = false;
		var miLocalidad = document.getElementById("localidad").value;
		if(miLocalidad != ''){
			valido = true;
		}
		return valido;
	}	

	function validarProvincia(){
		var valido = false;
		var miProvincia = document.getElementById("provincia").value;
		if(miProvincia != ''){
			valido = true;
		}
		return valido;
	}	


	function validarPago(){
		console.log('llego a la validación');
		var foco = true;
		
		//TARJETA
		var valTarjeta = validarTarjeta();
		if (valTarjeta == false){
			document.getElementById("tarjeta").style.color = "red";
			if (foco == true){
				document.getElementById("tarjeta").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("tarjeta").style.color = "black";
		}

		//CVV
		var valcvv = validarCVV();
		if (valcvv == false){
			document.getElementById("cvv").style.color = "red";
			if (foco == true){
				document.getElementById("cvv").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("cvv").style.color = "black";
		}

		//FECHA EXPIRACIÓN TARJETA
		var valMes = validarMesExp();
		if (valMes == false){
			document.getElementById("mes").style.color = "red";
			if (foco == true){
				document.getElementById("mes").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("mes").style.color = "black";
		}

		//AÑO EXPIRACIÓN TARJETA
		var valAnio = validarAnioExp();
		if (valAnio == false){
			document.getElementById("anio").style.color = "red";
			if (foco == true){
				document.getElementById("anio").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("anio").style.color = "black";
		}
		
		
		//NOMBRE
		var valNombre = validarNombre();
		if (valNombre == false){
			document.getElementById("nombre").style.color = "red";
			if (foco == true){
				document.getElementById("nombre").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("nombre").style.color = "black";
		}
		
		//APELLIDO1
		var valApellidos = validarApellidos();
		if (valApellidos == false){
			document.getElementById("apellidos").style.color = "red";
			if (foco == true){
				document.getElementById("apellidos").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("apellidos").style.color = "black";
		}
		
		//MAIL1
		var valMail = validarMail();
		if (valMail == false){
			document.getElementById("mail").style.color = "red";
			if (foco == true){
				document.getElementById("mail").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("mail").style.color = "black";
		}

		//CP
		var valCP = validarCP();
		if (valCP == false){
			document.getElementById("cp").style.color = "red";
			if (foco == true){
				document.getElementById("cp").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("cp").style.color = "black";
		}

		//DIRECCIÓN
		var valDireccion = validarDireccion();
		if (valDireccion == false){
			document.getElementById("direccion").style.color = "red";
			if (foco == true){
				document.getElementById("direccion").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("direccion").style.color = "black";
		}

		//LOCALIDAD
		var valLocalidad = validarLocalidad();
		if (valLocalidad == false){
			document.getElementById("localidad").style.color = "red";
			if (foco == true){
				document.getElementById("localidad").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("localidad").style.color = "black";
		}

		//PROVINCIA
		var valProvincia = validarProvincia();
		if (valProvincia == false){
			document.getElementById("provincia").style.color = "red";
			if (foco == true){
				document.getElementById("provincia").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("provincia").style.color = "black";
		}
		
		//Si todo esta a TRUE hace el submit
		if(valProvincia && valLocalidad && valDireccion && valCP && valMail && valApellidos && valNombre && valAnio && valMes && valcvv && valTarjeta){
			//alert('Datos correctos');
			document.form1.submit();
			//confirmacion();
			
			//return true;
		}else{
			//return false;
			//alert('Datos incorrectos');
		}
		
	}
		
</script>

