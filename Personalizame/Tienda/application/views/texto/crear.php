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
		<input class="btn btn-primary" id="idBotonAplicar" type="button" value="Ver como queda" onclick="ver();">
		<br/><br/><br/>
		<div id="pruebasContainer" style="width: 150px; height: 250px; border: 1px solid black; padding:10px 10px 10px 10px; text-align: center; display:table; background-color: aqua;">
			<canvas id="pruebasTexto" width="150" height="250" style="border:1px solid #d3d3d3;display: inline-block">
			Your browser does not support the HTML5 canvas tag.</canvas>
		</div> 
	</div>
</div>

<script type="text/javascript">
	var canvas,ctx,texto,fuente,tamano,rotacion,hipo,dataUrl;
    
	inicializar();

	function inicializar(){
		tomarDatos();
		dibujar();
	}

	function tomarDatos() {
		//crear
		canvas = document.getElementById("pruebasTexto");
		ctx = canvas.getContext("2d");

		//limpiar lo que tenga de antes
		ctx.clearRect(0, 0, canvas.width, canvas.height);

		//tamaño x defecto
		//canvas.width = 140;
		//canvas.height = 240;
		
		//si no hay texto o algo seleccionado en los combos coge valor por defecto
		texto = ($("#idDatosTexto").val() =="")? "Introduzca su Texto " : $("#idDatosTexto").val();
		color = ($("#idColor option:selected").text() =="Seleccione uno")? "black" : $("#idColor option:selected").text();
		fuente = ($("#idFuente option:selected").text() =="Seleccione una")? "Arial" : $("#idFuente option:selected").text();
		tamano = ($("#idTamano option:selected").text() =="Seleccione uno")? 15 : $("#idTamano option:selected").text();		
		rotacion = 0;

		ctx.font = tamano+"px "+fuente;
		hipo = Math.sqrt(Math.pow(tamano,2) + Math.pow(ctx.measureText(texto).width,2));
		canvas.width = hipo + 5;
		canvas.height = hipo + 5;
	}

	function dibujar(){
		//segun el angulo de rotacion se sale del div por lo que hay que hacer apaños
		//y usar el translate para que se posicione en diferente sitio
		var coef = rotacion % 360;
		if(coef >= 0 && coef <= 90){
			ctx.translate(5+(coef*0.2),5);
		}
		if(coef > 90 && coef <= 180){
			ctx.translate(145-(coef*0.05),20);
		}
		if(coef > 180 && coef <= 270){
			ctx.translate(145-(coef*0.1),145);
		}
		if(coef > 270 && coef < 360){
			ctx.translate(5+(coef*0.01),145);
		}
		
		//Color, Fuente, Posicion
		ctx.fillStyle = color;
		ctx.font = tamano+"px "+fuente;
		ctx.textAlign="start"; 
		ctx.textBaseline="top"; 
		ctx.rotate(rotacion * Math.PI / 180);
		
		ctx.fillText(texto, 0, 0);
		
	} 

	function ver(){
		var dataUrl = canvas.toDataURL(); // obtenemos la imagen como png
		window.open(dataUrl, "Ejemplo", "width=400, height=400"); //mostramos en popUp
	}

	//el canvas es dragable y no puede salir del contenedor
	$("#pruebasTexto").draggable({ containment: "#pruebasContainer" });
</script>