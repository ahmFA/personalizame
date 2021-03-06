
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free Bootstrap Themes Designed by 365bootstrap.com" />
    <meta name="author" content="http://www.365bootstrap.com" />

    <title>Personalízame</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
	
	 <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
	<!-- circle Menu -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/circle-menu.min.css">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
     <style>
          .prev-image {
            height: 150px;
            width: 15opx;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
        </style>
</head>
<body>

<!-- Modal -->
  <div class="modal fade" id="formContact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Formulario de contacto</h4>
        </div>
        <div class="modal-body">
          <?= $mensajeEnviado ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
 <script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
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
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Usuario o email</label>
              <input type="text" class="form-control" id="idUser" name="user" placeholder="Introduce email">
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
 
  <!-- Modal de registro -->
  <div class="modal fade" id="registro" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
  
      <div class="modal-content">
        <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Registro de nuevo usuario</h4>
          <div id="idBanner"></div>
        </div>
        <div class="modal-body">
   <!-- <form name="formRegistro" id="formRegistro">   -->      
            <div class="form-group">
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Usuario</label>
              <input type="text" class="form-control" id="nickRegistro" name="nick" placeholder="Introduce un nick">
            </div>
             <div class="form-group">
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Email</label>
              <input type="text" class="form-control" id="mailRegistro" name="mail" placeholder="Introduce tu email">
            </div>
            <div class="form-group">
              <label for="idPassword"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="pwdRegistro" name="pwd" placeholder="Introduce password">
            </div>

            <button onclick="validarReg()" class="btn btn-success btn-block">Registrarse</button> <!--  <span class="glyphicon glyphicon-check"></span></button>-->
  <!-- </form>  -->     
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 


 <script type="text/javascript">
  var con;
  var conectar;

	function registroPost() {
		document.getElementById("idBanner").innerHTML = con.responseText;

		//comprobacion para ver si borro o no los campos tras una insercion
		var str = con.responseText;
		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
			//registrar();
			document.formRegistro.submit();
		}
		
	}
	/*
	function registrar() {
		conectar = new XMLHttpRequest();

		//var datosSerializados = serialize(document.getElementById("idForm1"));
		var datos = 'nick='+document.getElementById('idNick').value+'&mail='+document.getElementById('idMail').value+'&pwd='+document.getElementById('idPassword').value;
		conectar.open('POST', '<?=base_url() ?>usuario/registro', true);
		conectar.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conectar.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conectar.send(datos);
		conectar.onreadystatechange = function() {
			if (conectar.readyState==4 && conectar.status==200) {
				accionAJAX2();
			}
		}
	}
	*/

	function validarRegistro() {
		conexion = new XMLHttpRequest();

		//var datosSerializados = serialize(document.getElementById("idForm1"));
		var datos = 'nick='+document.getElementById('nickRegistro').value+'&mail='+document.getElementById('mailRegistro').value;
		conexion.open('POST', '<?=base_url() ?>usuario/validarRegistro', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datos);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				registroPost();
			}
		}
	}

	function validarReg(){
		var foco = true;
		
		//NICK
		var valNick = validarNick();
		if (valNick == false){
			document.getElementById("nickRegistro").style.color = "red";
			//document.getElementByid("idNick").setAttribute("title","El Nick debe contener 3 caracteres como mÃ­nimo");
			if (foco == true){
				document.getElementById("nickRegistro").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("nickRegistro").style.color = "black";
		}

		//PASSWORD
		var valPassword = validarPassword();
		if (valPassword == false){
			document.getElementById("pwdRegistro").style.color = "red";
			if (foco == true){
				document.getElementById("pwdRegistro").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("pwdRegistro").style.color = "black";
		}

		//MAIL1
		var valMail = validarMail();
		if (valMail == false){
			document.getElementById("mailRegistro").style.color = "red";
			if (foco == true){
				document.getElementById("mailRegistro").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("mailRegistro").style.color = "black";
		}

		//Si todo esta a TRUE hace el submit
		if(valNick && valPassword && valMail){
			//document.form1.submit();
			//validarRegistro();
			con = new XMLHttpRequest();

		//var reg = serialize(document.getElementById("formRegistro"));
		var reg = 'nick='+document.getElementById('nickRegistro').value+'&mail='+document.getElementById('mailRegistro').value+'&pwd='+document.getElementById('pwdRegistro').value;
		con.open('POST', '<?= base_url() ?>usuario/validarRegistro', true);
		con.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		con.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		//con.send();
		con.send(reg);
		con.onreadystatechange = function() {
			if (con.readyState==4) {
				//registroPost();
				document.getElementById("idBanner").innerHTML = con.responseText;

				//comprobacion para ver si borro o no los campos tras una insercion
				var str = con.responseText;
				var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
				if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
					//registrar();
					//document.formRegistro.reset();
				}
			}
		}
			//alert('Datos correctos');
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-12\"> <strong>ERROR:</strong> Datos incorrectos</div>";
		}
	}
	

	function validarNick(){
		var valido = false;
		var miNick = document.getElementById("nickRegistro").value;
		//entre 3 y 20 caracteres
		if(/^\w{3,20}$/.test(miNick)){
			valido = true;
		}
		return valido;
	}

	function validarPassword(){
		var valido = false;
		var miPwd = document.getElementById("pwdRegistro").value.length;
		//longitud entre 5 y 20 caracteres
		if(miPwd >= 5 && miPwd <= 20){
			valido = true;
		}
		return valido;
	}

	function validarMail(){
		var valido = false;
		var miMail = document.getElementById("mailRegistro").value;
		//solo correo que empiece por letra o numero, tras la arroba tener texto+(punto+extension)puede repetirse -> .com.es
		if(/^[a-zA-Z0-9]+([\.-]?\w+)*@[a-zA-Z0-9]+([\.-]?\w+)*(\.[a-z]{2,3})+$/.test(miMail)){
			valido = true;
		}
		return valido;
	}
	
  </script>

	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<img src="<?=base_url() ?>assets/images/logo.png" alt="">
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear" class="btn btn-l"><strong>DISEÑA TUS PRODUCTOS</strong></a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal" class="btn btn-l"><strong>CREA TU PROPIO DISEÑO</strong></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
	<!-- Header -->
	<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">Personalízame</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden"><a href="#page-top"></a></li>
				
				<li><a class="page-scroll" href="#services">Productos</a></li>
				<li><a class="page-scroll" href="#portfolio">categorías</a></li>
				<li><a class="page-scroll" href="#about">Nosotros</a></li>
				<li><a class="page-scroll" href="#contact">Contacto</a></li>
				<?php if(!isset($_SESSION['nick']) && !isset($_SESSION['perfil'])):?>
					<li><a data-toggle="modal" href="#myModal">Login</a></li>
					
				<?php else:?>
					<?php if($_SESSION['perfil'] == 'Administrador'):?>
						<li><a href="<?=base_url()?>home/indexAdmin">ADMIN</a></li>
					<?php else :?>
						<li><a href="<?=base_url()?>usuario/perfil">perfil</a></li>	
					<?php endif;?>
					
					<li><a href="<?=base_url()?>usuario/logout">LOGOUT</a></li>
					<li><a href="<?=base_url()?>usuario/cesta"><img alt="" src="<?= base_url() ?>assets/images/carrito.png">
                                <i id="carrito"><?= $_SESSION['carrito'] ?></i></a></li>
					
				<?php endif;?>
				
				
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
<!-- Navigation -->
	
	<div id="c-circle-nav" class="c-circle-nav">
	  <button id="c-circle-nav__toggle" class="c-circle-nav__toggle">
		<span>Toggle</span>
	  </button>
	  <ul class="c-circle-nav__items">
		<li class="c-circle-nav__item">
		  <a href="#" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/House.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http://www.facebook.com" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Facebook.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http://www.pinterest.com" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Pinterest.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http://www.twitter.com" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Twitter.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http://www.google.com" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Google.png" /></center>
		  </a>
		</li>
	  </ul>
	</div>
	<!-- circle-nav -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page">
	
		<!-- ////////////Services -->
		<section class="box-content " id="services">
			<div class="container">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Productos</h2>
						<hr class="line02">
	                    <div class="intro">Lo que quieres es lo que tienes</div>
	                </div>
				</div>
				<div class="row">
					<div class="col-sm-4 services-item">
						<div class="wrap-img">
							<img src="<?=base_url() ?>assets/images/camiseta.png" />
						</div>
						<h3 class="services-heading">Camisetas</h3>
						<p>Personaliza tu camiseta para ser único, las opciones son 
						ilimitadas. Te recomendamos que pongas la peor foto de tu pareja y la pasees con orgullo.</p>
						<form name="formCamiseta" id="fCamiseta" method="post" action="<?=base_url() ?>producto/crear"> 	
 							<input type="hidden" name="articulo" value="Camiseta">
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<button type="submit" class="btn btn-2 ">Personaliza</button>
							<?php else:?>
							<a data-toggle="modal" href="#myModal" class="btn btn-2">Personaliza</a>
							<?php endif; ?>
						</form>
					</div>
					<div class="col-sm-4 services-item">
						<div class="wrap-img">
							<img src="<?=base_url() ?>assets/images/taza.png" />
						</div>
						<h3 class="services-heading">Tazas</h3>
						<p>Toma café, té, chocolate caliente o unas lentejas si te apetece,
						 pero tomatelas en una taza con estilo que tiene algo de tu personalidad.</p>
						<form name="formTaza" id="fTaza" method="post" action="<?=base_url() ?>producto/crear"> 	
 							<input type="hidden" name="articulo" value="Taza">
 							<?php if(isset($_SESSION['idUsuario'])): ?>
							<button type="submit" class="btn btn-2 ">Personaliza</button>
							<?php else:?>
							<a data-toggle="modal" href="#myModal" class="btn btn-2">Personaliza</a>
							<?php endif; ?>
						</form>
					</div>
					<div class="col-sm-4 services-item">
						<div class="wrap-img">
							<img src="<?=base_url() ?>assets/images/llavero.png" />
						</div>
						<h3 class="services-heading">Llaveros</h3>
						<p>Desde el momento en que te compres el llavero, vas a tener más miedo
						 de perder las llaves de casa por lo bonito que es que por que roben en tu hogar.</p>
						<form name="formLlavero" id="fLlavero" method="post" action="<?=base_url() ?>producto/crear"> 	
 							<input type="hidden" name="articulo" value="Llavero">
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<button type="submit" class="btn btn-2 ">Personaliza</button>
							<?php else:?>
							<a data-toggle="modal" href="#myModal" class="btn btn-2">Personaliza</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
		</section>
		
		<!-- ////////////Portfolio -->
		<section class="box-content box-style" id="portfolio">
			<div class="container">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Categorías</h2>
						<hr class="line01">
	                    <div class="intro">Las imágenes que más gustan</div>
	                </div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Deportes" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/deportes.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Deportes</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Ficción" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/ficcion.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Ficción</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Infantil" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/infantil.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Infantil</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Humor" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/humor.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Humor</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Terror" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/terror.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Terror</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Profesiones" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/profesiones.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Profesiones</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Gaming" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/gaming.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Gaming</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<?php if(isset($_SESSION['idUsuario'])): ?>
						<a href="<?=base_url() ?>producto/crear/?categoria=Animales" class="portfolio-link" data-toggle="modal">
						<?php else:?>
						<a data-toggle="modal" href="#myModal" class="portfolio-link" >
						<?php endif; ?>
						
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/animales.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Animales</h4>
							<p class="text-muted"></p>
						</div>
					</div>
                </div>
			</div>
		</section>
		
		<!-- ////////////About -->
		<section class="box-content" id="about">
			<div class="container">
				<div class="row center">
					<div class="col-md-6">
						<div class="wrap-img">
							<img src="<?=base_url() ?>assets/images/nosotros.jpg">
						</div>
						<ul class="list-inline social-buttons">
                            <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
                            </li>
							<li><a href="http://www.google.com"><i class="fa fa-google"></i></a>
                            </li>
                        </ul>
					</div>
					<div class="col-md-6">
						<div class="row heading">
							<h2>Nosotros</h2>
		                    <hr class="line02">
	                    	<div class="intro">Conócenos un poco</div>
						</div>
						<div class="row">
							<p>Somos un par de chavales en la flor de la vida, aprendiendo de este bonito mundo que es
							el desarrollo web, tratando de aprobar el proyecto y así incorporarnos en el 
							mercado laboral para ser los Fucking Masters of the Universe.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<!-- ////////////Contact -->
		<section class="box-content box-style" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="row heading">
							<h2>Contacta con nosotros</h2>
							<hr class="line01">
							<div class="intro">Dudas o recomendaciones</div>
						</div>
					</div>
					<div class="col-md-6 contact-item">
						<div class="row">
							<div class="col-sm-12">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.289259162295!2d-120.7989351!3d37.5246781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8091042b3386acd7%3A0x3b4a4cedc60363dd!2sMain+St%2C+Denair%2C+CA+95316%2C+Hoa+K%E1%BB%B3!5e0!3m2!1svi!2s!4v1434016649434" width="95%" frameborder="0" style="border:0"></iframe>
								<p>JL.Kemacetan timur no.23. Jakarta-Indonesia</p>
								<p>555 888 889 <br>
									555 888 880</p>
								<p>info@personalizame.com</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 contact-item">
					 <form name="form1" id="ff" method="post" action="<?=base_url() ?>contact/formContacto"> 
							<div id="mensaje">
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Tu Nombre *" name="name" id="name" required data-validation-required-message="Please enter your name.">
									</div>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Tu Email *" name="email" id="email" required data-validation-required-message="Please enter your email address.">
									</div>
									<div class="form-group">
										<input type="tel" class="form-control" placeholder="Tu TelÃ©fono *" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea class="form-control" placeholder="Tu Mensaje *" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 text-center">
									<div id="success"></div>
									<button type="submit" class="btn btn-l">Enviar Mensaje</button>
								</div>
							</div>
 						</form> 
					</div>
				</div>
			</div>
		</section>
		<!-- ////////////Subcribe -->
		<section class="box-content box-style-1" id="subcribe">
			<div class="container">
				<div class="row">
					<div class="col-md-6 sub-text">
						<h2>Regístrate</h2>
                    	<p>¿a qué esperas?</p>
					</div>
					<div class="col-md-6" style="padding-top: 20px; text-align: center;">
						<a data-toggle="modal" href="#registro" class="btn btn-l"><strong>REGISTRO</strong></a>
					</div>
				</div>
			</div>
		</section>
	</div>

<!-- /////////////////////////////////////////Footer -->
<footer>
	<div class="wrap-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-footer footer-1">
					<div class="content">
						<a href="#"><img src="<?=base_url() ?>assets/images/logo.png" alt=""></a>
						
					</div>
				</div>
				<div class="col-md-4 col-footer footer-2">
					<div class="heading">
						<h4>Sobre Nosotros</h4>
					</div>
					<div class="content">
						<div class="row">
							<p>Somos un par de chavales en la flor de la vida, aprendiendo de este bonito mundo
							 que es el desarrollo web, tratando de aprobar el proyecto y así incorporarnos en el
							  mercado laboral para ser los Fucking Masters of the Universe.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-footer footer-4">
					<div class="heading">
						<h4>Categorías</h4>
					</div>
					<div class="content">
						<ul>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Deportes">Deportes</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Deportes</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Terror">Terror</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Terror</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Infantil">Infantil</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Infantil</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Animales">Animales</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Animales</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Ficción">Ciencia Ficción</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Ciencia Ficción</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Profesiones">Profesiones</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Profesiones</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Humor">Humor</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Humor</a>
							<?php endif; ?>
							</li>
							<li>
							<?php if(isset($_SESSION['idUsuario'])): ?>
							<a href="<?=base_url() ?>producto/crear/?categoria=Gaming">Gaming</a>
							<?php else:?>
							<a data-toggle="modal" href="#myModal">Gaming</a>
							<?php endif; ?>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					Copyright &copy; Personalízame -  Desarrollado por Alejandro y Luis de 2º de DAW
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/js/agency.js"></script>

<!-- Plugin JavaScript -->
<script src="<?=base_url()?>assets/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>assets/js/classie.js"></script>
<script src="<?=base_url()?>assets/js/cbpAnimatedHeader.js"></script>
<script src="<?=base_url()?>assets/js/circleMenu.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	function hash(){
		if(window.location.hash != ''){
			
			$('a[href="'+window.location.hash+'"]').trigger('click');
		}	
	}
	hash();
});
</script>

<?php if(isset($mensajeEnviado)):?>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#formContact').modal('show');

		});
		
	</script>
<?php endif; ?>
</body>
</html>