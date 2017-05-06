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
		if(miTexto >= 3 && miTexto <= 30){
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
		<div class="col-sm-5">
			<div id="idBanner" class="p-l-10"></div>
		</div>
	</div>	
	<form name="form1" class="form" id="idForm1">
	<div class="card-body card-padding">
		<input type="hidden" name="id_sesion" value="<?= session_id()?>">
		<input type="hidden" name="id_usuario" value="<?= isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null ?>">
	
		<input type="hidden" name="rotacion" id="rotacion" value="-30">
		<input type="hidden" name="coordenadaX" value="25">
		<input type="hidden" name="coordenadaY" value="25">
		
	<div class="row">
	
	<div class="form-group fg-line">
		<label for="idNombreDiseno">Nombre del Diseño </label> 
		<input class="form-control input-sm" id="idNombreDiseno" type="text" name="nombre_diseno" maxlength="30" required="required" placeholder="completa este campo" title="El Texto puede contener entre 3 y 30 caracteres"> <br/>
	</div>
	
	<div class="form-group fg-line">
		<label for="idComentarioDiseno">Comentario del Diseño </label> 
		<textarea class="form-control" id="idComentarioDiseno" name="comentario_diseno" maxlength="200"></textarea> <br/>
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
<!-- 
		$id_imagen = $_POST['id_imagen'];
		$tamano_imagen = $_POST['tamano_imagen'];
		$rotacion_imagen = $_POST['rotacion_imagen'];
		$coordenada_x = $_POST['coordenada_x'];
		$coordenada_y = $_POST['coordenada_y'];
		$profundidad_z = $_POST['profundidad_z'];
		$id_texto = $_POST['id_texto'];
		$precio = $_POST['precio']; //precio de imagen + texto
		$coste = $_POST['coste'];
 -->	
	<div class="form-group col-xs-3">	
		<label for="idColor">Color </label>
		<select class="form-control" id="idColor" name="idColor">         
 			<option value='1'>Seleccione uno</option>       	
 		<?php foreach ($body['colores'] as $color): ?>
 			<option value='<?= $color['id']?>'><?= $color['valor']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="row">
		<input class="btn btn-primary btn-sm m-t-10" id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
	</div>

	</div>
	</div>
	</form>
</div>