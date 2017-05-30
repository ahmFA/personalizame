<style>
.hidden{
	visible: none;
	z-index: -100;
}
#objeto{
	background-image: url("<?=base_url()?>assets/images/PruebaCamiseta.png");
}
#marco{
	position: absolute;
	border: 1px solid blue;
	margin-left: 98px;    
    margin-top: 60px;
}
#canvas{
	position: absolute;
	border: 1px solid blue;
}
</style>
<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/fabric.js"></script>

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
	"../../../../img/imagenes/redimensionar.png",
	"../../../../img/imagenes/img_perrito.png"
	
)
</script>

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
		<input type="hidden" name="rotacion_imagen" id="rotacion_imagen">
		<input type="hidden" name="img_coordenada_x" id="img_coordenada_x">
		<input type="hidden" name="img_coordenada_y" id="img_coordenada_y">
		<input type="hidden" name="tamano_imagen" id="tamano_imagen">
		<input type="hidden" name="img_profundidad_z" id="img_profundidad_z">
		
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
			 			<option value='<?= $texto['id']?>' 
			 					data-tamano_fuente="<?= $texto['tamano_fuente']?>"
			 					data-fuente="<?= $texto['fuente']->nombre?>"
			 					data-color="<?= $texto['color']->valor?>"
			 					data-texto_ancho="<?= $texto['texto_ancho']?>"
			 					data-texto_alto="<?= $texto['texto_alto']?>"
			 					data-coordenada_x="<?= $texto['coordenada_x']?>"
			 					data-coordenada_y="<?= $texto['coordenada_y']?>"
			 					data-rotacion="<?= $texto['rotacion']?>"
			 					><?= $texto['datos_texto']?></option>
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
		

		<div class="container">
			<div class="form-group col-xs-12">
			<br/><br/>
				<h2>Modificalo a tu gusto</h2>
				<input id="idBotonVer" type="button" value="Vista Previa" onclick="ver();">
				<div id="objeto" style="width: 350px; height: 350px">
					<div id="marco" style="width: 150px; height: 250px; border: 1px solid black">
						<canvas id="canvas" width="150" height="250"></canvas>
					</div>
				</div>
			</div>	
		</div>
		<img id="my-image" class="hidden"/>

		<div class="row">
			<input id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
		</div>
	</div>
	</form>
</div>

<script>
/*
var canvas = window._canvas = new fabric.Canvas('c'),
    lastAdded = window._lastAdded = [];

//Random color generater
function random_color(){
    return '#'+Math.floor(Math.random()*16777215).toString(16);
}

$(document).on('click', '#add', function(){
    canvas.add(new fabric.Rect({
        left: 200,
        top: 200,
        height: 50,
        width: 50,
        fill: random_color()
    }));
});

canvas.on('object:added', function(e) {
 lastAdded.push(e.target);
});


$(document).on('click', '#test' , function(){
    var lastObject = lastAdded[lastAdded.length - 1];
    if (!lastObject) return;

    if (canvas.getObjects().indexOf(lastObject) > -1) {
     lastAdded.pop();
     canvas.remove(lastObject);
     canvas.renderAll();
    }
});
*/
</script>

<script>
	var canvas = new fabric.Canvas('canvas');
    var imgElement;
    var imgInstance;
    var text;
	var id,str,n;
	
	$("#idImagen").on({
		'change':function(){
		
		selectImagen();
		}
	})
	
	$("#idTexto").on({
		'change':function(){
		
		pintarTexto();
		}
	})
	
	function pintarTexto(){
	//limpiar lo anterior
	canvas.remove(text);

	//pintar      
	text = new fabric.Text($("#idTexto option:selected").text(), { 
		left: $("#idTexto option:selected").data("coordenada_x"), 
		top: $("#idTexto option:selected").data("coordenada_y"),
		fontFamily: $("#idTexto option:selected").data("fuente"),
		fontSize: $("#idTexto option:selected").data("tamano_fuente"),
		fill: $("#idTexto option:selected").data("color"),
		angle: $("#idTexto option:selected").data("rotacion")
	});
	canvas.add(text);  

	//para controlar el ultimo id y dar formato a los puntos de redimensionar
	var id = (canvas.size()-1);
	
	//deshabilito algunos de los puntos de cambio de tamaño
	canvas.item(id).setControlVisible('mb',false);
	canvas.item(id).setControlVisible('ml',false);
	canvas.item(id).setControlVisible('mr',false);
	canvas.item(id).setControlVisible('mt',false);

	//quito vordes y coloreo esquinas de redimensionar
	canvas.item(id).set({
		hasBorders: false,
	    cornerColor: 'green',
	    cornerSize: 6,
	    transparentCorners: false,
	    rotatingPointOffset: 5,
	  });

/* 
 * ++++++++++++++++++++++ AQUI VAN LOS DATOS DE TEXTO CUANDO LO MUEVA  +++++++++++++
 * +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */
	  
	}
	
	function selectImagen(){
		//borrar imagen anterior
		var imagen = document.getElementById('my-image');
		imagen.parentNode.removeChild(imagen);

		//crear imagen nueva
		imagen = document.createElement("img"); 
        imagen.setAttribute("src", '../../../../img/imagenes/'+$("#idImagen option:selected").text()); 
        imagen.setAttribute("id","my-image");
		imagen.setAttribute("class","hidden");	

		//aplicar la reduccion necesaria para que entre en el canvas sin salirse
		var reduce = calcularTamanoImagen(imagen);

		imagen.setAttribute("width", imagen.width*reduce);
		imagen.setAttribute("height",imagen.height*reduce);
		
        var div = document.getElementById("marco"); 
        div.appendChild(imagen);     

		pintar();    
	}
	
	function calcularTamanoImagen(imagen){
		//calcular tamano imagen para que entre en el canvas
		imagenAncho = imagen.width;
		imagenAlto = imagen.height;
		imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
		reduccion = 1;  //las veces que se reduce la imagen hasta entrar en el canvas

		while(imagenAncho > $("#canvas").width() || imagenAlto > $("#canvas").height() || imagenHipo > $("#canvas").width()){
			imagenAncho = imagenAncho*0.8;
			imagenAlto = imagenAlto*0.8;
			imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
			reduccion = reduccion * 0.8;//1.25	
		}
		return reduccion;
	}
	
	function pintar(){
		//limpiar la imagen anterior
		canvas.remove(imgInstance);

		//pintar        
        imgElement = document.getElementById('my-image');
        imgInstance = new fabric.Image(imgElement, {
          left: 10,
          top: 50,
          angle: 0,
          opacity: 1
        });
        canvas.add(imgInstance);

		//para controlar el ultimo id y dar formato a los puntos de redimensionar
        var id = (canvas.size()-1);
        
      	//deshabilito algunos de los puntos de cambio de tamaño
    	canvas.item(id).setControlVisible('mt',false);

    	//quito vordes y coloreo esquinas de redimensionar
    	canvas.item(id).set({
    		hasBorders: false,
    	    cornerColor: 'green',
    	    cornerSize: 6,
    	    transparentCorners: false,
    	    rotatingPointOffset: 5,
    	});

    	prepararDatos();
	}

	//ver la coordenada, tamaño y angulo
	canvas.on('mouse:up', function(options) {
		prepararDatos();
	});

	function prepararDatos(){
		document.getElementById("img_coordenada_x").value = imgInstance.getLeft().toFixed();
		document.getElementById("img_coordenada_y").value = imgInstance.getTop().toFixed();
		document.getElementById("rotacion_imagen").value = imgInstance.getAngle().toFixed();
		document.getElementById("tamano_imagen").value = imgInstance.getWidth().toFixed()+","+imgInstance.getHeight().toFixed();
		document.getElementById("img_profundidad_z").value = -1; //va a pelo x ahora no se como sacarlo del canvas
	}
	
function ver(){
	var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
	window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
}

</script>

<!--  
/*
$(document).ready(function(){
	$('#canvas2').on({
		'mousemove' : function (e) { 
	   var x = e.offsetX;
	   var y = e.offsetY;
	   
	   var div = document.getElementById("kk");
	   div.innerHTML = "x: " + x + " y: " + y; 

	}
	});
});

//declaracion de variables
	$("#ImgPrueba").draggable({
		cursor:"move", 
		drag: function(event, ui){
			$("#posx").text(ui.position.left);
		    $("#posy").text(ui.position.top);
		    ui.position.left = Math.min( ui.position.left-$("#canvas2").width(), ui.position.left );
		}	
	})
	
	//alert("left: " + $("#canvas2").position().left+"top: " + $("#canvas2").position().top);
$(document).ready(function(){
	var dataUrl, imagen, posicion;
	var canvas, Rxt, mitadAncho, mitadAlto, Img, imagenAncho, imagenAlto, imagenHipo, reduccion;
	var rotacion= 0;
	var TO_RADIANS = Math.PI/180;

	
	
	$("#idImagen").on({
		'change':function(){
		mitadAncho = $("#canvas2").width()/2;
		mitadAlto = $("#canvas2").height()/2;
		rotacion= 0;
	
		selectImagen();
		calcularTamanoImagen(Img);
		pintarCentro();
		}
	})
	
	function selectImagen(){
		Img = new Image();
		Img.src = '../../../../img/imagenes/'+$("#idImagen option:selected").text();
	}
	
	function calcularTamanoImagen(imagen){
		//calcular tamano imagen en canvas
		imagenAncho = imagen.width;
		imagenAlto = imagen.height;
		imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
		reduccion = 1;  //las veces que se reduce la imagen hasta entrar en el canvas
		/*
			He metido la hipotenusa para tenerla en cuenta al girar y no se salga del canvas
		/
		alert(document.getElementById("canvas2").width);
		while(imagenAncho > $("#canvas2").width() || imagenAlto > $("#canvas2").height() || imagenHipo > $("#canvas2").width()){
			imagenAncho = imagenAncho*0.8;
			imagenAlto = imagenAlto*0.8;
			imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
			reduccion = reduccion * 1.25;	
			alert("entro");
		}
		alert(imagenAncho);
		alert(imagenAlto);
	}

	function pintarCentro(){
		//pintar la imagen en el centro del div

		imagen = document.getElementById("ImgPrueba");
		imagen.src = '../../../../img/imagenes/'+$("#idImagen option:selected").text();
		imagen.width = imagenAncho;
		imagen.height = imagenAlto;	
		
	}
	
	function rotateImage(degree) {
		$('#ImgPrueba').animate({  transform: degree }, {
	    step: function(now,fx) {
	        $(this).css({
	            '-webkit-transform':'rotate('+now+'deg)', 
	            '-moz-transform':'rotate('+now+'deg)',
	            'transform':'rotate('+now+'deg)'
	        });
	    }
	    });
	}
	
	function pintarCoordenada(x,y){
		//cargar y pintar la imagen en la coordenada indicada
		Img.addEventListener('load', function() {
			    Rxt.drawImage(Img, x, y, imagenAncho, imagenAlto); 
			}, false);
	}
	
	
	/*
	//Mover la imagen por el canvas sin que pueda salirse de los bordes
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
		    if (down){
		    	document.body.style.cursor = 'move';
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
	
	// Funcion limpiar imagen
	function clear(){
	    Rxt.clearRect(-1000, -1000, 2000, 2000);
	}
		
	function loop(){
		clear();	
		selectImagen();
		calcularTamanoImagen(Img);
		
		pintarImgRotada(Img, canvas.width/2, canvas.height/2,imagenAncho,imagenAlto, rotacion);
		rotacion +=2;
	}
	
	function pintarImgRotada(image, x, y, imgAncho,imgAlto, angle) {  
		// save the current co-ordinate system 
		// before we screw with it
		Rxt.save(); 
		 
		// move to the middle of where we want to draw our image
		Rxt.translate(x, y);
		 
		// rotate around that point, converting our 
		// angle from degrees to radians 
		Rxt.rotate(angle * TO_RADIANS);
		 
		// draw it up and to the left by half the width
		// and height of the image 
		Rxt.drawImage(image, -(imgAncho/2), -(imgAlto/2), imgAncho, imgAlto);
		 
		// and restore the co-ords to how they were when we began
		Rxt.restore(); 
	}	
	/
	
	function ver(){
		var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
		window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
	}
});
*/
-->