<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript">
var conexion;

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

	function mostrarElementosArticulo(){
		document.getElementById("idElementosArticulo").innerHTML = conexion.responseText ;
	}

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;
		document.getElementById("idForm1").reset();
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
		<input type="hidden" name="id_usuario" value="<?= isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null ?>">
		
		<div class="row">
			<div class="col-sm-4">
				<div class="cp-container">
	
					<div class="form-group fg-line">
						<label for="idNombreProducto">Nombre del producto </label> 
						<input class="form-control input-sm" id="idNombreProducto" type="text" name="nombre_producto" maxlength="30" required="required" placeholder="completa este campo" title="El Texto puede contener entre 3 y 30 caracteres">
					</div>
	<!-- se guardará la imagen al realizar la composicion. aquí no pinta nada 
			
					<div class="form-group fg-line">
						<label for="idImagenProducto">Imagen producto </label> 
						<textarea class="form-control" id="idImagenProducto" name="imagen_producto" maxlength="200"></textarea>
					</div>
	 -->
 				</div>
 		
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15" id="select-form">Seleccione Artículo</p>
					<select class="form-control" id="idArticulo" name="id_articulo" onchange="crearElementosArticulo()">         
			 			<option value='0'>Seleccione uno</option>       	
			 		<?php foreach ($body['articulos'] as $articulo): ?>
			 			<option value='<?= $articulo['id']?>'><?= $articulo['nombre']?></option>
					<?php endforeach;?>
			        </select>
				</div>
				<div id="idElementosArticulo"></div>
				
				<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15" id="select-form">Seleccione Diseño delantero</p>
					<select class="form-control" id="idDisenoFront" name="id_diseno_front">         
			 			<option value='0'>Seleccione uno</option>       	
			 		<?php foreach ($body['disenos'] as $diseno): ?>
			 			<?php if($diseno['ubicacion'] == "Frontal"):?>     
			 			<option value='<?= $diseno['id']?>'><?= $diseno['nombre_diseno']?></option>
						<?php endif;?> 
					<?php endforeach;?>
			        </select>
				</div>
		 		
		 		<div class=" m-b-25">
			   		<p class="f-500 c-black m-b-15" id="select-form">Seleccione Diseño trasero</p>
					<select class="form-control" id="idDisenoBack" name="id_diseno_back">         
			 			<option value='0'>Seleccione uno</option>       	
			 		<?php foreach ($body['disenos'] as $diseno): ?>
			 			<?php if($diseno['ubicacion'] == "Trasera"):?>  
			 			<option value='<?= $diseno['id']?>'><?= $diseno['nombre_diseno']?></option>
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