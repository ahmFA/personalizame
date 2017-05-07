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
		conexion.open('POST', '<?=base_url() ?>diseno/crearPost', true);
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
			//document.form1.submit();
			crear();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>

<div class="card">
	<div class="card-header">
		<h2>Diseño</h2>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div id="idBanner"></div>
		</div>
	</div>	
	<form name="form1" class="form" id="idForm1">
	<div class="card-body card-padding">
		<!-- campos ocultos para conocer el autor -->
		<input type="hidden" name="id_sesion" value="<?= session_id()?>">
		<input type="hidden" name="id_usuario" value="<?= isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null ?>">
		
		<!-- campos ocultos que pasarán los datos del canvas de la imagen -->
		<input type="hidden" name="tamano_imagen" value="150x200">
		<input type="hidden" name="rotacion_imagen" value="30">
		<input type="hidden" name="coordenada_x" value="10">
		<input type="hidden" name="coordenada_y" value="15">
		<input type="hidden" name="profundidad_z" value="-3">
		
		<!-- campos ocultos con el calculo precio y coste de imagen + texto seleccionados-->
		<input type="hidden" name="precio" value="6">
		<input type="hidden" name="coste" value="2.5">
		
		<div class="row">
			<div class="col-sm-4">
				<div class="cp-container">
	
					<div class="form-group fg-line">
						<label for="idNombreDiseno">Nombre del Diseño </label> 
						<input class="form-control input-sm" id="idNombreDiseno" type="text" name="nombre_diseno" maxlength="30" required="required" placeholder="completa este campo" title="El Texto puede contener entre 3 y 30 caracteres">
					</div>
	
					<div class="form-group fg-line">
						<label for="idComentarioDiseno">Comentario del Diseño </label> 
						<textarea class="form-control" id="idComentarioDiseno" name="comentario_diseno" maxlength="200"></textarea>
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
			 			<option value='0'>Seleccione uno</option>       	
			 		<?php foreach ($body['textos'] as $texto): ?>
			 			<option value='<?= $texto['id']?>'><?= $texto['datos_texto']?></option>
					<?php endforeach;?>
			        </select>
				</div>
				
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15" id="select-form">Seleccione Imagen</p>
					<select class="form-control" id="idImagen" name="id_imagen">         
			 			<option value='0'>Seleccione uno</option>       	
			 		<?php foreach ($body['imagenes'] as $imagen): ?>
			 			<option value='<?= $imagen['id']?>'><?= $imagen['nombre_imagen']?></option>
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