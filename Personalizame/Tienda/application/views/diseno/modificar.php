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
			document.form1.submit();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>

<div class="container">
	<div id="idBanner"></div>
	<div class="form-group col-xs-12">
		<h2>Modificar texto</h2>
	</div>
	
	<form name="form1" class="form" action="<?=base_url() ?>texto/modificarPost2" method="post">
	
	<!-- campos ocultos para volver al filtro en la misma posicion y ver los resultados del cambio -->
	<input type="hidden" name="filtroDatosTexto" value="<?= $body['filtroDatosTexto'] ?>">
	<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
	<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
	<input type="hidden" name="idTexto" value="<?= $body['texto']->id ?>">
	
	<input type="hidden" name="rotacion" value="25">
	<input type="hidden" name="coordenadaX" value="25">
	<input type="hidden" name="coordenadaY" value="25">
	<input type="hidden" name="disponible" value="Si">
	
	<div class="form-group col-xs-3">
		<label for="idDatosTexto">Texto </label> 
		<input class="form-control" id="idDatosTexto" type="text" name="datosTexto" maxlength="20" required="required" placeholder="completa este campo" title="El Texto puede contener entre 1 y 20 caracteres" value="<?= $body['texto']->datosTexto ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idTamano">Tamaño </label>
		<select class="form-control" id="idTamano" name="idTamano">   
		<?php foreach ($body['tamanos'] as $tamano): ?>
			<?php $aux='';  if($tamano['id'] == $body['texto']->tamano_id){$aux='selected="selected"';}?>     
 			<option value='<?= $tamano['id']?>' <?= $aux ?>><?= $tamano['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idFuente">Fuente </label>
		<select class="form-control" id="idFuente" name="idFuente">         
   		<?php foreach ($body['fuentes'] as $fuente): ?>
			<?php $aux='';  if($fuente['id'] == $body['texto']->fuente_id){$aux='selected="selected"';}?>     
 			<option value='<?= $fuente['id']?>' <?= $aux ?>><?= $fuente['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idColor">Color </label>
		<select class="form-control" id="idColor" name="idColor">         
 		<?php foreach ($body['colores'] as $color): ?>
			<?php $aux='';  if($color['id'] == $body['texto']->color_id){$aux='selected="selected"';}?>     
 			<option value='<?= $color['id']?>' <?= $aux ?>><?= $color['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
	</div>
	
	</form>
</div>