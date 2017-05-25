<!-- 
<div class="container">
	<form action="<?=base_url() ?>imagen/crearPost" enctype="multipart/form-data" method="post">
	<input type="hidden" id="id_usuario" name="id_usuario" value="1"><br>
		<label>Foto: </label>
		<input type="file" name="imagen"><br>
		<label>Nombre: </label>
		<input type="text" id="nombre" name="nombre"><br>
		<label>Comentario: </label>
		<input type="text" id="comentario" name="comentario"><br>
		<label>Descuento: </label>
		<input type="text" id="descuento" name="descuento"><br>
		<label>Disponible: </label>
		<input type="radio" name="disponible" value="si" checked="checked">Sí<br>
		<input type="radio" name="disponible" value="no">No<br>
		
		<div class="form-group">
			<fieldset>
			<legend>Categorías disponibles</legend> 
				<?php $contador = 0;?>
				<?php foreach ($categorias as $categoria):?>
					<?php if($contador == 0):?>
						<input type="checkbox" name="id_categorias[]" checked="checked" value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?>
					<?php else:?>
						<input type="checkbox" name="id_categorias[]" value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?>
					<?php endif;?>	
					<?php $contador++;?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<input type="submit"><br>
	</form>
</div>

-->
<script type="text/javascript">

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
		$('#valida').val('');
	});

	
	/*	
	function crearImagen(){
		
		var inputFileImage = document.getElementById('imagen');

		var file = inputFileImage.files[0];

		var imagenP = new FormData();

		imagenP.append('imagen',file);
		var nombreP = $('#idNombre').val();
		var idP = $('#id_usuario').val();
		var disponibleP = $('#idDisponible').val();
		var descuentoP = $('#idDescuento').val();
		var comentarioP = $('#idComentario').val();
		var seleccionadosP = $('#select-cat').val();
		
		$.ajax({
		   
		    url : '<?=base_url() ?>imagen/crearPost',
		    data : {id_usuario: idP, nombre : nombreP, disponible: disponibleP, descuento: descuentoP, comentario : comentarioP , id_categorias : seleccionadosP},
		    type : 'POST',
		    dataType : 'html',
		    success : function(response) {
		    	document.getElementById("idBanner").innerHTML = response;

	    		//comprobacion para ver si borro o no los campos tras una insercion
	    		var str = response;
	    		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
	    		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
	    			document.getElementById("idForm1").reset();
	    		}
	    		
		    }  
		});

	 }
	 */
});


function comprobarImagen(){
	var nombre = document.getElementById('nombre').value;
	var valida = document.getElementById('valida').value;
	var descuento = document.getElementById('descuento').value;
	var seleccionados = document.getElementById('select-cat').value;

	var valNombre = validarNombre();
	var valImagen = validarImagen();
	var valDesc = validarDescuento();
	var valSelect = validarSelect();
	
		function validarNombre(){
			if(nombre == ''){
				document.getElementById('nombre-form').classList.add('has-error');
				return false;
			}else{
				document.getElementById('nombre-form').classList.remove('has-error');
				return true;
			}
		}

		function validarImagen(){
			if(valida == '' || valida == 1){
				document.getElementById('imagen-form').classList.add('c-red');
				return false;	
			}else{
				document.getElementById('imagen-form').classList.remove('c-red');
				return true;
			}
		}

		function validarDescuento(){
			if(descuento == '' || isNaN(descuento)){
				document.getElementById('descuento-form').classList.add('has-error');
				return false;
			}else{
				document.getElementById('descuento-form').classList.remove('has-error');
				return true;
			}
		}

		function validarSelect(){
			if(seleccionados == ''){
				document.getElementById('select-form').classList.add('c-red');
				return false;
			}else{
				document.getElementById('select-form').classList.remove('c-red');
				return true;
			}
		}

		if(valNombre && valImagen && valDesc && valSelect){
			//var inputFileImage = document.getElementById('imagen');

			//var file = inputFileImage.files[0];

			var datos = new FormData($('#form1'));
			//imagenP.append('imagen', $('#imagen').val());

			var nombreP = $('#nombre').val();
			var idP = $('#id_usuario').val();
			var disponibleP = $('#disponible').val();
			var descuentoP = $('#descuento').val();
			var comentarioP = $('#comentario').val();
			var seleccionadosP = $('#select-cat').val();
			//var datos = $('#form1').serialize();
			$.ajax({
			   
			    url : '<?=base_url() ?>imagen/crearPost',
			   // data : {id_usuario: idP, nombre : nombreP, disponible: disponibleP, descuento: descuentoP, comentario : comentarioP , id_categorias : seleccionadosP, imagen : imagenP},
			    data : datos,
			    type : 'POST',
			    dataType : 'html',
			    success : function(response) {
			    	document.getElementById("idBanner").innerHTML = response;

		    		//comprobacion para ver si borro o no los campos tras una insercion
		    		var str = response;
		    		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
		    		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
		    			document.getElementById("idForm1").reset();
		    		}
		    		
			    }  
			});
		}
		else{
			document.getElementById('idBanner').innerHTML +='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
		}
		
		
	
}


/*
function crearImagen() {
	conexion = new XMLHttpRequest();

	//var datosSerializados = serialize(document.getElementById("idForm1"));
	var datos = 'nombre='+document.getElementById('nombre').value+'&valor='+document.getElementById('valor').value;
	conexion.open('POST', '<?=base_url() ?>imagen/crearPost', true);
	//conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conexion.send(datos);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status==200) {
			accionAJAX();
		}
	}
}
*/

 

function modificarImagen() {
	conexion = new XMLHttpRequest();

	//var datosSerializados = serialize(document.getElementById("idForm1"));
	var datos = 'nombre='+document.getElementById('nombre').value+'&valor='+document.getElementById('valor').value+'&id='+document.getElementById('id').value;
	conexion.open('POST', '<?=base_url() ?>color/editarPost', true);
	conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conexion.send(datos);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status==200) {
			accionAJAX();
		}
	}
}
/*
function comprobarImagen(){
	var nombre = document.getElementById('nombre').value;
	var valida = document.getElementById('valida').value;
	var descuento = document.getElementById('descuento').value;
	var seleccionados = document.getElementById('select-cat').value;

	var valNombre = validarNombre();
	var valImagen = validarImagen();
	var valDesc = validarDescuento();
	var valSelect = validarSelect();
	
		function validarNombre(){
			if(nombre == ''){
				document.getElementById('nombre-form').classList.add('has-error');
				return false;
			}else{
				document.getElementById('nombre-form').classList.remove('has-error');
				return true;
			}
		}

		function validarImagen(){
			if(valida == '' || valida == 1){
				document.getElementById('imagen-form').classList.add('c-red');
				return false;	
			}else{
				document.getElementById('imagen-form').classList.remove('c-red');
				return true;
			}
		}

		function validarDescuento(){
			if(descuento == '' || isNaN(descuento)){
				document.getElementById('descuento-form').classList.add('has-error');
				return false;
			}else{
				document.getElementById('descuento-form').classList.remove('has-error');
				return true;
			}
		}

		function validarSelect(){
			if(seleccionados == ''){
				document.getElementById('select-form').classList.add('c-red');
				return false;
			}else{
				document.getElementById('select-form').classList.remove('c-red');
				return true;
			}
		}

		if(valNombre && valImagen && valDesc && valSelect){
			crearImagen();
		}
		else{
			document.getElementById('idBanner').innerHTML +='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
		}
		
		
	
}
*/
function comprobarModImagen(){
	var nombre = document.getElementById('nombre').value;
	//var imagen = document.getElementById('imagen').value;
	var descuento = document.getElementById('descuento').value;
	var seleccionados = document.getElementById('select-cat').value;
	if(nombre != '' && imagen != '' && !isNaN(descuento) && descuento != '' && seleccionados != ''){
		return true;;
	}
	else{
		
		if(nombre == ''){
			document.getElementById('nombre-form').classList.add('has-error');
		}else{
			document.getElementById('nombre-form').classList.remove('has-error');
		}
		/*
		if(imagen == ''){
			document.getElementById('imagen-form').classList.add('c-red');	
		}else{
			document.getElementById('imagen-form').classList.remove('c-red');
		}
		*/
		if(descuento == '' || isNaN(descuento)){
			document.getElementById('descuento-form').classList.add('has-error');
		}else{
			document.getElementById('descuento-form').classList.remove('has-error');
		}
		
		if(seleccionados == ''){
			document.getElementById('select-form').classList.add('c-red');
		}else{
			document.getElementById('select-form').classList.remove('c-red');
		}
		
		document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
		return false;
	}
}
</script>



<div class="card">
	<div class="card-header">
		<h2>Añade una nueva imagen</h2>
	</div>
		<div class="row">
		<div class="col-sm-5">
		<div id="idBanner" class="p-l-10">
			
		</div>
	</div>
	</div>
	<form role="form" id="form1" method="post" enctype="multipart/form-data">
		<div class="card-body card-padding">
			<input type="hidden" id="id_usuario" name="id_usuario" value="<?= $_SESSION['idUsuario'] ?>">
			<input type="hidden" id="valida" name="valida" value="">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
					 <p class="f-500 c-black m-b-20" id="imagen-form">Previsualización de la imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="imagen" id="imagen">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput" id="quitar">Quitar</a>
                                </div>
                            </div>
                            <br/>
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre de la imagen">
						</div>
						<div class="form-group fg-line">
							<label for="comentario">Comentario</label> <input type="text"
								class="form-control input-sm" id="comentario" name="comentario"
								placeholder="Introduce un comentario">
						</div>
						<div class="form-group fg-line" id="descuento-form">
							<label for="descuento">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								placeholder="Indica el descuento que tiene la imagen">
						</div>
						<label>Disponible</label>
						<div class="radio m-b-15">
                                <label>
                                    <input type="radio" name="disponible" id="disponible" value="1" checked="checked">
                                    <i class="input-helper"></i>
                                   Sí
                                </label>
                            </div>
                            <div class="radio m-b-15">
                                <label>
                                    <input type="radio" name="disponible" id="disponible" value="0">
                                    <i class="input-helper"></i>
                                    No
                                </label>
                            </div>
					</div>
					<div class=" m-b-25">
                                    <p class="f-500 c-black m-b-15" id="select-form">Elige hasta 3 categorías</p>
                                    
                                    <select class="selectpicker" name="id_categorias[]" id="select-cat" multiple data-max-options="3" title='Elige hasta 3 categorías para la imagen'>
                                     <?php $contador = 0;?>
										<?php foreach ($categorias as $categoria):?>
											<?php if($contador == 0):?>
												<option value="<?=$categoria['id'] ?>" selected="selected"> <?=$categoria['nombre'] ?></option>
											<?php else:?>
												<option value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?></option>
											<?php endif;?>
											<?php $contador++?>
										<?php endforeach;?>
                                    </select>
                  </div>
                                
					
					
				</div>
			</div>

			<div class="row">
				<input id="idBotonEnviar" type="button" value="Guardar" onclick="comprobarImagen()">
			</div>
		</div>
	</form>

</div>

</div>
</section>
