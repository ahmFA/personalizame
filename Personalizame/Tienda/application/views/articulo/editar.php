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

	function comprobarModArticulo(){
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
/*
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
			
			*/
		</script>

<div class="card">
	<div class="card-header">
		<h2>Edita el artículo</h2>
	</div>
	
	<form role="form" method="post"
		action="<?= base_url() ?>articulo/editarPost" enctype="multipart/form-data" onsubmit="comprobarModArticulo()">
		<div class="card-body card-padding">
			<input type="hidden" name="id" value="<?=$articulo['id'];?>">
			<input type="hidden" id="valida" name="valida" value="">
			<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
			<input type="hidden" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
			<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
					 <p class="f-500 c-black m-b-20">Imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                	<img src="../../../../img/articulos/<?=$articulo['nombreImagen'] ?>">
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="nueva" id="nueva">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput" id="quitar">Quitar</a>
                                </div>
                            </div>
                           </div>
                          </div>
                       </div>
            
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								value="<?=$articulo['nombre']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								value="<?=$articulo['descuento']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Precio</label> <input type="text"
								class="form-control input-sm" id="precio" name="precio"
								value="<?=$articulo['precio']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Coste</label> <input type="text"
								class="form-control input-sm" id="coste" name="coste"
								value="<?=$articulo['coste']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label>Disponible</label>
										<?php if($articulo['disponible'] == 1):?>
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
				                        <?php else:?>
				                        	<div class="radio m-b-15">
				                        	 <label>
				                                    <input type="radio" name="disponible" value="1">
				                                    <i class="input-helper"></i>
				                                   Sí
				                                </label>
				                            </div>    
				                            <div class="radio m-b-15">
				                                <label>
				                                    <input type="radio" name="disponible" value="0" checked="checked">
				                                    <i class="input-helper"></i>
				                                    No
				                                </label>
				                            </div>
				                       <?php endif;?>     
									</div>
								</div>
							</div>
						</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
						
                                    <label>Tallas</label><br/>
                                       
										<?php foreach ($tallas as $talla):?>
											<?php $mismo=false;?>
											<?php foreach($articulo->sharedTallaList as $mitalla):?>
												<?php if($talla->id == $mitalla->id):?>
													<?php $mismo = true;?>
													 <label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>" checked="checked">
						                                <i class="input-helper"></i>    
						                                <?= $talla->nombre ?>
						                            </label>		
						                        <?php endif;?>
						                    <?php endforeach;?>
						                    <?php if(!$mismo):?>
						                    	<label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>">
						                                <i class="input-helper"></i>    
						                                <?= $talla->nombre ?>
						                            </label>
						                    <?php endif; ?>        
										<?php endforeach;?>
                                  
               						<br/><br/>
                                    <label>Colores</label><br/>
                                       
										<?php foreach ($colores as $color):?>
											<?php $mismo=false;?>
											<?php foreach($articulo->sharedColorList as $micolor):?>
												<?php if($color->id == $micolor->id):?>
													<?php $mismo = true;?>
													 <label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>" checked="checked">
						                                <i class="input-helper"></i>    
						                                <?= $color->nombre ?>
						                            </label>		
						                        <?php endif;?>
						                    <?php endforeach;?>
						                    <?php if(!$mismo):?>
						                    	<label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>">
						                                <i class="input-helper"></i>    
						                                <?= $color->nombre ?>
						                            </label>
						                    <?php endif; ?>        
										<?php endforeach;?>                        
					
						</div>
					</div>
				</div>
			</div>		
						

			<div class="row">
				<input id="idBotonEnviar" type="button" value="Guardar" onclick="comprobarModArticulo()">
			</div>
		</div>
	</form>

</div>

</div>
</section>
</section>


