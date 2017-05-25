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

	function comprobarArticulo(){
		var nombre = document.getElementById('nombre').value;
		var imagen = document.getElementById('valida').value;
		var precio = document.getElementById('precio').value;
		var coste = document.getElementById('coste').value;
		var descuento = document.getElementById('descuento').value;
		
		var valNombre = validarNombre();
		var valImagen = validarImagen();
		var valDesc = validarDescuento();
		var valPrecio = validarPrecio();
		var valCoste = validarCoste();
		
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

			function validarPrecio(){
				if(isNaN(precio)){
					document.getElementById('precio-form').classList.add('c-red');
					return false;
				}else{
					document.getElementById('precio-form').classList.remove('c-red');
					return true;
				}
			}

			function validarCoste(){
				if(isNaN(coste)){
					document.getElementById('coste-form').classList.add('c-red');
					return false;
				}else{
					document.getElementById('coste-form').classList.remove('c-red');
					return true;
				}
			}

			if(valNombre && valImagen && valDesc && valPrecio && valCoste){
				//var inputFileImage = document.getElementById('imagen');

				//var file = inputFileImage.files[0];

				var imagenP = new FormData($('#form1')[2]);

				var nombreP = nombre;
				var idP = $('#id_usuario').val();
				var disponibleP = disponible;
				var descuentoP = descuento;
				var comentarioP = comentario;
				var precioP = precio;
				var costeP = coste;
				var tallasP = $('#tallas').val();
				var coloresP = $('#colores').val();
				
				$.ajax({
				   
				    url : '<?=base_url() ?>imagen/crearPost',
				    data : {id_usuario: idP, nombre : nombreP, disponible: disponibleP, 
					    descuento: descuentoP, comentario : comentarioP , precio : precioP, 
					    coste : costeP, idTallas: tallasP, idColores : coloresP, imagen : imagenP},
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

			function comprobarModArticulo(){
				var nombre = document.getElementById('nombre').value;
				var imagen = document.getElementById('imagen').value;
				var precio = document.getElementById('precio').value;
				var coste = document.getElementById('coste').value;
				var descuento = document.getElementById('descuento').value;
				
				if(nombre != '' && imagen != '' && !isNaN(descuento) && descuento != '' && precio != '' && coste != ''){
					return true;;
				}
				else{
					
					if(nombre == ''){
						document.getElementById('nombre-form').classList.add('has-error');
					}else{
						document.getElementById('nombre-form').classList.remove('has-error');
					}
						
					if(imagen == ''){
						document.getElementById('imagen-form').classList.add('c-red');	
					}else{
						document.getElementById('imagen-form').classList.remove('c-red');
					}
						
					if(descuento == '' || isNaN(descuento)){
						document.getElementById('descuento-form').classList.add('has-error');
					}else{
						document.getElementById('descuento-form').classList.remove('has-error');
					}
					
					if(precio == ''){
						document.getElementById('precio-form').classList.add('has-error');
					}else{
						document.getElementById('precio-form').classList.remove('has-error');
					}
	
					if(coste == ''){
						document.getElementById('coste-form').classList.add('has-error');
					}else{
						document.getElementById('coste-form').classList.remove('has-error');
					}
						
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos obligatorios.</div>';
					return false;
				}
			}
		</script>	


<div class="card">
	<div class="card-header">
		<h2>Añade un nuevo artículo</h2>
	</div>
	<div class="row">
		<div class="col-sm-11">
		<div id="idBanner" class="p-l-10">
			
		</div>
	</div>
	</div>
	<form role="form" id="form1" method="post" action="<?= base_url() ?>articulo/crearPost" enctype="multipart/form-data">
		<div class="card-body card-padding">
			<input type="hidden" id="id_usuario" name="id_usuario" value="1">
			<input type="hidden" id="valida" name="valida" value="">
			<div class="row">
				<div class="col-sm-10">
					<div class="cp-container">
					
					 <p class="f-500 c-black m-b-20" id="imagen-form">Previsualización de la imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="imagen" id="imagen-form">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput" id="quitar">Quitar</a>
                                </div>
                            </div>
                            <br/>
                        
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre del articulo">
						</div>
						<div class="form-group fg-line" id="precio-form">
							<label for="comentario">Precio</label> <input type="text"
								class="form-control input-sm" id="precio" name="precio"
								placeholder="Introduce un precio">
						</div>
						<div class="form-group fg-line" id="coste-form">
							<label for="comentario">Coste</label> <input type="text"
								class="form-control input-sm" id="coste" name="coste"
								placeholder="Introduce el coste">
						</div>
						<div class="form-group fg-line" id="descuento-form">
							<label for="descuento">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								placeholder="Indica el descuento que tiene la articulo">
						</div>
						<label>Disponible</label>
						<div class="radio m-b-15">
                                <label>
                                    <input type="radio" name="disponible" value="1" checked="checked">
                                    <i class="input-helper"></i>
                                   Sí
                                </label>
                            </div>
                            <div class="radio m-b-15">
                                <label>
                                    <input type="radio" name="disponible" value="0">
                                    <i class="input-helper"></i>
                                    No
                                </label>
                            </div>
					</div>
					<div class=" m-b-25">
						<div class="row">
                                    <label>Tallas</label><br/>
                                       
										<?php foreach ($tallas as $talla):?>
										<div class="col-sm-2">
											 <label class="checkbox checkbox-inline m-r-20">
				                                <input type="checkbox" name="idTallas[]" id="tallas" value="<?= $talla->id?>">
				                                <i class="input-helper"></i>    
				                                <?= $talla->nombre ?>
				                            </label>		
				                         </div>   
										<?php endforeach;?>
                         </div>         
                  	</div>
                  	
					<div class=" m-b-25">
						<div class="row">
                                    <label>Colores</label><br/>
                                       
										<?php foreach ($colores as $color):?>
										<div class="col-sm-2">
											 <label class="checkbox checkbox-inline m-r-20">
				                                <input type="checkbox" name="idColores[]" id="colores" value="<?= $color->id?>">
				                                <i class="input-helper"></i>    
				                                <?= $color->nombre ?>
				                            </label>	
				                         </div>   	
										<?php endforeach;?>
                        </div>          
                  </div>                                
					
					
				</div>
			</div>

			<div class="row">
				<input id="idBotonEnviar" type="button" value="Guardar" onclick="comprobarArticulo()">
			</div>
		</div>
	</form>

</div>

</div>
</section>
</section>
