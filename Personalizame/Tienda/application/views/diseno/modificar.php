<script type="text/javascript">
	
	function validarNombreDiseno(){
		var valido = false;
		var miDiseno = document.getElementById("idNombreDiseno").value.length;
		//longitud entre 3 y 30 caracteres
		if(miDiseno >= 3 && miDiseno <= 30){
			valido = true;
		}
		return valido;
	}
	
	function validarTodo(){
		var foco = true;
		
		//NOM DISEÑO
		var valDiseno = validarNombreDiseno();
		if (valDiseno == false){
			document.getElementById("idNombreDiseno").style.color = "red";
			if (foco == true){
				document.getElementById("idNombreDiseno").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNombreDiseno").style.color = "black";
		}
		
		//Si todo esta a TRUE hace el submit
		if(valDiseno){
			document.form1.submit();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>

<div class="card">
	<div class="card-header">
		<h2>Modificar Diseño</h2>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div id="idBanner"></div>
		</div>
	</div>	
	<form name="form1" class="form" id="idForm1" action="<?=base_url() ?>diseño/modificarPost2" method="post">
	<div class="card-body card-padding">		
		<!-- campos ocultos que pasarán los datos del canvas de la imagen -->
		<input type="hidden" name="tamano_imagen" value="<?= $body['diseno']->tamano_imagen ?>">
		<input type="hidden" name="rotacion_imagen" value="<?= $body['diseno']->rotacion_imagen ?>">
		<input type="hidden" name="coordenada_x" value="<?= $body['diseno']->coordenada_x ?>">
		<input type="hidden" name="coordenada_y" value="<?= $body['diseno']->coordenada_y ?>">
		<input type="hidden" name="profundidad_z" value="<?= $body['diseno']->profundidad_z ?>">
		
		<!-- campos ocultos con el calculo precio y coste de imagen + texto seleccionados-->
		<input type="hidden" name="precio" value="<?= $body['diseno']->precio ?>">
		<input type="hidden" name="coste" value="<?= $body['diseno']->coste ?>">
		
		<div class="row">
			<div class="col-sm-4">
				<div class="cp-container">
	
					<div class="form-group fg-line">
						<label for="idNombreDiseno">Nombre del Diseño </label> 
						<input class="form-control input-sm" id="idNombreDiseno" type="text" name="nombre_diseno" maxlength="30" required="required" placeholder="completa este campo" title="El Texto puede contener entre 3 y 30 caracteres" value="<?= $body['diseno']->nombre_diseno ?>">
					</div>
	
					<div class="form-group fg-line">
						<label for="idComentarioDiseno">Comentario del Diseño </label> 
						<textarea class="form-control" id="idComentarioDiseno" name="comentario_diseno" maxlength="200"><?= $body['diseno']->comentario_diseno ?></textarea>
					</div>
	
					<label>Ubicación</label>
					<div class="radio m-b-15">
				       	<label>
				           	<input type="radio" name="ubicacion" value="Frontal" checked="checked">
				            <i class="input-helper"></i>
				               	Frontal
				        </label>
				    </div>
				    <div class="radio m-b-15">
				       	<label>
				           	<input type="radio" name="ubicacion" value="Trasera">
				            <i class="input-helper"></i>
				               	Trasera
				        </label>
				    </div>
 				</div>
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15" id="select-form">Seleccione Texto</p>
					<select class="form-control" id="idTexto" name="id_texto">         
			 			<option value='0'>Ninguno</option>       	
			 		<?php foreach ($body['textos'] as $texto): ?>
			 			<?php if($body['diseno']->texto == $texto):?>
			 				<option value='<?= $texto['id']?>' selected="selected"><?= $texto['datos_texto']?></option>
			 			<?php else:?>
			 				<option value='<?= $texto['id']?>'><?= $texto['datos_texto']?></option>
			 			<?php endif;?>
					<?php endforeach;?>
			        </select>
				</div>
				
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15" id="select-form">Seleccione Imagen</p>
					<select class="form-control" id="idImagen" name="id_imagen">         
			 			<option value='0'>Ninguno</option>       	
			 		<?php foreach ($body['imagenes'] as $imagen): ?>
			 			<?php if($body['diseno']->imagen == $imagen):?>
			 				<option value='<?= $imagen['id']?>' selected="selected"><?= $imagen['nombre_imagen']?></option>
			 			<?php else:?>
			 				<option value='<?= $imagen['id']?>'><?= $imagen['nombre_imagen']?></option>
			 			<?php endif;?>
					<?php endforeach;?>
			        </select>
				</div>
				
			</div>
		</div>
		<div class="row">
			<input class="btn btn-primary btn-sm m-t-10" id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
		</div>
	</div>
	</form>
</div>