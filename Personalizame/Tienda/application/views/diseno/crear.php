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
		<input type="hidden" name="id_usuario" value="<?= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario'] : null ?>">
		
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

<div class="container">
	<div class="form-group col-xs-12">
		<h2>Pruebas con el diseño</h2>
		<input class="btn btn-primary" id="idBotonVer" type="button" value="Ver como queda" onclick="ver();">
		<div id="marco" style="width: 150px; height: 250px; border: 1px solid black">
			<canvas id="canvas" width="150" height="250"></canvas>
		</div>
	</div>	
</div>

<script type="text/javascript">
	//Objeto Canvas.
	var canvas = document.getElementById('canvas');
	
	// Objeto Contexto 2D.
	var Rxt = canvas.getContext('2d');

	Rxt.clearRect(0, 0, canvas.width, canvas.height); //limpiar
	
	// Rotar Imagen.
	//Rxt.rotate(.2);

	//calcular el punto medio
	var mitadAncho = canvas.width/2;
	var mitadAlto = canvas.height/2;

	//nos posicionamos en el punto medio
	//ctx.translate(mitadAncho, mitadAlto);

	// Se crea una imagen.
	var Img = new Image();//document.createElement('img');
	Img.src = '<?=base_url() ?>assets/images/25.jpg';
	var imagenAncho = Img.height/4;
	var imagenAlto = Img.width/3.4;
	alert((imagenAncho/2));
	alert((imagenAlto/2));
	Img.onload = function () { 
	    Rxt.drawImage(Img, mitadAncho-(imagenAncho/2), mitadAlto-(imagenAlto/2), imagenAncho, imagenAlto); 
	}
	
	var down = false;
	Rxt.canvas.addEventListener('mousedown', function () { 
	    down = true; 
	}, false);
	Rxt.canvas.addEventListener('mouseup', function () { 
	    down = false; 
	    document.body.style.cursor = 'default';
	}, false);
	Rxt.canvas.addEventListener('mousemove', function (e) {
	    if (down){
	        //Rxt.translate(0, -50);
	        document.body.style.cursor = 'move';
	        clear();
	        Rxt.drawImage(Img, e.offsetX,
	        e.offsetY, imagenAncho, imagenAlto);
	        //Rxt.translate(0, 0);
	    }
	}, false);
	
	// Funcion limpiar image.
	function clear(){
	    Rxt.clearRect(-1000, -1000, 2000, 2000);
	}

	function ver(){
		var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
		window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
	}

</script>