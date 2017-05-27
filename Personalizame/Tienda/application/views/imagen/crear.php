
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
		$('#valida').val('2');
		$('#idBanner').html('');
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
	 //function crearImagen(){
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
				        if(comprobarImagen()){     
				        // Creamos un formdata                 
				        formdata = new FormData(); 
				            // En el formdata colocamos todos los archivos que vamos a subir 
				            for (var i = 0; i < (d.find('input[type=file]').length); i++) {  
				                // buscará todos los input con el valor "file" y subirá cada archivo. Serán diferenciados en el PHP gracias al "name" de cada uno.
				                formdata.append((d.find('input[type="file"]').eq(i).attr("name")),((d.find('input[type="file"]:eq('+i+')')[0]).files[0]));             
				                } 
				                 
				            for (var i = 0; i < (d.find('input').not('input[type=file]').not('input[type=submit]').length); i++) { 
				                // buscará todos los input menos el valor "file" y "sumbit . Serán diferenciados en el PHP gracias al "name" de cada uno.
				                formdata.append( (d.find('input').not('input[type=file]').not('input[type=submit]').not('input[type=radio]').eq(i).attr("name")),(d.find('input').not('input[type=file]').not('input[type=submit]').eq(i).val()) );            
				                }

				            var selected = '';
				            $('select option:checked').each(function(){
				            selected += $(this).val() + ','; 
				            });
				            fin = selected.length - 1; // calculo cantidad de caracteres menos 1 para eliminar la coma final
				            selected = selected.substr( 0, fin ); // elimino la coma final
				            formdata.append('id_categorias', selected); 
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
						   	document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
				  		 }        
				        }) ; // fin de click  
				       
				     //   
				    }); //fin del each 
				}; // fin de la función 

	 $("#form1").formajax({
		    url:"<?= base_url()?>imagen/crearPost", 
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
			return true;
			//document.getElementById('idBotonEnviar').type = 'submit';
			//document.getElementById('idBotonEnviar').click();
			//$('#idBotonEnviar').attr('type', 'submit');
			
			//$('#idBotonEnviar').trigger('click');
			
			
			//var nombreP = $('#nombre').val();
			//var idP = $('#id_usuario').val();
			//var disponibleP = $('#disponible').val();
			//var descuentoP = $('#descuento').val();
			//var comentarioP = $('#comentario').val();
			//var seleccionadosP = $('#select-cat').val();
			//var inputFileImage = document.getElementById('imagen');

			//var file = inputFileImage.files[0];

			//var datos = new FormData();
			//imagenP.append('imagen', $('#imagen').val());
			/*
			datos.append('imagen', $('#imagen').files[0]);
			datos.append('nombre', nombreP);
			datos.append('id_usuario', idP);
			datos.append('disponible', disponibleP);
			datos.append('descuento', descuentoP);
			datos.append('comentario', comentarioP);
			datos.append('id_categorias', seleccionadosP);
			*/
			//var datos = $('#form1').serialize();
			/*
			$.ajax({
			   
			    url : '<?=base_url() ?>imagen/crearPost',
			   data : {id_usuario: idP, nombre : nombreP, disponible: disponibleP, descuento: descuentoP, comentario : comentarioP , id_categorias : seleccionadosP, imagen : imagenP},
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
			*/
		}
		else{
			//document.getElementById('idBanner').innerHTML +='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
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
			<input type="hidden" id="valida" name="valida" value="2">
			<div class="row">
				<div class="col-sm-12">
					<div class="cp-container">
					<div class="col-sm-4">
					
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
                      </div>     
                      <div class="col-sm-4"> 
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
						</div>
						<div class="col-sm-4">
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
			</div>
			</div>
			<div class="row">
			<div class="col-sm-offset-5 col-sm-2 p-t-25">
			<!-- 	<input id="idBotonEnviar" type="button" value="Guardar" onclick="comprobarImagen()">   -->
				<input id="idBotonEnviar" class="btn-block" type="submit" value="GUARDAR" style="background-color: #2196f3; color: #fff; text-size:14px;">
			</div>	
			</div>
		
	</form>

</div>

</div>
</section>


