	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>

<!-- <div class="container-fluid" style="background-color: #E7E7E7;">  -->
<section class="box-content box-style">
			<div class="container-fluid">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Edita tu perfil</h2>
						
	                </div>
				</div>
	<div class="row m-t-25">
		
		<div
			class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">

		<!-- 	<h2>Perfil de Usuario</h2>   -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $_SESSION['nick'] ?>a</h3>
				</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-xs-12" id="idBan">
					</div>
						<div class="col-md-3 col-lg-3" align="center">
							<img alt="User Pic"
								src="../../../../img/usuarios/<?= $_SESSION['imagen'] ?>"
								class="img-circle img-responsive">
						</div>
			
						<div class=" col-md-9 col-lg-9 ">
						<form action="<?= base_url() ?>usuario/editarPerfil2" method="post" name="form1" enctype="multipart/form-data">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Imagen</td>
										<td>
											<input type="file" id="files" name="files">
											<output id="list"></output>	
										</td>
									<tr>
										<td>Contraseña:</td>
										<td><input class="form-control" type="password" id="idPwd" name="pwd" value="<?= $usuario->pwd ?>"></td>
									</tr>
									<tr>
										<td>Nombre:</td>
										<td><input class="form-control" type="text" id="idNombre" name="nombre" value="<?= $usuario->nombre ?>"></td>
									</tr>
									<tr>
										<td>Apellido 1:</td>
										<td><input class="form-control" type="text" id="idApellido1" name="apellido1" value="<?= $usuario->apellido1 ?>"></td>
									</tr>
									<tr>
										<td>Apellido2:</td>
										<td><input class="form-control" type="text" id="idApellido2" name="apellido2" value="<?= $usuario->apellido2 ?>"></td>
									</tr>

									<tr>
										<td>Teléfonos:</td>
										<td>
										<label>Teléfono 1: </label><input class="form-control" type="text" id="idTelefono1" name="telefono1" value="<?= $usuario->telefono1 ?>"><br>
										<label>Teléfono 2: </label><input class="form-control" type="text" id="idTelefono2" name="telefono2" value="<?= $usuario->telefono2 ?>"></td>
									</tr>
									<tr>
										<td>Emails:</td>
										<td>
										<label>Email 1: </label><input class="form-control" type="email" id="idMail1" name="mail1" value="<?= $usuario->mail1 ?>"><br>
										<label>Email 2: </label><input class="form-control" type="email" id="idMail2" name="mail2" value="<?= $usuario->mail2 ?>"></td>
									</tr>
									<tr>
										<td>Comentario de contacto:</td>
										<td>
											<textarea class="form-control" id="idComentarioContacto" name="comentario_contacto" rows="3" cols="10" style="resize: none;"><?= $usuario->comentario_contacto ?>
											</textarea>
										</td>
									</tr>
									<tr>
										<td>Dirección:</td>
										<td>
											<input class="form-control" type="text" id="idDireccion" name="direccion" value="<?= $usuario->direccion ?>" placeholder="Dirección">
											<input class="form-control" type="text" id="idCP" name="cp" value="<?= $usuario->cp ?>" placeholder="Código Postal">
											<input class="form-control" type="text" id="idLocalidad" name="localidad" value="<?= $usuario->localidad ?>" placeholder="Localidad">
											<input class="form-control" type="text" id="idProvincia" name="provincia" value="<?= $usuario->provincia ?>" placeholder="Provincia">
											<input class="form-control" type="text" id="idPais" name="pais" value="<?= $usuario->pais ?>" placeholder="País">
										</td>
									</tr>
									<tr>
										<td>Comentario de dirección:</td>
										<td>
											<textarea class="form-control" id="idComentarioDireccion" name="comentario_direccion" rows="3" cols="10" style="resize: none;"><?= $usuario->comentario_direccion ?>
											</textarea>
										</td>
									</tr>
									
									<!-- 
									<tr>
										<td>Código Postal:</td>
										<td><?= $usuario->cp ?></td>
									</tr>
									<tr>
										<td>Localidad:</td>
										<td><?= $usuario->localidad ?></td>
									</tr>
									<tr>
										<td>Provincia:</td>
										<td><?= $usuario->provincia ?></td>
									</tr>
									<tr>
										<td>País:</td>
										<td><?= $usuario->pais ?></td>
									</tr>
									 -->
								</tbody>
								
							</table>
							</form>
						</div>
					</div>
				</div>
				<div class="panel-footer">
				
					<button type="button" class="btn btn-success" onclick="validarPerfil()">Guardar</button>  
					<a	href="<?=base_url() ?>usuario/perfil" class="btn btn-danger">Cancelar <i class="glyphicon glyphicon-close"></i></a>
				
				
				<!-- 
					<a data-original-title="Broadcast Message" data-toggle="tooltip"
						type="button" class="btn btn-sm btn-primary"><i
						class="glyphicon glyphicon-envelope"></i></a> <span
						class="pull-right"> <a href="<?=base_url() ?>usuario/editarPerfil"
						data-original-title="Edit this user" data-toggle="tooltip"
						type="button" class="btn btn-sm btn-warning"><i
							class="glyphicon glyphicon-edit"></i></a> <a
						data-original-title="Remove this user" data-toggle="tooltip"
						type="button" class="btn btn-sm btn-danger"><i
							class="glyphicon glyphicon-remove"></i></a>
					</span>
					
				 -->	
				</div>

			</div>
		</div>
	</div>
</div>
</section>
<script type="text/javascript">
<!--

//-->

$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
 <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="prev-image" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>
      
      <script type="text/javascript">
	
	function validarPassword(){
		var valido = false;
		var miPwd = document.getElementById("idPwd").value.length;
		//longitud entre 5 y 20 caracteres
		if(miPwd >= 5 && miPwd <= 20){
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
	
	function validarPerfil(){
		var foco = true;
		
		//PASSWORD
		var valPassword = validarPassword();
		if (valPassword == false){
			document.getElementById("idPwd").style.color = "red";
			if (foco == true){
				document.getElementById("idPwd").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idPwd").style.color = "black";
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
		
		//Si todo esta a TRUE hace el submit
		if(valPassword && valNombre && valApellido1 && valApellido2 && valTelefono1 && valTelefono2 && valMail1 && valMail2 && valCP){
			document.form1.submit();
		}	
		else{
			document.getElementById("idBan").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}
	}

</script>
      