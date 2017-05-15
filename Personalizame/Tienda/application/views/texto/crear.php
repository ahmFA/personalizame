<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui.js"></script>
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
	<input type="hidden" name="rotacion" id="rotacion" value="-30">
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
 			<option value='<?= $color['id']?>'><?= $color['valor']?></option>
		<?php endforeach;?>
        </select><br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
	</div>
	
	</form>
</div>

<div class="container">
	<div class="form-group col-xs-12">
		<h2>Pruebas con el texto</h2>
	
		<input class="btn btn-primary" id="idBotonAplicar" type="button" value="Aplicar" onclick="inicializar();">
		<input class="btn btn-primary" id="idBotonVer" type="button" value="Ver como queda" onclick="ver();">
		<br/><br/><br/>
		<div id="kk"></div>
		<div id="kk2"></div>
		<div id="pruebasContainer" style="position: relative;width: 150px; height: 250px; border: 1px solid black; padding:10px 10px 10px 10px; text-align: center; display:table; background-color: aqua;">
			<div id="marcoCanvas" style="border: 1px solid green;">
			<img src="<?=base_url()?>assets/img/girar.png" height="8px" width="8px" style="float: left">
			<img src="<?=base_url()?>assets/img/cerrar.png" height="8px" width="8px" style="float: right">
			<canvas id="pruebasTexto" width="150" height="250" style="border:1px solid #d3d3d3;display: inline-block">
			Your browser does not support the HTML5 canvas tag.</canvas>
			<img src="<?=base_url()?>assets/img/mover.png" height="8px" width="8px" style="float: left">
			<img src="<?=base_url()?>assets/img/redimensionar.png" height="8px" width="8px" style="float: right">
			</div>
		</div> 
		Rotacion <input type="text" id="idRotacion" name="rotacion" value="0" size="3" readonly="readonly">
		<input id="idSlider" type ="range" min ="0" max="360" step ="10" value ="0" onchange="updateRotacion(this.value);"/>
		
	</div>
</div>
<script>
$(document).ready(function(){
	$('#pruebasTexto').on({
		'mousedown' : function (e) { 
	   var x = e.offsetX;
	   var y = e.offsetY;

	   var div = document.getElementById("kk");
	   div.innerHTML = "x: " + x + " y: " + y; 
	}
	}),

	$('.container').on({
		'mousemove' : function (e) { 
	   var x = e.pageX;
	   var y = e.pageY;

	   var div = document.getElementById("kk2");
	   div.innerHTML = "x: " + x + " y: " + y; 
	}
	});
});
</script>
<script type="text/javascript">
	var canvas,ctx,texto,fuente,tamano,rotacion,hipo,dataUrl;
	var anchoTexto,altoTexto,anchoCanvas,altoCanvas,Y_txt_centrado,X_txt_centrado;
	
	function updateRotacion(val) {
    	document.getElementById('idRotacion').value=val; 
    	inicializar();
  	}
	
	inicializar();

	function inicializar(){
		tomarDatos();
		posicionar();
		dibujar();
	}

	function tomarDatos() {
		//crear
		canvas = document.getElementById("pruebasTexto");
		ctx = canvas.getContext("2d");

		//limpiar lo que tenga de antes
		ctx.clearRect(0, 0, canvas.width, canvas.height);
		
		//si no hay texto o algo seleccionado en los combos coge valor por defecto
		texto = ($("#idDatosTexto").val() =="")? "Introduzca su Texto " : $("#idDatosTexto").val();
		color = ($("#idColor option:selected").text() =="Seleccione uno")? "black" : $("#idColor option:selected").text();
		fuente = ($("#idFuente option:selected").text() =="Seleccione una")? "Arial" : $("#idFuente option:selected").text();
		tamano = ($("#idTamano option:selected").text() =="Seleccione uno")? 15 : $("#idTamano option:selected").text();		
		rotacion = document.getElementById('idRotacion').value;
	}

	function posicionar(){
		ctx.font = tamano+"px "+fuente;  //necesito indicar el tamaño y fuente para poder calcular el tamaño del texto con measureText
		hipo = Math.sqrt(Math.pow(tamano,2) + Math.pow(ctx.measureText(texto).width,2));  //calculo la hipotenusa para crear un canvas suficientemente grande para que entre el texto
		if (hipo > 145){hipo = 145;} //si hipo sale muy grande como maximo sera 145
		anchoTexto = ctx.measureText(texto).width; //tomo el ancho del texto
		altoTexto = tamano; //tomo el alto del texto
		//alert("anT: "+anchoTexto+" alT: "+altoTexto);
		anchoCanvas = hipo + 5; //el canvas será un poco mas que la hipotenusa para que no se salga el tope es 150 como el div
		altoCanvas = hipo + 5;
		//alert("anC: "+anchoCanvas+" alC: "+altoCanvas);

		canvas.width = anchoCanvas; //asigno valor al ancho del canvas
		canvas.height = altoCanvas; //asigno valor al alto del canvas

		X_txt_centrado = (anchoCanvas - anchoTexto)/2; //calculo coordenada X para que comience el texto
		Y_txt_centrado = (altoCanvas - altoTexto)/2;  //calculo coordenada Y para que comience el texto

		//alert("X: "+X_txt_centrado+" Y: "+Y_txt_centrado);
	}
	
	function dibujar(){
		
		//Color, Fuente, Posicion
		ctx.fillStyle = color;
		ctx.font = tamano+"px "+fuente;
		ctx.textAlign="start"; 
		ctx.textBaseline="top"; 
		ctx.fillText(texto, X_txt_centrado, Y_txt_centrado);	
		dataUrl = canvas.toDataURL(); //guardo el canvas como imagen png
		girar()	
	} 

	function girar(){
		// canvas auxiliar que será una copia del primero
		var canvas2 = canvas;
		var ctx2 = canvas2.getContext("2d");

		// indica donde se encuentra la imagen del primer canvas  
		var img = new Image();
		img.src = dataUrl; 

		//calcular el punto medio
		var mitadAncho = canvas.width/2;
		var mitadAlto = canvas.height/2;

		//limpiamos el primer canvas para que no se vea
		canvas.width=canvas.width;	
		
		//nos posicionamos en el punto medio
		ctx.translate(mitadAncho, mitadAlto);

		//rotamos los grados que pasemos
		ctx.rotate(rotacion * Math.PI / 180);

		//una vez cargada la imagen la dibujamos
		img.onload = function(){
			ctx.drawImage(img, -mitadAncho, -mitadAlto);
		}

	}

	function ver(){
		var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
		window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
	}

	//el canvas es dragable y no puede salir del contenedor
	//$("#marcoCanvas").draggable({ containment: "#pruebasContainer" });
</script>