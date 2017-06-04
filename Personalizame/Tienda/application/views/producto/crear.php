<style id="idFondo_articulo">
.objeto{
	z-index: -200; 
	background-repeat: no-repeat; 
	background-image: url(../../../../img/articulos/default.png);
	background-color: white; 
}
#marco_back,#marco_front{
	position: absolute;
	margin-left: 30px;    
    margin-top: 40px;
}
#canvas_back,#canvas_front{
	position: absolute;
	border: 1px solid blue;
}
.hidden{
	visible: none;
	z-index: -300;
}
.objeto_final{
	z-index: -200; 
	background-color: white; 
}
#marco_final{
	position: absolute;
	margin-left: 0px;    
    margin-top: 0px;
}
#canvas_final{
	position: absolute;
	border: 1px solid blue;
}
</style>
<!--marco para taza margin-left   , margin-top -->


<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/fabric.js"></script>

<script type="text/javascript">

//precarga de imagenes para que sean seleccionables directamente desde el select
//las pongo a pelo para pruebas lo ideal sería cargar las que haya en la carpeta automaticamente
//o leerlas de alguna forma con ajax segun la que se seleccione

/*
var images = new Array()
function preload() {
	for (i = 0; i < preload.arguments.length; i++) {
		images[i] = new Image()
		images[i].src = preload.arguments[i]
	}
}
preload(
	"../../../../img/articulos/art_taza350x350.png",
	"../../../../img/articulos/art_contorno.png",
	"../../../../img/articulos/art_cocacola.png"
)
*/
</script>

<script type="text/javascript">
var conexion;

	//conexion Ajax para mostrar las opciones del articulo seleccionado
	function crearElementosArticulo(){
		conexion = new XMLHttpRequest();

		var datos = "id_articulo="+document.getElementById("idArticulo").value;
		conexion.open('POST', '<?=base_url()?>producto/mostrarElementosArticulo', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datos);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				mostrarElementosArticulo();
			}
		}
	}

	//mostrar las opciones del articulo seleccionado y llamada a la img de fondo del articulo
	function mostrarElementosArticulo(){
		document.getElementById("idElementosArticulo").innerHTML = conexion.responseText ;
		crearFondoArticulo();
	}

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;
		document.getElementById("idForm1").reset();
		document.getElementById("idElementosArticulo").innerHTML ="";
	}

	function crear() {
		conexion = new XMLHttpRequest();

		var datosSerializados = serialize(document.getElementById("idForm1"));
		conexion.open('POST', '<?=base_url() ?>producto/crearPost', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datosSerializados);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}

	//conexion Ajax para traer el fondo del articulo seleccionado y el color
	function crearFondoArticulo(){
		conexion = new XMLHttpRequest();
		
		var datos = "id_articulo="+document.getElementById("idArticulo").value+"&id_color_base="+$('input[name="id_color_base"]:checked').data("valor");
		conexion.open('POST', '<?=base_url()?>producto/mostrarFondoArticulo', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datos);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				mostrarFondoArticulo();
			}
		}
	}

	//mostrar el fondo seleccionado en este caso background en estylo css
	function mostrarFondoArticulo(){
		document.getElementById("idFondo_articulo").innerHTML = "";
		document.getElementById("idFondo_articulo").innerHTML = conexion.responseText ;
	}

	//conexion Ajax para traer el listado de imagenes de la categoría seleccionada
	function crearListaImagenes(){
		conexion = new XMLHttpRequest();
		
		var datos = "id_categoria="+document.getElementById("idCategoria").value;
		conexion.open('POST', '<?=base_url()?>producto/mostrarListaImagenes', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datos);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				mostrarListaImagenes();
			}
		}
	}

	//mostrar las imagenes que se corresponden con la categoria marcada
	function mostrarListaImagenes(){
		document.getElementById("idListaImagenes").innerHTML = "";
		document.getElementById("idListaImagenes").innerHTML = conexion.responseText ;
	}
	
</script>

<script type="text/javascript">
	
	function validarNombreProducto(){
		var valido = false;
		var miProducto = document.getElementById("idNombreProducto").value.length;
		//longitud entre 3 y 30 caracteres
		if(miProducto >= 3 && miProducto <= 30){
			valido = true;
		}
		return valido;
	}
	
	function validarTodo(){
		var foco = true;
		
		//NOM PRODUCTO
		var valProducto = validarNombreProducto();
		if (valProducto == false){
			document.getElementById("idNombreProducto").style.color = "red";
			if (foco == true){
				document.getElementById("idNombreProducto").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNombreProducto").style.color = "black";
		}
		
		//Si todo esta a TRUE hace el submit
		if(valProducto){
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
		<h2>Producto</h2>
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
		
		<div class="row">
			<div class="col-sm-12">
				<div class="cp-container">
	
					<div class="form-group fg-line">
						<label for="idNombreProducto">Nombre del producto </label> 
						<input class="form-control input-sm" id="idNombreProducto" type="text" name="nombre_producto" maxlength="30" required="required" readonly="readonly">
					</div>
					
 				</div>
 		
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15">Seleccione Artículo</p>
					<select class="form-control" id="idArticulo" name="id_articulo" onchange="crearElementosArticulo()">         
			 			<option value='0'>Seleccione uno</option>       	
			 		<?php foreach ($body['articulos'] as $articulo): ?>
			 			<option value='<?= $articulo['id']?>'><?= $articulo['nombre']?></option>
					<?php endforeach;?>
			        </select>
				</div>
				<div id="idElementosArticulo"></div>
				
				
				<!-- CAMPOS PARA AÑADIR IMAGEN  
				lista en bbdd segun categoria elegida
				cuadro para añadir una desde el pc
				-->	
		
				<h2>SELECCIÓN DE IMAGENES</h2>
				
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15">Categoría</p>
					<select class="form-control" id="idCategoria" name="id_categoria" onchange="crearListaImagenes()">         
			 			<option value='*'>Personalizame</option>       	
			 		<?php foreach ($body['categorias'] as $categoria): ?> 
			 			<option value='<?= $categoria['id']?>'><?= $categoria['nombre']?></option>
					<?php endforeach;?>
			        </select>
				</div>
				
				<!-- AQUI DEBERIA HABER UN CARRUSEL DE FOTOS Y NO UNA LISTA A PELO -->
				
				<div id="idListaImagenes">	</div>
				
				<!-- fin de listado de fotos -->
				
				<h2>Usa tu propia imagen</h2>
                            
                   <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                        	<div>
                            	<span class="btn btn-info btn-file">
                                	<span class="fileinput-new">Seleccionar imagen</span>
                                	<span class="fileinput-exists">Cambiar</span>
                                	<input type="file" name="imagen" id="imagen">
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput" id="quitar">Quitar</a>
                                <span class="btn btn-success fileinput-exists" id="idImagenUser" onclick="selectImagen('user')">OK</span>
                            </div>
                       	</div>
                            
		 		<!-- fin de imagen  -->
		 		
		 		<!-- Zona en la que irá la imagen -->
		 		<h5>ZONA</h5>
				<div class="radio m-b-15">
					<label>
						<input type="radio" name="zona" value="Delantera" checked="checked">
						<i class="input-helper"></i>
						Delantera
					</label>
					
					<label>
						<input type="radio" name="zona" value="Trasera">
						<i class="input-helper"></i>
						Trasera
					</label>
				</div>
				<!-- fin zona en la que irá la imagen -->
		</div>
		
	<!-- CAMPOS PARA AÑADIR TEXTO DELANTERO Y TRASERO-->	
	<br/><br/>
	<h2>TEXTO</h2>
	
	<div class="form-group col-xs-3">
		<label for="idDatosTexto">Texto </label> 
		<input class="form-control" id="idDatosTexto" type="text" name="datos_texto" maxlength="20" required="required" placeholder="completa este campo" title="El Texto puede contener entre 1 y 20 caracteres"> <br/>
	</div>

	<div class="form-group col-xs-3">	
		<label for="idTamano">Tamaño </label>
		<select class="form-control" id="idTamano" name="id_tamano">         
 			<option value='1'>Seleccione uno</option>       	
 		<?php foreach ($body['tamanos'] as $tamano): ?>
 			<option value='<?= $tamano['id']?>'><?= $tamano['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idFuente">Fuente </label>
		<select class="form-control" id="idFuente" name="id_fuente">         
 			<option value='1'>Seleccione una</option>       	
 		<?php foreach ($body['fuentes'] as $fuente): ?>
 			<option value='<?= $fuente['id']?>'><?= $fuente['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-3">	
		<label for="idColor">Color </label>
		<select class="form-control" id="idColor" name="id_color">         
 			<option value='1'>Seleccione uno</option>       	
 		<?php foreach ($body['colores'] as $color): ?>
 			<option value='<?= $color['id']?>' data-valor="<?= $color['valor']?>"><?= $color['nombre']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<span class="btn btn-success" id="idBotonAplicar">Aplicar</span>
	<!-- fin datos texto  -->	
		
	<!-- CANVAS DELANTERO -->
		
		<div class="container">
			<div class="form-group col-xs-12">
			<br/><br/>
				<h2>Delantero - Modificalo a tu gusto</h2>
				<input id="idBotonVer_front" type="button" value="Vista Previa" onclick="ver();">
				<input id="idBotonLimpiar_back" type="button" value="Limpiar" onclick="limpiar();"><br/>
				
					<div class="objeto" style="width: 350px; height: 350px">
						<div id="marco_front" style="width: 150px; height: 250px">
							<canvas id="canvas_front" width="150" height="250"></canvas>
						</div>
					</div>
		
			</div>	
		</div>
		
	<!-- fin canvas delantero -->	
	
	<!-- CANVAS TRASERO -->	
		
		<div class="container">
			<div class="form-group col-xs-12">
			<br/><br/>
				<h2>Trasero - Modificalo a tu gusto</h2>
				<input id="idBotonVer_back" type="button" value="Vista Previa" onclick="ver();">
				<input id="idBotonLimpiar_back" type="button" value="Limpiar" onclick="limpiar();"><br/>
			
					<div class="objeto" style="width: 350px; height: 350px">
						<div id="marco_back" style="width: 150px; height: 250px">
							<canvas id="canvas_back" width="150" height="250"></canvas>
						</div>
					</div>
			</div>	
		</div>
	<!-- fin canvas trasero -->		
						
		<!-- campos ocultos que pasarán los datos de los canvas de la imagen -->
		<input type="hidden" name="img_front_rotacion" id="img_front_rotacion">
		<input type="hidden" name="img_front_coordenada_x" id="img_front_coordenada_x">
		<input type="hidden" name="img_front_coordenada_y" id="img_front_coordenada_y">
		<input type="hidden" name="img_front_tamano" id="img_front_tamano">
		<input type="hidden" name="img_front_tamano_ancho" id="img_front_tamano_ancho">
		<input type="hidden" name="img_front_tamano_alto" id="img_front_tamano_alto">	
		<input type="hidden" name="img_front_profundidad_z" id="img_front_profundidad_z">
		<!-- <input type="hidden" name="canvas_binario" id="canvas_binario"> -->
		
		<input type="hidden" name="img_back_rotacion" id="img_back_rotacion">
		<input type="hidden" name="img_back_coordenada_x" id="img_back_coordenada_x">
		<input type="hidden" name="img_back_coordenada_y" id="img_back_coordenada_y">
		<input type="hidden" name="img_back_tamano" id="img_back_tamano">
		<input type="hidden" name="img_back_tamano_ancho" id="img_back_tamano_ancho">
		<input type="hidden" name="img_back_tamano_alto" id="img_back_tamano_alto">
		<input type="hidden" name="img_back_profundidad_z" id="img_back_profundidad_z">
		<!-- <input type="hidden" name="canvas_binario" id="canvas_binario"> -->
				
		<!-- campos ocultos que pasarán los datos de los canvas de los textos -->
		<input type="hidden" name="txt_front_rotacion" id="txt_front_rotacion">
		<input type="hidden" name="txt_front_coordenada_x" id="txt_front_coordenada_x">
		<input type="hidden" name="txt_front_coordenada_y" id="txt_front_coordenada_y">
		<input type="hidden" name="txt_front_texto_ancho" id="txt_front_texto_ancho">
		<input type="hidden" name="txt_front_texto_alto" id="txt_front_texto_alto">
		<input type="hidden" name="txt_front_tamano_fuente" id="txt_front_tamano_fuente">
		<input type="hidden" name="txt_front_fuente" id="txt_front_fuente">
		<input type="hidden" name="txt_front_datos" id="txt_front_datos">
		<input type="hidden" name="txt_front_color" id="txt_front_color">
		
		<input type="hidden" name="txt_back_rotacion" id="txt_back_rotacion">
		<input type="hidden" name="txt_back_coordenada_x" id="txt_back_coordenada_x">
		<input type="hidden" name="txt_back_coordenada_y" id="txt_back_coordenada_y">
		<input type="hidden" name="txt_back_texto_ancho" id="txt_back_texto_ancho">
		<input type="hidden" name="txt_back_texto_alto" id="txt_back_texto_alto">
		<input type="hidden" name="txt_back_tamano_fuente" id="txt_back_tamano_fuente">
		<input type="hidden" name="txt_back_fuente" id="txt_back_fuente">
		<input type="hidden" name="txt_back_datos" id="txt_back_datos">
		<input type="hidden" name="txt_back_color" id="txt_back_color">
				
			<div id="img_hidden"><img id="my-image" class="hidden"/></div>
		
			<div class="objeto_final" style="width: 700px; height: 350px">
				<div id="marco_final" style="width: 700px; height: 350px">
					<canvas id="canvas_final" width="700" height="350"></canvas>
				</div>
			</div>
			
		</div>
		<div class="row">
			<input id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
			<input id="idBotonVerResultado" type="button" value="Ver Resultado" onclick="componerProductoFinal()">
		</div>
	</div>
	</form>
</div>
<script>
	var canvas_front = new fabric.Canvas('canvas_front');
	var canvas_back = new fabric.Canvas('canvas_back');
    var imgElement_front, imgElement_back;
    var imgInstance_front, imgInstance_back;
    var text_front, text_back;
	
	$("#idBotonAplicar").on({
		'click':function(){
		
			pintarTexto();
		}
	})
	
	//controlar los movimientos en los canvas para actualizar los datos de coordenadas, tamaños y angulos 
	canvas_front.on('mouse:up', function(options) {
		if (canvas_front.size() > 0 ){
			for(i=0;i < canvas_front.size();i++){
				var mov_texto = " "+canvas_front.item(i);
				if(mov_texto.includes("fabric.Text")){
					prepararDatosTxt();
				}
				if(mov_texto.includes("fabric.Image")){
					prepararDatosImg();
				}
			}
		}		
	});

	canvas_back.on('mouse:up', function(options) {
		if (canvas_back.size() > 0 ){
			for(i=0;i < canvas_back.size();i++){
				var mov_texto = " "+canvas_back.item(i);
				if(mov_texto.includes("fabric.Text")){
					prepararDatosTxt();
				}
				if(mov_texto.includes("fabric.Image")){
					prepararDatosImg();
				}
			}
		}		
	});

	
	function pintarTexto(){

		// delantera-trasera para saber zona donde pintar
		var img_posicion = $('input[name="zona"]:checked').val();

		if(img_posicion == "Delantera"){
		
			//limpiar lo anterior
			canvas_front.remove(text_front);
		
			//pintar
			text_front = new fabric.Text($("#idDatosTexto").val(), { 
				left: 10, 
				top: 30,
				fontFamily: $("#idFuente option:selected").text(),
				fontSize: $("#idTamano option:selected").text(),
				fill: $("#idColor option:selected").data("valor")
			});
			canvas_front.add(text_front);  
		
			//para controlar el ultimo id y dar formato a los puntos de redimensionar
			var id = (canvas_front.size()-1);
			
			//deshabilito algunos de los puntos de cambio de tamaño
			canvas_front.item(id).setControlVisible('mb',false);
			canvas_front.item(id).setControlVisible('ml',false);
			canvas_front.item(id).setControlVisible('mr',false);
			canvas_front.item(id).setControlVisible('mt',false);
		
			//quito vordes y coloreo esquinas de redimensionar
			canvas_front.item(id).set({
				hasBorders: false,
			    cornerColor: 'green',
			    cornerSize: 6,
			    transparentCorners: false,
			    rotatingPointOffset: 5,
			  });

			//datos de texto que no deberian cambiar si no se hace nuevo click
			document.getElementById("txt_front_fuente").value = text_front.getFontFamily();
			document.getElementById("txt_front_datos").value = text_front.getText();
			document.getElementById("txt_front_color").value = text_front.getFill();

			console.log("txt_front_fuente: "+ text_front.getFontFamily());
			console.log("txt_front_datos: "+ text_front.getText());
			console.log("txt_front_color: "+ text_front.getFill());
		}
		else{
			//limpiar lo anterior
			canvas_back.remove(text_back);

			//pintar
			text_back = new fabric.Text($("#idDatosTexto").val(), { 
				left: 10, 
				top: 30,
				fontFamily: $("#idFuente option:selected").text(),
				fontSize: $("#idTamano option:selected").text(),
				fill: $("#idColor option:selected").data("valor")
			});
			canvas_back.add(text_back);  

			//para controlar el ultimo id y dar formato a los puntos de redimensionar
			var id = (canvas_back.size()-1);
			
			//deshabilito algunos de los puntos de cambio de tamaño
			canvas_back.item(id).setControlVisible('mb',false);
			canvas_back.item(id).setControlVisible('ml',false);
			canvas_back.item(id).setControlVisible('mr',false);
			canvas_back.item(id).setControlVisible('mt',false);

			//quito vordes y coloreo esquinas de redimensionar
			canvas_back.item(id).set({
				hasBorders: false,
			    cornerColor: 'green',
			    cornerSize: 6,
			    transparentCorners: false,
			    rotatingPointOffset: 5,
			  });

			//datos de texto que no deberian cambiar si no se hace nuevo click
			document.getElementById("txt_back_fuente").value = text_back.getFontFamily();
			document.getElementById("txt_back_datos").value = text_back.getText();
			document.getElementById("txt_back_color").value = text_back.getFill();

			console.log("txt_back_fuente: "+ text_back.getFontFamily());
			console.log("txt_back_datos: "+ text_back.getText());
			console.log("txt_back_color: "+ text_back.getFill());
		}

		prepararDatosTxt();
	}

	//insertar en campos ocultos los parametros de cada texto para enviarlos a tablas
	function prepararDatosTxt(){
		// delantera-trasera para saber zona donde pintar
		var img_posicion = $('input[name="zona"]:checked').val();

		if(img_posicion == "Delantera"){
			document.getElementById("txt_front_coordenada_x").value = text_front.getLeft().toFixed();
			document.getElementById("txt_front_coordenada_y").value = text_front.getTop().toFixed();
			document.getElementById("txt_front_rotacion").value = text_front.getAngle().toFixed();
			document.getElementById("txt_front_texto_ancho").value = text_front.getWidth().toFixed();
			document.getElementById("txt_front_texto_alto").value = text_front.getHeight().toFixed();
			document.getElementById("txt_front_tamano_fuente").value = (text_front.getHeight()*0.85).toFixed();	
			
			console.log("txt_front_coordenada_x: "+ text_front.getLeft().toFixed());
			console.log("txt_front_coordenada_y: "+ text_front.getTop().toFixed());
			console.log("txt_front_rotacion: "+ text_front.getAngle().toFixed());
			console.log("txt_front_tamano_fuente: "+ (text_front.getHeight()*0.85).toFixed());
			
		}
		else{
			document.getElementById("txt_back_coordenada_x").value = text_back.getLeft().toFixed();
			document.getElementById("txt_back_coordenada_y").value = text_back.getTop().toFixed();
			document.getElementById("txt_back_rotacion").value = text_back.getAngle().toFixed();
			document.getElementById("txt_back_texto_ancho").value = text_back.getWidth().toFixed();
			document.getElementById("txt_back_texto_alto").value = text_back.getHeight().toFixed();
			document.getElementById("txt_back_tamano_fuente").value = (text_back.getHeight()*0.85).toFixed();

			console.log("txt_back_coordenada_x: "+ text_back.getLeft().toFixed());
			console.log("txt_back_coordenada_y: "+ text_back.getTop().toFixed());
			console.log("txt_back_rotacion: "+ text_back.getAngle().toFixed());
			console.log("txt_back_tamano_fuente: "+ (text_back.getHeight()*0.85).toFixed());
		}
	}
	
	function selectImagen(ruta){
		//borrar imagen anterior
		var imagen = document.getElementById('my-image');
		imagen.parentNode.removeChild(imagen);

		//crear imagen nueva
		imagen = document.createElement("img");

		if(ruta == "user"){
			//entro en la clase de la vista previa y despues en la etiqueta img para tomar el codigo src
			var imagenCode = document.getElementsByClassName('fileinput-preview')[0].getElementsByTagName('img')[0].src;
			imagen.src = imagenCode;
		}
		else{ 
        	imagen.src = ruta; 
		}
		
        imagen.setAttribute("id","my-image");
		imagen.setAttribute("class","hidden");	

		//aplicar la reduccion necesaria para que entre en el canvas sin salirse
		var reduce = calcularTamanoImagen(imagen);

		imagen.setAttribute("width", imagen.width*reduce);
		imagen.setAttribute("height",imagen.height*reduce);
		
        var div = document.getElementById("img_hidden"); 
        div.appendChild(imagen);     

		pintar();    
	}
	
	function calcularTamanoImagen(imagen){
		//calcular tamano imagen para que entre en el canvas
		imagenAncho = imagen.width;
		imagenAlto = imagen.height;
		imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
		reduccion = 1;  //las veces que se reduce la imagen hasta entrar en el canvas

		//para las comparaciones uso canvas_front pero es indiferente ya que son iguales en tamaño
		while(imagenAncho > $("#canvas_front").width() || imagenAlto > $("#canvas_front").height() || imagenHipo > $("#canvas_front").width()){
			imagenAncho = imagenAncho*0.8;
			imagenAlto = imagenAlto*0.8;
			imagenHipo = Math.sqrt(Math.pow(imagenAncho,2) + Math.pow(imagenAlto,2));
			reduccion = reduccion * 0.8;//1.25	
		}
		return reduccion;
	}
	
	function pintar(){
		// delantera-trasera para saber zona donde pintar
		var img_posicion = $('input[name="zona"]:checked').val();

		if(img_posicion == "Delantera"){
		
			//limpiar la imagen anterior
			canvas_front.remove(imgInstance_front);
	
			//pintar        
	        imgElement_front = document.getElementById('my-image');
	        imgInstance_front = new fabric.Image(imgElement_front, {
	          left: 10,
	          top: 50,
	          angle: 0,
	          opacity: 1
	        });
	        canvas_front.add(imgInstance_front);
	
			//para controlar el ultimo id y dar formato a los puntos de redimensionar
	        var id = (canvas_front.size()-1);
	        
	      	//deshabilito algunos de los puntos de cambio de tamaño
	    	canvas_front.item(id).setControlVisible('mt',false);
	
	    	//quito vordes y coloreo esquinas de redimensionar
	    	canvas_front.item(id).set({
	    		hasBorders: false,
	    	    cornerColor: 'green',
	    	    cornerSize: 6,
	    	    transparentCorners: false,
	    	    rotatingPointOffset: 5,
	    	});
		}
		else{
			//limpiar la imagen anterior
			canvas_back.remove(imgInstance_back);
	
			//pintar        
	        imgElement_back = document.getElementById('my-image');
	        imgInstance_back = new fabric.Image(imgElement_back, {
	          left: 10,
	          top: 50,
	          angle: 0,
	          opacity: 1
	        });
	        canvas_back.add(imgInstance_back);
	
			//para controlar el ultimo id y dar formato a los puntos de redimensionar
	        var id = (canvas_back.size()-1);
	        
	      	//deshabilito algunos de los puntos de cambio de tamaño
	    	canvas_back.item(id).setControlVisible('mt',false);
	
	    	//quito vordes y coloreo esquinas de redimensionar
	    	canvas_back.item(id).set({
	    		hasBorders: false,
	    	    cornerColor: 'green',
	    	    cornerSize: 6,
	    	    transparentCorners: false,
	    	    rotatingPointOffset: 5,
	    	});

		}

    	prepararDatosImg();
	}

	//insertar en campos ocultos los parametros de cada imagen para enviarlos a tablas
	function prepararDatosImg(){
		// delantera-trasera para saber zona donde pintar
		var img_posicion = $('input[name="zona"]:checked').val();

		if(img_posicion == "Delantera"){
			document.getElementById("img_front_coordenada_x").value = imgInstance_front.getLeft().toFixed();
			document.getElementById("img_front_coordenada_y").value = imgInstance_front.getTop().toFixed();
			document.getElementById("img_front_rotacion").value = imgInstance_front.getAngle().toFixed();
			document.getElementById("img_front_tamano").value = imgInstance_front.getWidth().toFixed()+","+imgInstance_front.getHeight().toFixed();
			document.getElementById("img_front_tamano_ancho").value = imgInstance_front.getWidth().toFixed();
			document.getElementById("img_front_tamano_alto").value = imgInstance_front.getHeight().toFixed();
			document.getElementById("img_front_profundidad_z").value = -1; //va a pelo x ahora no se como sacarlo del canvas
			//document.getElementById("canvas_binario").value = canvas.toDataURL('image/png'); //imagen final de producto
			console.log("img_front_coordenada_x: "+ imgInstance_front.getLeft().toFixed());
			console.log("img_front_coordenada_y: "+ imgInstance_front.getTop().toFixed());
			console.log("img_front_rotacion: "+ imgInstance_front.getAngle().toFixed());
			console.log("img_front_tamano: "+ imgInstance_front.getWidth().toFixed()+","+imgInstance_front.getHeight().toFixed());
		}
		else{
			document.getElementById("img_back_coordenada_x").value = imgInstance_back.getLeft().toFixed();
			document.getElementById("img_back_coordenada_y").value = imgInstance_back.getTop().toFixed();
			document.getElementById("img_back_rotacion").value = imgInstance_back.getAngle().toFixed();
			document.getElementById("img_back_tamano").value = imgInstance_back.getWidth().toFixed()+","+imgInstance_back.getHeight().toFixed();
			document.getElementById("img_back_tamano_ancho").value = imgInstance_back.getWidth().toFixed();
			document.getElementById("img_back_tamano_alto").value = imgInstance_back.getHeight().toFixed();
			document.getElementById("img_back_profundidad_z").value = -1; //va a pelo x ahora no se como sacarlo del canvas

			console.log("img_back_coordenada_x: "+ imgInstance_back.getLeft().toFixed());
			console.log("img_back_coordenada_y: "+ imgInstance_back.getTop().toFixed());
			console.log("img_back_rotacion: "+ imgInstance_back.getAngle().toFixed());
			console.log("img_back_tamano: "+ imgInstance_back.getWidth().toFixed()+","+imgInstance_back.getHeight().toFixed());
		}
	}
	
	function ver(){
		// delantera-trasera para saber zona a mostrar
		var img_posicion = $('input[name="zona"]:checked').val();
		var dataUrl;
			
		if(img_posicion == "Delantera"){
			dataUrl = canvas_front.toDataURL(); // obtenemos la imagen como png
		}
		else{
			dataUrl = canvas_back.toDataURL(); // obtenemos la imagen como png
		}

		window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
	}

	function limpiar(){
		// delantera-trasera para saber zona a mostrar
		var img_posicion = $('input[name="zona"]:checked').val();
		if(img_posicion == "Delantera"){
			for(i = canvas_front.size()-1; i >= 0; i--){
				canvas_front.item(i).remove();
			}

			//limpio valores ocultos residuales del texto
			document.getElementById("txt_front_fuente").value = "";
			document.getElementById("txt_front_datos").value = "";
			document.getElementById("txt_front_color").value = "";

			document.getElementById("txt_front_coordenada_x").value = "";
			document.getElementById("txt_front_coordenada_y").value = "";
			document.getElementById("txt_front_rotacion").value = "";
			document.getElementById("txt_front_texto_ancho").value = "";
			document.getElementById("txt_front_texto_alto").value = "";
			document.getElementById("txt_front_tamano_fuente").value = "";	

			//limpio valores ocultos residuales de imagen
			document.getElementById("img_front_coordenada_x").value = "";
			document.getElementById("img_front_coordenada_y").value = "";
			document.getElementById("img_front_rotacion").value = "";
			document.getElementById("img_front_tamano").value = "";
			document.getElementById("img_front_tamano_ancho").value = "";
			document.getElementById("img_front_tamano_alto").value = "";
			
			document.getElementById("img_front_profundidad_z").value = "";
		}
		else{
			for(i = canvas_back.size()-1; i >= 0; i--){
				canvas_back.item(i).remove();
			}

			//limpio valores ocultos residuales del texto
			document.getElementById("txt_back_fuente").value = "";
			document.getElementById("txt_back_datos").value = "";
			document.getElementById("txt_back_color").value = "";

			document.getElementById("txt_back_coordenada_x").value = "";
			document.getElementById("txt_back_coordenada_y").value = "";
			document.getElementById("txt_back_rotacion").value = "";
			document.getElementById("txt_back_texto_ancho").value = "";
			document.getElementById("txt_back_texto_alto").value = "";
			document.getElementById("txt_back_tamano_fuente").value = "";	

			//limpio valores ocultos residuales de imagen
			document.getElementById("img_back_coordenada_x").value = "";
			document.getElementById("img_back_coordenada_y").value = "";
			document.getElementById("img_back_rotacion").value = "";
			document.getElementById("img_back_tamano").value = "";
			document.getElementById("img_back_tamano_ancho").value = "";
			document.getElementById("img_back_tamano_alto").value = "";
			document.getElementById("img_back_profundidad_z").value = "";
		}
	}

		//************************************************************
		//************************************************************
	var canvas_final = new fabric.Canvas('canvas_final');
	var imgElement_front_final, imgElement_back_final;
	var imgInstance_front_final, imgInstance_back_final;
	var text_front_final, text_back_final;
	var dataUrl;
	
		function componerProductoFinal(){
			//pinto el color de fondo con el seleccionado en formulario
			canvas_final.add(new fabric.Rect({ left: 0, top: 0, fill: $('input[name="id_color_base"]:checked').data("valor"), width: 750, height: 350 }));

			//pinto la imagen transparente que será la parte frontal del objeto seleccionado
			imgInstance_fondo_final = new fabric.Image(document.getElementById('articulo-front'), {
		          left: 0,
		          top: 0,
		          angle: 0,
		          opacity: 1
		    });
			canvas_final.add(imgInstance_fondo_final);

			//pinto la imagen transparente que será la parte trasera del objeto seleccionado
			imgInstance_fondo_final_b = new fabric.Image(document.getElementById('articulo-front'), {
		          left: 350,
		          top: 0,
		          angle: 0,
		          opacity: 1
		    });
			canvas_final.add(imgInstance_fondo_final_b);
			
			//pinto la imagen seleccionada en el canvas frontal usando los parametros recogidos arriba
			imgInstance_front_final = new fabric.Image(imgElement_front, {
	          left: parseInt($("#img_front_coordenada_x").val()),
	          top: parseInt($("#img_front_coordenada_y").val()),
	          width: parseInt($("#img_front_tamano_ancho").val()),
	          heigth: parseInt($("#img_front_tamano_alto").val()),
	          angle: parseInt($("#img_front_rotacion").val()),
	          opacity: 1
	        });
			canvas_final.add(imgInstance_front_final);

	        //pinto el texto seleccionado en el canvas frontal usando los parametros recogidos arriba
		    text_front_final = new fabric.Text($("#txt_front_datos").val(), { 
				left: parseInt($("#txt_front_coordenada_x").val()), 
				top: parseInt($("#txt_front_coordenada_y").val()),
				fontFamily: $("#txt_front_fuente").val(),
				fontSize: parseInt($("#txt_front_tamano_fuente").val()),
				fill: $("#txt_front_color").val(),
				angle: parseInt($("#txt_front_rotacion").val())
			});
			canvas_final.add(text_front_final);

			alert(350 + parseInt($("#img_back_coordenada_x").val()));
			alert(parseInt($("#img_back_coordenada_y").val()));
			alert(parseInt($("#img_back_tamano_ancho").val()));
			alert(parseInt($("#img_back_tamano_alto").val()));
			alert(parseInt($("#img_back_rotacion").val()));
			alert(imgElement_back);
			//pinto la imagen seleccionada en el canvas trasero usando los parametros recogidos arriba
			imgInstance_back_final = new fabric.Image(imgElement_back, {
	          left: 350 + parseInt($("#img_back_coordenada_x").val()),
	          top: parseInt($("#img_back_coordenada_y").val()),
	          width: parseInt($("#img_back_tamano_ancho").val()),
	          heigth: parseInt($("#img_back_tamano_alto").val()),
	          angle: parseInt($("#img_back_rotacion").val()),
	          opacity: 1
	        });
			canvas_final.add(imgInstance_back_final);

			//pinto el texto seleccionado en el canvas trasero usando los parametros recogidos arriba
		    text_back_final = new fabric.Text($("#txt_back_datos").val(), { 
				left: 350 + parseInt($("#txt_back_coordenada_x").val()), 
				top: parseInt($("#txt_back_coordenada_y").val()),
				fontFamily: $("#txt_back_fuente").val(),
				fontSize: parseInt($("#txt_back_tamano_fuente").val()),
				fill: $("#txt_back_color").val(),
				angle: parseInt($("#txt_back_rotacion").val())
			});
			canvas_final.add(text_back_final);
			
			dataUrl = canvas_final.toDataURL(); // obtenemos la imagen como png
			window.open(dataUrl, "Ejemplo", "width=900, height=500"); //mostramos en popUp
			

		}

		//************************************************************************
		//************************************************************************
</script>



<script>
$(document).ready(function(){
	$('#imagen').bind('change', function() {
	    
	if(window.File && window.FileReader && window.FileList && window.Blob){
		if(this.files[0].size < 150000){
			$('#idBanner').html('');
			$('#valida').val('0');
		}else{
			$('#idBanner').html('<div class="alert alert-danger" role="alert">ERROR: El tamaño de la imagen es demasiado grande. Máximo 150kb.</div>');
			$('#valida').val('1');
		}	
	}else{
	// IE
	    var Fs = new ActiveXObject("Scripting.FileSystemObject");
	    var ruta = document.upload.file.value;
	    var archivo = Fs.getFile(ruta);
	    var size = archivo.size;
	    if(size < 150000){
	    	$('#idBanner').html('');
			$('#valida').val('0');
		}else{
			$('#idBanner').html('<div class="alert alert-danger" role="alert">ERROR: El tamaño de la imagen es demasiado grande. Máximo 150kb.</div>');
			$('#valida').val('1');
		}	
	}
	 
	});

	$('#quitar').on('click', function(){
		$('#valida').val('2');
		$('#idBanner').html('');
	});
});
</script>