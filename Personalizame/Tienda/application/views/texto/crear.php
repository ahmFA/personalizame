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
		conexion.open('POST', '<?=base_url() ?>texto/crearPost', true);
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
	
	function validarDatosTexto(){
		var valido = false;
		var miTexto = document.getElementById("idDatosTexto").value.length;
		//longitud entre 1 y 20 caracteres
		if(miTexto >= 1 && miTexto <= 20){
			valido = true;
		}
		return valido;
	}
	
	function validarTodo(){
		var foco = true;
		
		//TEXTO
		var valTexto = validarDatosTexto();
		if (valTexto == false){
			document.getElementById("idDatosTexto").style.color = "red";
			if (foco == true){
				document.getElementById("idDatosTexto").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idDatosTexto").style.color = "black";
		}
		
		//Si todo esta a TRUE hace el submit
		if(valTexto){
			//document.form1.submit();
			crear();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>

<div class="container">
	<div id="idBanner"></div>
	<div class="form-group col-xs-12">
		<h2>Texto</h2>
	</div>
	
	<form name="form1" class="form" id="idForm1">
	
	<input type="hidden" name="idSesion" value="<?= session_id()?>">
	<input type="hidden" name="idUsuario" value="<?= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : null ?>">
	<input type="hidden" name="rotacion" value="25">
	<input type="hidden" name="coordenadaX" value="25">
	<input type="hidden" name="coordenadaY" value="25">
	
	<div class="form-group col-xs-3">
		<label for="idDatosTexto">Texto </label> 
		<input class="form-control" id="idDatosTexto" type="text" name="datosTexto" maxlength="20" required="required" placeholder="completa este campo" title="El Texto puede contener entre 1 y 20 caracteres"> <br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idTamano">Tamaño </label>
		<select class="form-control" id="idTamano" name="idTamano">         
 			<option value='1'>Seleccione uno</option>       	
 		<?php foreach ($body['tamanos'] as $tamano): ?>
 			<option value='<?= $tamano['id']?>'><?= $tamano['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idFuente">Fuente </label>
		<select class="form-control" id="idFuente" name="idFuente">         
 			<option value='1'>Seleccione una</option>       	
 		<?php foreach ($body['fuentes'] as $fuente): ?>
 			<option value='<?= $fuente['id']?>'><?= $fuente['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idColor">Color </label>
		<select class="form-control" id="idColor" name="idColor">         
 			<option value='1'>Seleccione uno</option>       	
 		<?php foreach ($body['colores'] as $color): ?>
 			<option value='<?= $color['id']?>'><?= $color['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
	</div>
	
	</form>
</div>