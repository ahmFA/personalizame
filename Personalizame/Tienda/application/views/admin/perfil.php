                           
    
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                        <img class="img-responsive" src="<?= base_url()?>../../../../img/usuarios/<?=$usuario->imagen ?>" alt=""> 
                                   
                                   
                                </div>
                                
                                
                                <div class="pmo-stat">
                                   <h3><?= $usuario->nick ?></h3>
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contacto</h2>
                                
                                <ul>
                                    <li><i class="zmdi zmdi-phone"></i> <?= $usuario->telefono1 ?></li>
                                    <li><i class="zmdi zmdi-email"></i> <?= $usuario->mail1 ?></li>
                                     <li>
                                        <i class="zmdi zmdi-pin"></i>
                                        <address class="m-b-0 ng-binding">
                                          <?= $usuario->direccion ?> - <?= $usuario->cp ?><br>
                                            <?= $usuario->localidad ?>(<?= $usuario->provincia ?>),<br>
                                            <?= $usuario->pais ?>
                                        </address>
                                       </li> 
                               </ul>     
                            </div>
                            
                        </div>
                        
                        <div class="pm-body clearfix">
                        
                        <div class="pmb-block">
                        	
                                <div class="pmbb-header">
                                   <h3>Perfil de Administrador</h3>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                            <div class="col-sm-12">
												<div id="idBanner" class="p-l-10">
												<?php if(isset($banner)): ?>
													<?= $banner ?>
												<?php endif;?>
												</div>
											</div>	
							
                        		 <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                     <h4><i class="zmdi zmdi-account m-r-5"></i> Información básica</h4>
                                        <dl class="dl-horizontal">
                                            <dt>Nombre</dt>
                                            <dd><?= $usuario->nombre ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 1</dt>
                                            <dd><?= $usuario->apellido1 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 2</dt>
                                            <dd><?= $usuario->apellido2 ?></dd>
                                        </dl>
                                        <br>
                                        <h4><i class="zmdi zmdi-phone m-r-5"></i>Información de contacto</h4>
                                         <dl class="dl-horizontal">
                                            <dt>Teléfono 1</dt>
                                            <dd><?= $usuario->telefono1 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Teléfono 2</dt>
                                            <dd><?= $usuario->telefono2 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 1</dt>
                                            <dd><?= $usuario->mail1 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 2</dt>
                                            <dd><?= $usuario->mail2 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Comentario contacto</dt>
                                            <dd><?= $usuario->comentario_contacto ?></dd>
                                        </dl> 
                                        <br>
                                        <h4><i class="zmdi zmdi-home m-r-5"></i>Información de dirección</h4>
                                         <dl class="dl-horizontal">
                                            <dt>Dirección</dt>
                                            <dd><?= $usuario->direccion ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Código Postal</dt>
                                            <dd><?= $usuario->cp ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Localidad</dt>
                                            <dd><?= $usuario->localidad ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Provincia</dt>
                                            <dd><?= $usuario->provincia ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>País</dt>
                                            <dd><?= $usuario->pais ?></dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Comentario dirección</dt>
                                            <dd><?= $usuario->comentario_direccion ?></dd>
                                        </dl> 
                                    </div>
                             	</div>
                                    <div class="pmbb-edit">
                                    	<h4><i class="zmdi zmdi-account m-r-5"></i> Información básica</h4>
                                    	
                                    	 <form role="form" id="form1" action="<?=base_url() ?>usuario/editarPerfilAdmin" method="post" 
                                    	 name="form1" enctype="multipart/form-data" onsubmit="return validarTodo()">
                                        <dl class="dl-horizontal">
                                      
                                        <input type="hidden" name="idUsuario" value="<?=$usuario->id ?>">
                                        <input type="hidden" name="nick" value="<?=$usuario->nick ?>">
                                        <input type="hidden" name="perfilAdmin" value="1">
                                        <input type="hidden" name="valida" id="valida" value="0">
                                        <dt class="p-t-10">Imagen</dt>
                                        	<dd>
                                        	 	<div class="fg-line">
                                        		 <div class="fileinput fileinput-new" data-provides="fileinput">
						                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
						                                	<img src="../../../../img/usuarios/<?=$usuario->imagen ?>">
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
                                        	</dd>
                                         <dt class="p-t-10">Contraseña Actual</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" class="form-control" id="pwdAntigua" name="pwdAntigua">
                                                </div>
                                                
                                            </dd>
                                            <dt class="p-t-10">Contraseña Nueva</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" class="form-control" id="pwdNueva" name="pwdNueva">
                                                </div>
                                                
                                            </dd>
                                            <dt class="p-t-10">Nombre</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idNombre" name="nombre" placeholder="ej. Juan Carlos" value="<?= $usuario->nombre ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idApellido1" name="apellido1" placeholder="ej. Pérez" value="<?= $usuario->apellido1 ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idApellido2" name="apellido2" placeholder="ej. López" value="<?= $usuario->apellido2 ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <br>
										<h4><i class="zmdi zmdi-phone m-r-5"></i>Información de contacto</h4>
										<dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idTelefono1" name="telefono1" placeholder="ej. 915550000" value="<?= $usuario->telefono1 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idTelefono2" name="telefono2" placeholder="ej. 915550000" value="<?= $usuario->telefono2 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" id="idMail1" name="mail1" placeholder="ej. admin@admin.com" value="<?= $usuario->mail1 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" id="idMail2" name="mail2" placeholder="ej. admin@admin.com" value="<?= $usuario->mail2 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" id="idComentarioContacto" name="comentario_contacto" placeholder="Comentario de contacto..."><?= $usuario->comentario_contacto ?>
                                            </textarea>
                                        </div>
										<br>
										<h4><i class="zmdi zmdi-home m-r-5"></i>Información de dirección</h4>   
										 <dl class="dl-horizontal">
                                            <dt class="p-t-10">Dirección</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idDireccion" name="direccion" placeholder="ej. C/Desengaño, 21" value="<?= $usuario->direccion ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Código Postal</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" maxlength="5" class="form-control" id="idCP" name="cp" placeholder="ej. 28001" value="<?= $usuario->cp ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Localidad</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idLocalidad" name="localidad" placeholder="ej. Pinto" value="<?= $usuario->localidad ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Provincia</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idProvincia" name="provincia" placeholder="ej. Madrid" value="<?= $usuario->provincia ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt class="p-t-10">País</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" id="idPais" name="pais" placeholder="ej. España"  value="<?= $usuario->pais ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" id="idComentarioDireccion" name="comentario_direccion" placeholder="Comentario de dirección..."><?= $usuario->comentario_direccion ?>
                                            </textarea>
                                        </div>                          
                                        <div class="m-t-30">
                                            <input type="submit" value="GUARDAR" style="background-color: #2196f3; color: #fff; text-size:14px;">
                                         
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                       </form> 
                                    </div>
                                    
                                    
                                    
                                </div> <!-- fin del block -->
              	
                    </div>   <!-- fin del clearfix -->
                 </div>  <!-- fin del card -->        
                
                                   
           </div>
     
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
		
});
</script>

<script type="text/javascript">
	function validarPasswordAntigua(){
		var valido = false;
		var miPwd = document.getElementById("pwdAntigua").value.length;
		//longitud entre 5 y 20 caracteres
		if((miPwd >= 5 && miPwd <= 20) || miPwd == ''){
			valido = true;
		}
		return valido;
	}

	function validarPasswordNueva(){
		var valido = false;
		var miPwd = document.getElementById("pwdNueva").value.length;
		//longitud entre 5 y 20 caracteres
		if((miPwd >= 5 && miPwd <= 20) || miPwd == ''){
			valido = true;
		}
		return valido;
	}
	
	function validarNombre(){
		var valido = false;
		var miNombre = document.getElementById("idNombre").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miNombre) || miNombre == ""){
			valido = true;
		}
		return valido;
	}
	
	function validarApellido1(){
		var valido = false;
		var miApellido1 = document.getElementById("idApellido1").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miApellido1) || miApellido1 == ""){
			valido = true;
		}
		return valido;
	}

	function validarApellido2(){
		var valido = false;
		var miApellido2 = document.getElementById("idApellido2").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-zÑñ áéíóúÁÉÍÓÚç]{2,35}$/.test(miApellido2) || miApellido2 == ""){
			valido = true;
		}
		return valido;
	}
		
	function validarTelefono1(){
		var valido = false;
		var miTelefono1 = document.getElementById("idTelefono1").value;
		//telefono correcto o vacio
		if(/^[6-9][0-9]{8}$/.test(miTelefono1) || miTelefono1 == ""){
			valido = true;
		}
		return valido;
	}

	function validarTelefono2(){
		var valido = false;
		var miTelefono2 = document.getElementById("idTelefono2").value;
		//telefono correcto o vacio
		if(/^[6-9][0-9]{8}$/.test(miTelefono2) || miTelefono2 == ""){
			valido = true;
		}
		return valido;
	}
		
	function validarMail1(){
		var valido = false;
		var miMail1 = document.getElementById("idMail1").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail1)){
			valido = true;
		}
		return valido;
	}

	function validarMail2(){
		var valido = false;
		var miMail2 = document.getElementById("idMail2").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail2) || miMail2 == ""){
			valido = true;
		}
		return valido;
	}

	function validarCP(){
		var valido = false;
		var miCP = document.getElementById("idCP").value;
		//5 digitos
		if(/^[0-9]{5}$/.test(miCP) || miCP == ""){
			valido = true;
		}
		return valido;
	}


		function validarImagen() {
			var valido = false;
			var imagen = document.getElementById('valida').value;
		    if (imagen == 0) {
		        
		        valido true;
		    }
		 return valido;   
		}
		

	
	function validarTodo(){
		var foco = true;
		
		//PASSWORD
		var valPasswordAntigua = validarPasswordAntigua();
		if (valPassword == false){
			document.getElementById("pwdAntigua").style.color = "red";
			if (foco == true){
				document.getElementById("pwdAntigua").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("pwdAntigua").style.color = "black";
		}

		var valPasswordNueva = validarPasswordNueva();
		if (valPassword == false){
			document.getElementById("pwdNueva").style.color = "red";
			if (foco == true){
				document.getElementById("pwdNueva").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("pwdNueva").style.color = "black";
		}
		
		//NOMBRE
		var valNombre = validarNombre();
		if (valNombre == false){
			document.getElementById("idNombre").style.color = "red";
			if (foco == true){
				document.getElementById("idNombre").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNombre").style.color = "black";
		}
		
		//APELLIDO1
		var valApellido1 = validarApellido1();
		if (valApellido1 == false){
			document.getElementById("idApellido1").style.color = "red";
			if (foco == true){
				document.getElementById("idApellido1").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idApellido1").style.color = "black";
		}

		//APELLIDO2
		var valApellido2 = validarApellido2();
		if (valApellido2 == false){
			document.getElementById("idApellido2").style.color = "red";
			if (foco == true){
				document.getElementById("idApellido2").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idApellido2").style.color = "black";
		}
		
		//TELEFONO1
		var valTelefono1 = validarTelefono1();
		if (valTelefono1 == false){
			document.getElementById("idTelefono1").style.color = "red";
			if (foco == true){
				document.getElementById("idTelefono1").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idTelefono1").style.color = "black";
		}

		//TELEFONO2
		var valTelefono2 = validarTelefono2();
		if (valTelefono2 == false){
			document.getElementById("idTelefono2").style.color = "red";
			if (foco == true){
				document.getElementById("idTelefono2").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idTelefono2").style.color = "black";
		}
		
		//MAIL1
		var valMail1 = validarMail1();
		if (valMail1 == false){
			document.getElementById("idMail1").style.color = "red";
			if (foco == true){
				document.getElementById("idMail1").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idMail1").style.color = "black";
		}

		//MAIL2
		var valMail2 = validarMail2();
		if (valMail2 == false){
			document.getElementById("idMail2").style.color = "red";
			if (foco == true){
				document.getElementById("idMail2").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idMail2").style.color = "black";
		}

		//CP
		var valCP = validarCP();
		if (valCP == false){
			document.getElementById("idCP").style.color = "red";
			if (foco == true){
				document.getElementById("idCP").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idCP").style.color = "black";
		}

		
		var valImagen = validarImagen();
		if (valImagen == false){
			document.getElementById("nueva").style.color = "red";
			if (foco == true){
				document.getElementById("nueva").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("nueva").style.color = "black";
		}
		
		
		//Si todo esta a TRUE hace el submit
		if(valPasswordAntigua && valPasswordNueva && valNombre && valApellido1 && valApellido2 && valTelefono1 && valTelefono2 && valMail1 && valMail2 && valCP && valImagen){
			//document.form1.submit();
			//crear();
			return true;
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
			return false;
		}

	}

</script>                              
                            <!-- 
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> Información básica</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Nombre</dt>
                                            <dd>Mallinda Hollaway</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 1</dt>
                                            <dd>Female</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 2</dt>
                                            <dd>June 23, 1990</dd>
                                        </dl>
                                      
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Nombre</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="nombre placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="apellido1" placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="apellido2" placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Guardar</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-phone m-r-5"></i>Información de contacto</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Teléfono 1</dt>
                                            <dd>00971 12345678 9</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Teléfono 2</dt>
                                            <dd>malinda.h@gmail.com</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 1</dt>
                                            <dd>@malinda</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 2</dt>
                                            <dd>malinda.hollaway</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Comentario contacto</dt>
                                            <dd>Este es el comentariod e contactoEste es el comentariod e contactoEste es el comentariod e contacto
                                            Este es el comentariod e contactoEste es el comentariod e contactoEste es el comentariod e contacto
                                            Este es el comentariod e contactoEste es el comentariod e contactoEste es el comentariod e contacto
                                            Este es el comentariod e contactoEste es el comentariod e contacto</dd>
                                        </dl> 
                                       
                                    	
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. 00971 12345678 9">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. @malinda">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" placeholder="Comentario de contacto...">Comentario de contacto.</textarea>
                                        </div>
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Guardar</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-home m-r-5"></i>Información de dirección</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Dirección</dt>
                                            <dd>00971 12345678 9</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Código Postal</dt>
                                            <dd>malinda.h@gmail.com</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Localidad</dt>
                                            <dd>@malinda</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Provincia</dt>
                                            <dd>malinda.hollaway</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>País</dt>
                                            <dd>malinda.hollaway</dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Comentario dirección</dt>
                                            <dd>Comentario de direcciónComentario de direcciónComentario de dirección
                                            Comentario de direcciónComentario de direcciónComentario de dirección
                                            Comentario de direcciónComentario de direcciónComentario de dirección</dd>
                                        </dl> 
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Dirección</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. 00971 12345678 9">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Código Postal</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Localidad</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. @malinda">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Provincia</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt class="p-t-10">País</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" placeholder="Comentario de dirección...">Comentario de dirección.</textarea>
                                        </div>
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Guardar</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           -->