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
    <link href="<?=base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url() ?>assets/css/style.css" rel="stylesheet">
	
	 <!-- Custom Fonts -->
    <link href="<?=base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
	<!-- circle Menu -->
	<link rel="stylesheet" href="<?=base_url() ?>assets/css/circle-menu.min.css">
	
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
 
  <!-- Modal de registro -->
  <div class="modal fade" id="registro" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
  
      <div class="modal-content">
        <div class="modal-header">
        <div id="idBanner"></div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Registro de nuevo usuario</h4>
        </div>
        <div class="modal-body">
       <form role="form" action="<?=base_url()?>usuario/registro" method="post" name="formRegistro"> 
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

            <button onclick="validar()" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-check"></span> Registrarse</button>
    	 </form>    
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
        </div>
      </div>
    </div>
  </div> 


 <script type="text/javascript">
  var conexion;
  var conectar;

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;

		//comprobacion para ver si borro o no los campos tras una insercion
		var str = conexion.responseText;
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
		var datos = 'nick='+document.getElementById('idNick').value+'&mail='+document.getElementById('idMail').value;
		conexion.open('POST', '<?=base_url() ?>usuario/validarRegistro', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datos);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}

	function validar(){
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
			document.getElementById("idMai").style.color = "red";
			if (foco == true){
				document.getElementById("idMai").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idMail1").style.color = "black";
		}

		//Si todo esta a TRUE hace el submit
		if(valNick && valPassword && valMail){
			//document.form1.submit();
			validarRegistro();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR:</strong> Datos incorrectos</div>";
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

	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<img src="<?=base_url() ?>assets/images/logo.png" alt="">
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
							<a href="<?=base_url() ?>usuario/crearDiseno" class="btn btn-l"><strong>CREA TU PROPIO DISEÑO</strong></a>
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
				<li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
				<li><a class="page-scroll" href="#about">Nosotros</a></li>
				<li><a class="page-scroll" href="#contact">Contacto</a></li>
				<?php if(!isset($_SESSION['nick']) && !isset($_SESSION['perfil'])):?>
					<li><a data-toggle="modal" href="#myModal">Login</a></li>
					
				<?php else:?>
					<?php if($_SESSION['perfil'] == 'Administrador'):?>
						<li><a href="<?=base_url()?>home/indexAdmin">ADMIN</a></li>
					<?php else :?>
						<li><a href="<?=base_url()?>usuario/perfil">Mi perfil</a></li>	
					<?php endif;?>
					
					<li><a href="<?=base_url()?>usuario/logout">LOGOUT</a></li>
					<li><a href="<?=base_url()?>usuario/cesta"><img alt="" src="<?= base_url() ?>assets/images/cesta.png">
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
		  <a href="#" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Facebook.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="<?=base_url() ?>home/indexAdmin" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Pinterest.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="#" class="c-circle-nav__link">
			<center><img src="<?=base_url() ?>assets/images/Twitter.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="#" class="c-circle-nav__link">
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
						<button type="submit" class="btn btn-2 ">Ver más</button>
					</div>
					<div class="col-sm-4 services-item">
						<div class="wrap-img">
							<img src="<?=base_url() ?>assets/images/taza.png" />
						</div>
						<h3 class="services-heading">Tazas</h3>
						<p>Toma café, té, chocolate caliente o unas lentejas si te apetece,
						 pero tómatelas en una taza con estilo que tiene algo de tu personalidad.</p>
						<button type="submit" class="btn btn-2 ">Ver más</button>
					</div>
					<div class="col-sm-4 services-item">
						<div class="wrap-img">
							<img src="<?=base_url() ?>assets/images/taza.png" />
						</div>
						<h3 class="services-heading">Tazas</h3>
						<p>Toma café, té, chocolate caliente o unas lentejas si te apetece,
						 pero tómatelas en una taza con estilo que tiene algo de tu personalidad.</p>
						<button type="submit" class="btn btn-2 ">Ver más</button>
					</div>
				</div>
			</div>
		</section>
		
		<!-- ////////////Portfolio -->
		<section class="box-content box-style" id="portfolio">
			<div class="container">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Portfolio</h2>
						<hr class="line01">
	                    <div class="intro">Las imágenes que más gustan</div>
	                </div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 portfolio-item">
						<a href="#" class="portfolio-link" data-toggle="modal">
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
						<a href="#" class="portfolio-link" data-toggle="modal">
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/ciencia-ficcion.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Ciencia Ficción</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<a href="#" class="portfolio-link" data-toggle="modal">
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/dibujos.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Infantil</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<a href="#" class="portfolio-link" data-toggle="modal">
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/mar.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Mar</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<a href="#" class="portfolio-link" data-toggle="modal">
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
						<a href="#" class="portfolio-link" data-toggle="modal">
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
						<a href="#" class="portfolio-link" data-toggle="modal">
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/calavera.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Calaveras</h4>
							<p class="text-muted"></p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 portfolio-item">
						<a href="#" class="portfolio-link" data-toggle="modal">
							<div class="portfolio-hover">
								<div class="portfolio-hover-content">
									<i class="fa fa-eye fa-3x"></i>
								</div>
							</div>
							<img src="<?=base_url() ?>assets/images/cocina.jpg" class="img-responsive" alt="">
						</a>
						<div class="portfolio-caption center">
							<h4>Cocina</h4>
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
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
							<li><a href="#"><i class="fa fa-google"></i></a>
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
								<p>JL.Kemacetan timur no.23. block.Q3 Jakarta-Indonesia</p>
								<p>555 888 888 90 <br>
									555 888 888 91</p>
								<p>info@personalizame.com</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 contact-item">
						<form name="form1" id="ff" method="post" action="contact.php">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Tu Nombre *" name="name" id="name" required data-validation-required-message="Please enter your name.">
									</div>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Tu Email *" name="email" id="email" required data-validation-required-message="Please enter your email address.">
									</div>
									<div class="form-group">
										<input type="tel" class="form-control" placeholder="Tu Teléfono *" name="phone" id="phone" required data-validation-required-message="Please enter your phone number.">
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
						<h2>Suscríbete</h2>
                    	<p>y no te pierdas nada</p>
					</div>
					<div class="col-md-6 sub-form">
						<form method="get" action="/search" id="subcribe-form">
						  <input name="q" type="text" size="40" placeholder="Introduce tu email...  " />
						  <input type="submit" name="Submit" value="Enviar">
						</form>
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
				<div class="col-md-3 col-footer footer-1">
					<div class="content">
						<a href="#"><img src="<?=base_url() ?>assets/images/logo.png" alt=""></a>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
							euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
							Ut wisi enim ad. Lorem ipsum dolor sit amet, consectetuer</p>
					</div>
				</div>
				<div class="col-md-3 col-footer footer-2">
					<div class="heading">
						<h4>Partners</h4>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="<?=base_url() ?>assets/images/15.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="<?=base_url() ?>assets/images/16.jpg" /></a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="<?=base_url() ?>assets/images/17.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="<?=base_url() ?>assets/images/18.jpg" /></a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="#"><img src="<?=base_url() ?>assets/images/19.jpg" /></a>
							</div>
							<div class="col-md-6">
								<a href="#"><img src="<?=base_url() ?>assets/images/20.jpg" /></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-footer footer-3">
					<div class="heading">
						<h4>About Us</h4>
					</div>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
							euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
							Ut wisi enim ad. Lorem ipsum dolor sit amet, consectetuer
							adipiscing elit, sed euismod tincidunt ut laoreet dolore magna
							aliquam erat volutpat. Ut wisi enim ad</p>
					</div>
				</div>
				<div class="col-md-3 col-footer footer-4">
					<div class="heading">
						<h4>Tags</h4>
					</div>
					<div class="content">
						<ul>
							<li><a href="#">Lorem</a></li>
							<li><a href="#">Ipsum</a></li>
							<li><a href="#">Euismod</a></li>
							<li><a href="#">Laoreet</a></li>
							<li><a href="#">Dolore</a></li>
							<li><a href="#">Dasdas</a></li>
							<li><a href="#">Consectetuer</a></li>
							<li><a href="#">Aasdasls</a></li>
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
<script src="<?=base_url() ?>assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url() ?>assets/js/agency.js"></script>

<!-- Plugin JavaScript -->
<script src="<?=base_url() ?>assets/js/jquery.easing.min.js"></script>
<script src="<?=base_url() ?>assets/js/classie.js"></script>
<script src="<?=base_url() ?>assets/js/cbpAnimatedHeader.js"></script>
<script src="<?=base_url() ?>assets/js/circleMenu.min.js"></script>
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
</body>
</html>