<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui.js"></script>
<div class="hidden">
<script type="text/javascript">

//precarga de imagenes para que sean seleccionables directamente desde el select
//las pongo a pelo para pruebas lo ideal sería cargar las que haya en la carpeta automaticamente
//o leerlas de alguna forma con ajax segun la que se seleccione
var images = new Array()
function preload() {
	for (i = 0; i < preload.arguments.length; i++) {
		images[i] = new Image()
		images[i].src = preload.arguments[i]
	}
}
preload(
	"../../../../img/imagenes/girar.png",
	"../../../../img/imagenes/redimensionar.png"
)
</script>
</div>
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
					<select class="form-control" id="idImagen" name="id_imagen" onchange="pintar()">         
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
		<input class="btn btn-primary" id="idBotonGirar" type="button" value="Girar" onclick="girar();">
		<div id="marco" style="width: 150px; height: 250px; border: 1px solid black">
			<canvas id="canvas" width="150" height="250"></canvas>
		</div>
	</div>	
</div>

<script type="text/javascript">
//guardar como png
var dataUrl;

//Objetos Canvas.
var canvas,canvas2;

// Objetos Contexto 2D.
var Rxt,Rxt2;

function pintar(){
	canvas = document.getElementById('canvas');

	Rxt = canvas.getContext('2d');
	
	Rxt.clearRect(0, 0, canvas.width, canvas.height); //limpiar
	
	// Rotar Imagen.
	//Rxt.rotate(.2);

	//calcular el punto medio
	var mitadAncho = canvas.width/2;
	var mitadAlto = canvas.height/2;

	// Se crea una imagen.
	var Img = new Image();	//document.createElement('img');

	//cargar y pintar la imagen en el centro del canvas
	Img.addEventListener('load', function() {
		    Rxt.drawImage(Img, mitadAncho-(imagenAncho/2), mitadAlto-(imagenAlto/2), imagenAncho, imagenAlto); 
		}, false);
	Img.src = '../../../../img/imagenes/'+$("#idImagen option:selected").text();
	
	//calcular tamano imagen en canvas
	var imagenAncho = Img.width;
	var imagenAlto = Img.height;
	var imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
	var reduccion = 1;  //las veces que se reduce la imagen hasta entrar en el canvas
	/*
		He metido la hipotenusa para tenerla en cuenta al girar y no se salga del canvas
	*/
	
	while(imagenAncho > canvas.width || imagenAlto > canvas.height || imagenHipo > canvas.width){
		imagenAncho = imagenAncho/2;
		imagenAlto = imagenAlto/2;
		imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
		reduccion = reduccion * 2;	
	}
	//alert(reduccion);
	
	var coorX, coorY;
		
	var down = false;
	Rxt.canvas.addEventListener('mousedown', function () { 
	    down = true; 
	}, false);
	Rxt.canvas.addEventListener('mouseup', function () { 
	    down = false; 
	    document.body.style.cursor = 'default';
	}, false);
	Rxt.canvas.addEventListener('mousemove', function (e) {
	
	    document.body.style.cursor = 'move';
	    if (down){
		    //imagen no llega al limite derecho ni inferior
	    	if(e.offsetX + imagenAncho < canvas.width && e.offsetY + imagenAlto < canvas.height){
	    		coorX = e.offsetX;
	    		coorY = e.offsetY;
	    	}
	    	
	    	//imagen no llega al limite derecho pero si al inferior
	    	if(e.offsetX + imagenAncho < canvas.width && e.offsetY + imagenAlto >= canvas.height){
	    		coorX = e.offsetX;
	    		coorY = canvas.height - imagenAlto;
	    	}

	    	//imagen si llega al limite derecho pero no al inferior
	    	if(e.offsetX + imagenAncho >= canvas.width && e.offsetY + imagenAlto < canvas.height){
	    		coorX = canvas.width - imagenAncho;
	    		coorY = e.offsetY;
	    	}

	    	//imagen si llega al limite derecho y al inferior
	    	if(e.offsetX + imagenAncho >= canvas.width && e.offsetY + imagenAlto >= canvas.height){
	    		coorX = canvas.width - imagenAncho;
	    		coorY = canvas.height - imagenAlto;
	    	}

		    clear();
        	Rxt.drawImage(Img, coorX, coorY, imagenAncho, imagenAlto);
        	dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
	    }
	}, false);
	
	// Funcion limpiar image.
	function clear(){
	    Rxt.clearRect(-1000, -1000, 2000, 2000);
	}
}

var rotacion=0.2;

function girar(){
	// canvas auxiliar que será una copia del primero
	canvas2 = canvas;
	Rxt2 = canvas2.getContext("2d");

	// indica donde se encuentra la imagen del primer canvas  
	var img = new Image();
	img.src = dataUrl; 

	//calcular el punto medio
	var mitadAncho = canvas.width/2;
	var mitadAlto = canvas.height/2;

	//limpiamos el primer canvas para que no se vea
	canvas.width=canvas.width;	
	
	//nos posicionamos en el punto medio
	Rxt2.translate(mitadAncho, mitadAlto);

	//rotamos los grados que pasemos
	Rxt2.rotate(rotacion); 
	rotacion = rotacion +0.2;

	//una vez cargada la imagen la dibujamos
	img.onload = function(){
		Rxt2.drawImage(img, -mitadAncho, -mitadAlto);
	}
	
}

function ver(){
	var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
	window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
}

</script>
