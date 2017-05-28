
<div class="card">
	<div class="card-header">
		<h2>Edita el artículo</h2>
	</div>
	<div class="row">
		<div class="col-sm-11">
			<div id="idBanner" class="p-l-10"></div>
		</div>
	</div>
	<form role="form" id="form1" method="post"
		action="<?= base_url() ?>articulo/editarPost" enctype="multipart/form-data">
		<div class="card-body card-padding">
			<input type="hidden" name="id" value="<?=$articulo['id'];?>">
			<input type="hidden" id="valida" name="valida" value="0">
			<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
			<input type="hidden" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
			<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
			<div class="row">
				<div class="col-sm-12">
					<div class="cp-container">
					<div class="col-sm-4">
					 <p class="f-500 c-black m-b-20" id="imagen-form">Imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                	<img src="../../../../img/articulos/<?=$articulo['nombre_imagen'] ?>">
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
                        
			
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								value="<?=$articulo['nombre']; ?>">
						</div>
					</div>
				
			
			
					
					<div class="cp-container">
						<div class="form-group fg-line" id="precio-form">
							<label for="nombre">Precio</label> <input type="text"
								class="form-control input-sm" id="precio" name="precio"
								value="<?=$articulo['precio']; ?>">
						</div>
					</div>
		
					<div class="cp-container">
						<div class="form-group fg-line" id="coste-form">
							<label for="nombre">Coste</label> <input type="text"
								class="form-control input-sm" id="coste" name="coste"
								value="<?=$articulo['coste']; ?>">
						</div>
					</div>
				
			</div>
			
				<div class="col-sm-4">
				<div class="cp-container">
						<div class="form-group fg-line" id="descuento-form">
							<label for="nombre">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								value="<?=$articulo['descuento']; ?>">
						</div>
					</div>
				
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
					</div>	
				</div>	
				<div class=" m-b-25">
					<div class="row">
				
						<div class="cp-container">
						
						
                                    <label>Tallas</label><br/>
                                       
										<?php foreach ($tallas as $talla):?>
											<?php $mismo=false;?>
											<?php foreach($articulo->sharedTallaList as $mitalla):?>
												<?php if($talla->id == $mitalla->id):?>
													<?php $mismo = true;?>
													<div class="col-sm-2">
													 <label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>" checked="checked">
						                                <i class="input-helper"></i>    
						                                <?= $talla->nombre ?>
						                            </label>		
						                            </div>
						                        <?php endif;?>
						                    <?php endforeach;?>
						                    <?php if(!$mismo):?>
						                    	<div class="col-sm-2">
						                    	<label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>">
						                                <i class="input-helper"></i>    
						                                <?= $talla->nombre ?>
						                            </label>
						                         </div>   
						                    <?php endif; ?>        
										<?php endforeach;?>
                                  
               						
               					</div>
               				</div>	
               			</div>
               		<div class=" m-b-25">		
               			<div class="row">
				
							<div class="cp-container">
							
							
                                    <label>Colores</label><br/>
                                       
										<?php foreach ($colores as $color):?>
											<?php $mismo=false;?>
											<?php foreach($articulo->sharedColorList as $micolor):?>
												<?php if($color->id == $micolor->id):?>
													<?php $mismo = true;?>
													<div class="col-sm-2">
													 <label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>" checked="checked">
						                                <i class="input-helper"></i>    
						                                <?= $color->nombre ?>
						                            </label>		
						                            </div>
						                        <?php endif;?>
						                    <?php endforeach;?>
						                    <?php if(!$mismo):?>
						                    <div class="col-sm-2">
						                    	<label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>">
						                                <i class="input-helper"></i>    
						                                <?= $color->nombre ?>
						                            </label>
						                      </div>      
						                    <?php endif; ?>        
										<?php endforeach;?>                        
					
						</div>
					</div>
				</div>
				
						

			<div class="row">
				<div class="col-sm-offset-5 col-sm-2 p-t-25">
					<!-- 	<input id="idBotonEnviar" type="button" value="Guardar" onclick="comprobarImagen()">   -->
					<input id="idBotonEnviar" class="btn-block" type="submit" value="GUARDAR" style="background-color: #2196f3; color: #fff; text-size:14px;">
				</div>
			</div>
		</div>
	</form>

</div>

</div>
</section>
</section>

<script type="text/javascript">

$(document).ready(function(){
	$('#nueva').bind('change', function() {
	    
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
		$('#valida').val('0');
		$('#idBanner').html('');
	});

	
	$.fn.formajax = function(i){
	    // this formulario 
	    var a = $(this); 
	    // url 
	    var b = i.url; 
	    // success 
	    var c = i.success; 

	    

				 a.each(function(){ 
				        // this formulario específico 
				        var d = $(this); 
				        // Encontramos el botón Enviar del formulario al que le hicimos click 
				        d.find('input[type="submit"]').click(function(e){ 
				            // Prevenimos que recargue la página 
				            e.preventDefault();
				        if(comprobarArticulo()){     
				        // Creamos un formdata                 
				        formdata = new FormData(); 
				            // En el formdata colocamos todos los archivos que vamos a subir 
				            for (var i = 0; i < (d.find('input[type=file]').length); i++) {  
				                // buscará todos los input con el valor "file" y subirá cada archivo. Serán diferenciados en el PHP gracias al "name" de cada uno.
				                formdata.append((d.find('input[type="file"]').eq(i).attr("name")),((d.find('input[type="file"]:eq('+i+')')[0]).files[0]));             
				                } 
				                 
				            for (var i = 0; i < (d.find('input').not('input[type=file]').not('input[type=submit]').length); i++) { 
				                // buscará todos los input menos el valor "file" y "sumbit . Serán diferenciados en el PHP gracias al "name" de cada uno.
				                formdata.append( (d.find('input').not('input[type=file]').not('input[type=submit]').not('input[type=radio]').not('input[type=checkbox]').eq(i).attr("name")),(d.find('input').not('input[type=file]').not('input[type=submit]').eq(i).val()) );            
				                }

				            var tallas = '';
				            $('input[name="idTallas[]"]:checked').each(function(){
				            tallas += $(this).val() + ','; 
				            });
				            fin = tallas.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
				            tallas = tallas.substr( 0, fin ); // elimino la coma final
				            formdata.append('idTallas', tallas);
				            var colores = '';
				            $('input[name="idColores[]"]:checked').each(function(){
				            colores += $(this).val() + ','; 
				            });
				            fin = colores.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
				            colores = colores.substr( 0, fin ); // elimino la coma final
				            formdata.append('idColores', colores);
				            formdata.append('disponible', $('input[type=radio]:checked').val());

				            // Arrancamos el ajax     
				            $.ajax({ 
				                url: b, 
				                type: "POST", 
				                contentType: false, 
				                data:formdata, 
				                processData:false, 
				                success: c  
				            });// fin de ajax
				        } // fin del if   
				        else{
						   	document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos obligatorios.</div>';
				  		 }        
				        }) ; // fin de click  
				       
				     //   
				    }); //fin del each 
				}; // fin de la función 

	 $("#form1").formajax({
		    url:"<?= base_url()?>articulo/editarPost", 
		    success:function(response){ 
		    	document.getElementById("idBanner").innerHTML = response;

	    		//comprobacion para ver si borro o no los campos tras una insercion
	    		var str = response;
	    		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
	    		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
	    			$("form1").reset();
	    		}
	    		
		      }
		    }); // formajax
	
	
});			

function comprobarArticulo(){
	var nombre = document.getElementById('nombre').value;
	var valida = document.getElementById('valida').value;
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
			if(valida != 0){
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
			if(isNaN(precio) || precio == ''){
				document.getElementById('precio-form').classList.add('has-error');
				return false;
			}else{
				document.getElementById('precio-form').classList.remove('has-error');
				return true;
			}
		}

		function validarCoste(){
			if(isNaN(coste) || precio == ''){
				document.getElementById('coste-form').classList.add('has-error');
				return false;
			}else{
				document.getElementById('coste-form').classList.remove('has-error');
				return true;
			}
		}

		if(valNombre && valImagen && valDesc && valPrecio && valCoste){
			return true;
		}
		else{
			//document.getElementById('idBanner').innerHTML +='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
			return false;
		}
	}
</script>

