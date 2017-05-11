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
			document.form1.submit();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>

<div class="card">
	<div class="card-header">
		<h2>Modificar Producto</h2>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div id="idBanner"></div>
		</div>
	</div>	
	<form name="form1" class="form" id="idForm1" action="<?=base_url() ?>producto/modificarPost2" method="post">
	<div class="card-body card-padding">
		<!-- campos ocultos para volver al filtro en la misma posicion y ver los resultados del cambio -->
		<input type="hidden" name="filtroNombreProducto" value="<?= $body['filtroNombreProducto'] ?>">
		<input type="hidden" name="filtroUsuario" value="<?= $body['filtroUsuario'] ?>">
		<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
		<input type="hidden" name="id_producto" value="<?= $body['producto']->id ?>">
		
		<!-- campos ocultos con el calculo precio y coste de producto-->
		<input type="hidden" name="precio" value="<?= $body['producto']->precio ?>">
		<input type="hidden" name="coste" value="<?= $body['producto']->coste ?>">
		
		<div class="row">
			<div class="col-sm-4">
				<div class="cp-container">
	
					<div class="form-group fg-line">
						<label for="idNombreProducto">Nombre del Producto </label> 
						<input class="form-control input-sm" id="idNombreProducto" type="text" name="nombre_producto" maxlength="30" required="required" placeholder="completa este campo" title="El Texto puede contener entre 3 y 30 caracteres" value="<?= $body['producto']->nombre_producto ?>">
					</div>
	
					<div class="form-group fg-line">
						<label for="idImagenProducto">Imagen producto </label> 
						<textarea class="form-control" id="idImagenProducto" name="imagen_producto" maxlength="200"><?= $body['producto']->imagen_producto ?></textarea>
					</div>
 				</div>
 			<!-- 
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

			-->
				//Aqui van los select de color, talla, diseños, articulo, etc...//
			
			</div>
		</div>
		<div class="row">
			<input class="btn btn-primary btn-sm m-t-10" id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
		</div>
	</div>
	</form>
</div>