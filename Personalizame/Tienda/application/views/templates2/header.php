<!-- 
<header class="container">
<img src="<?=base_url()?>assets/img/logtn1.jpg" class="img-rounded  center-block" alt="Tienda ejemplo" height="100">
</header>
<div class="container">
<div class="col-xs-12 text-right">
<?= "Conectado como" //session_id() ?>
  	<?= isset($_SESSION['perfil']) ? $_SESSION['perfil'] : "Invitado" ?>
  	<?= isset($_SESSION['nick']) ?": ".$_SESSION['nick'] : null ?>
  	
  	<?php if(!isset($_SESSION['nick']) && !isset($_SESSION['perfil'])):?>
		<a data-toggle="modal" href="#myModal">LOGUÃ‰ATE</a>
	<?php else:?>
		<a href="<?=base_url()?>usuario/logout">LOGOUT</a>
	<?php endif;?>
  </div>
 -->  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="<?=base_url()?>usuario/loginPost" method="post">
            <div class="form-group">
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Usuario</label>
              <input type="text" class="form-control" id="idMail" name="mail" placeholder="Introduce email">
            </div>
            <div class="form-group">
              <label for="idPassword"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="idPassword" name="pwd" placeholder="Introduce password">
            </div>

            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          <p>¿Aún no eres miembro? <a data-toggle="modal" data-dismiss="modal" href="#registro">Registrate</a></p>
          <p>¿Olvidaste tu <a href="#">contraseña?</a></p>
        </div>
      </div>
    </div>
  </div> 
  <script type="text/javascript">
  var conexion;

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;

		//comprobacion para ver si borro o no los campos tras una insercion
		var str = conexion.responseText;
		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
			document.getElementById("idForm1").reset();
		}
		
	}

	function crearTalla() {
		conexion = new XMLHttpRequest();

		//var datosSerializados = serialize(document.getElementById("idForm1"));
		var datos = 'nick='+document.getElementById('idNick').value+'&mail='+document.getElementById('idMail').value+'&pwd='+document.getElementById('idPassword').value;
		conexion.open('POST', '<?=base_url() ?>usuario/registro', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datos);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}

	function validarRegistro(){
		var foco = true;
		
		//NICK
		var valNick = validarNick();
		if (valNick == false){
			document.getElementById("idNick").style.color = "red";
			//document.getElementByid("idNick").setAttribute("title","El Nick debe contener 3 caracteres como mínimo");
			if (foco == true){
				document.getElementById("idNick").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNick").style.color = "black";
		}

		//PASSWORD
		var valPassword = validarPassword();
		if (valPassword == false){
			document.getElementById("idPassword").style.color = "red";
			if (foco == true){
				document.getElementById("idPassword").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idPassword").style.color = "black";
		}

		//MAIL1
		var valMail = validarMail();
		if (valMail == false){
			document.getElementById("idMail").style.color = "red";
			if (foco == true){
				document.getElementById("idMail").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idMail1").style.color = "black";
		}

		//Si todo esta a TRUE hace el submit
		if(valNick && valPassword && valMail){
			//document.form1.submit();
			registro();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}
	}
	

	function validarNick(){
		var valido = false;
		var miNick = document.getElementById("idNick").value;
		//entre 3 y 20 caracteres
		if(/^\w{3,20}$/.test(miNick)){
			valido = true;
		}
		return valido;
	}

	function validarPassword(){
		var valido = false;
		var miPwd = document.getElementById("idPassword").value.length;
		//longitud entre 5 y 20 caracteres
		if(miPwd >= 5 && miPwd <= 20){
			valido = true;
		}
		return valido;
	}

	function validarMail(){
		var valido = false;
		var miMail = document.getElementById("idMail").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail)){
			valido = true;
		}
		return valido;
	}
	
  </script>
  <!-- Modal de registro -->
  <div class="modal fade" id="registro" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Registro de nuevo usuario</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="<?=base_url()?>usuario/registro" method="post">
            <div class="form-group">
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Usuario</label>
              <input type="text" class="form-control" id="idNick" name="nick" placeholder="Introduce un nick">
            </div>
             <div class="form-group">
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input type="text" class="form-control" id="idMail" name="mail" placeholder="Introduce tu email">
            </div>
            <div class="form-group">
              <label for="idPassword"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="idPassword" name="pwd" placeholder="Introduce password">
            </div>

            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-check"></span> Registrarse</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
</div>
