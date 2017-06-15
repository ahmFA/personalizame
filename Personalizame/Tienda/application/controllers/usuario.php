<?php
session_start();
/* class Usuario
 * @author Luis
 * @packcage application\controllers
 */
class Usuario extends CI_Controller{
	/*
	 * muestra el formulario de crear usuario
	 */
	public function crear(){
		enmarcar($this,'usuario/crear');
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() { //AJAX
		$imagen = 'user.jpg';
		$nick = $_POST['nick'];
		$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
		$perfil = $_POST['perfil'];
		$estado = "Alta"; //se cambiará a Baja cuando se quiera eliminar el usuario
		$nombre = isset($_POST['nombre'])? $_POST['nombre'] : '';
		$apellido1 = isset($_POST['apellido1']) ? $_POST['apellido1'] : '' ;
		$apellido2 = isset($_POST['apellido2']) ? $_POST['apellido2'] : '' ;
		$telefono1 = isset($_POST['telefono1']) ? $_POST['telefono1'] : '';
		$telefono2 = isset($_POST['telefono2']) ? $_POST['telefono2'] : '';
		$mail1 = $_POST['mail1'];
		$mail2 = $_POST['mail2'];
		$comentario_contacto = isset($_POST['comentario_contacto']) ? $_POST['comentario_contacto'] : '';
		$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
		$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
		$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : '';
		$provincia = $_POST['provincia'];
		$pais = $_POST['pais'];
		$comentario_direccion = isset($_POST['comentario_direccion']) ? $_POST['comentario_direccion'] : '';
		$descuento = 0; //valor cero por defecto al darse el alta
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alta
		
		/*
		 * Creación de carpeta para guardar las fotos de los usuarios
		 *  en caso de que ésta no existiera ya.
		 */
		//if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/usuarios/'.$nick.'/')){
			//mkdir($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/usuarios/'.$nick.'/');
		//}
		//$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/usuarios/'.$nick.'/';
		//copy($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/usuarios/user.jpg',$directorio.$imagen);
		
		$this->load->model('usuario_model');
		$datos['body']['status'] = $this->usuario_model->crear($imagen,$nick,$pwd,$perfil,$estado,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion,$descuento,$fecha_alta,$fecha_baja,$motivo_baja);
		$datos['body']['nick'] = $nick;
		$this->load->view('usuario/XcrearPost',$datos);

	}
	
	
	public function listar() {
		$this->listarPost();
	}
	
	public function listarPost() {
		$filtroNick = isset($_POST['filtroNick']) ? $_POST['filtroNick'] : '';
		$filtroMail = isset($_POST['filtroMail']) ? $_POST['filtroMail'] : '';
		$filtroEstado = isset($_POST['filtroEstado']) ? $_POST['filtroEstado'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('usuario_model');
		$usuarios = $this->usuario_model->getFiltrados($filtroNick,$filtroMail,$filtroEstado);
		$datos['body']['filtroNick'] = $filtroNick;
		$datos['body']['filtroMail'] = $filtroMail;
		$datos['body']['filtroEstado'] = $filtroEstado;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		// PAGINACIÓN
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_usuarios = count($usuarios);
		$total_paginas = ceil($num_usuarios/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'&filtroNick='.$filtroNick.'&filtroMail='.$filtroMail.'&filtroEstado='.$filtroEstado.'">'.$i.'</a></li>';
			}
		
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas) || ($num_usuarios == 0)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['body']['usuarios'] = $this->usuario_model->getFiltradosConLimite($filtroNick,$filtroMail,$filtroEstado, $inicio);
	
		enmarcar($this, 'usuario/listar', $datos);
	}
	
	public function baja() {
		$this->listarPost();
	}
	
	public function bajaPost() {
		$idUsuarios = $_POST['idUsuarios'];
	
		$this->load->model('usuario_model');
		
		foreach ($idUsuarios as $idUsuario){
			$this->usuario_model->estadoBaja($idUsuario);
			$user = $this->usuario_model->getPorId($idUsuario);
			$antiguaImagen = $user->imagen;
			if($antiguaImagen != 'user.jpg'){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/usuarios/';
				$fichero = $directorio.$antiguaImagen;
				chmod($directorio, 0777);
				chmod($fichero, 0777);
					
				unlink($fichero);
			}
		}
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		enmarcar($this, 'usuario/borrarPost');
	}
	
	public function alta() {
		$this->listarPost();
	}
	
	public function altaPost() {
		$idUsuario = $_POST['idUsuario'];
	
		$this->load->model('usuario_model');
		$this->usuario_model->estadoAlta($idUsuario);
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		$this->listarPost();
	}
	
	public function modificar() {
		$this->listarPost();
	}
	
	public function modificarPost() {
		$idUsuario = $_POST['idUsuario'];
		$filtroNick = isset($_POST['filtroNick']) ? $_POST['filtroNick'] : '';
		$filtroMail = isset($_POST['filtroMail']) ? $_POST['filtroMail'] : '';
		$filtroEstado = isset($_POST['filtroEstado']) ? $_POST['filtroEstado'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('usuario_model');
		$datos['body']['usuario'] = $this->usuario_model->getPorId($idUsuario);
	
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNick'] = $filtroNick;
		$datos['body']['filtroMail'] = $filtroMail;
		$datos['body']['filtroEstado'] = $filtroEstado;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		enmarcar($this, 'usuario/modificar', $datos);
	}
	
	public function modificarPost2() {
		$idUsuario = $_POST['idUsuario'];
		$nick = $_POST['nick'];
		//$pwd = $_POST['pwd'];
		//$perfil = $_POST['perfil'];
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$mail1 = $_POST['mail1'];
		$mail2 = $_POST['mail2'];
		$comentario_contacto = $_POST['comentario_contacto'];
		$direccion = $_POST['direccion'];
		$cp = $_POST['cp'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$pais = $_POST['pais'];
		$comentario_direccion = $_POST['comentario_direccion'];
		$this->load->model('usuario_model');
		$user = $this->usuario_model->getPorId($idUsuario);
		$perfil = isset($_POST['perfil']) ? $_POST['perfil'] : $user->perfil;
		$antiguaImagen = $user->imagen;
		$pwd = $user->pwd;
		$nomImagen = !empty($_FILES['nueva']['name']) ? $nick.'-'.$_FILES['nueva']['name']:$user['imagen'];
		$tamanoImagen = !empty($_FILES['nueva']['size']) ? $_FILES['nueva']['size']: null;
		$tipoImagen = !empty($_FILES['nueva']['type']) ? $_FILES['nueva']['type']: null;
		
		
		//if($imagenValida){
		$this->usuario_model->modificar($idUsuario,$nomImagen,$nick,$pwd,$perfil,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion);
			
		if(!empty($_FILES['nueva']['name'])){
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/usuarios/';
			move_uploaded_file($_FILES['nueva']['tmp_name'],$directorio.$nomImagen);
			/*
			 * Aquí se borraría la antigua imagen.
			 */
			if($antiguaImagen != 'user.jpg'){
				$fichero = $directorio.$antiguaImagen;
				chmod($directorio, 0777);
				chmod($fichero, 0777);
				
				unlink($fichero);
			}
			
		}
			
		
		//}
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
		$usuario = $this->usuario_model->getPorId($idUsuario);
		$datos['body']['nick'] = $usuario->nick;
		
		if(isset($_POST['perfilAdmin'])){
			
			$_SESSION['imagen'] = $usuario->imagen;
			if($_SESSION['idUsuario'] == $idUsuario){
				$_SESSION['nick'] = $usuario->nick;
			}
			
			$this->perfilAdmin();
			
		}
		
		else{
			$this->load->view('usuario/XmodificarPost', $datos);
		}
			
	}
	
	public function login() {
		enmarcar($this, 'home');
	}
	
	public function loginPost() {
		$pwd = $_POST['pwd'];
		$user = $_POST['user'];
		
		$this->load->model('usuario_model');
		$usuarioValido = $this->usuario_model->comprobarCredenciales($user,$pwd);

		if ($usuarioValido != null) {
			$_SESSION['idUsuario'] = $usuarioValido->id;
			$_SESSION['nick'] = $usuarioValido->nick;
			$_SESSION['perfil'] = $usuarioValido->perfil;
			$_SESSION['imagen'] = $usuarioValido->imagen;
			$_SESSION['num_producto'] = 0;
			$_SESSION['carrito'] = 0;
			$_SESSION['precioTotalPedido']= 0;
			$_SESSION['total_productos']= 0;
			
			header('Location:'.base_url().'home');
		}
		else {
			header('Location:'.base_url().'home');
		}

	}
	
	public function logout() {
		session_destroy();
		header('Location:'.base_url().'home');
	}
	
	public function perfilAdmin(){
		$this->load->model('usuario_model');
		$datos['usuario'] =  $this->usuario_model->getPorId($_SESSION['idUsuario']);
		enmarcar($this, 'admin/perfil', $datos);
	}
	
	public function validarRegistro(){
		$nick = $_REQUEST['nick'];
		$mail = $_REQUEST['mail'];
		$pwd = $_REQUEST['pwd'];
		
		$this->load->model('usuario_model');
		$status = $this->usuario_model->validarRegistro($nick, $mail);
		
		//$this->load->view('usuario/registroPost', $datos);
		$this->registro($nick, $mail, $pwd, $status);
	}
	
	public function registro($nick, $mail, $pwd, $status){
		$datos['body']['status'] = $status;
		if($status){
		$imagen = 'user.jpg';
		//$nick = $_POST['nick'];
		//$mail = $_POST['mail'];
		//$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
		$password = password_hash($pwd, PASSWORD_DEFAULT);
		$descuento = 0; //valor cero por defecto al darse el alta
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alt
		$this->load->model('usuario_model');
		$this->usuario_model->registrar($imagen,$nick, $password, $mail, $descuento, $fecha_alta, $fecha_baja, $motivo_baja);
		
		//enmarcar2($this, 'usuario/registroPost2');
		$this->load->view('usuario/registroPost', $datos);
		}else{
			$this->load->view('usuario/registroPost', $datos);
		}
	}
	
	public function perfil(){
		$this->load->model('usuario_model');
		$datos['usuario'] =  $this->usuario_model->getPorId($_SESSION['idUsuario']);
		enmarcar2($this, 'usuario/perfil', $datos);
	}
	
	public function editarPerfil(){
		$this->load->model('usuario_model');
		$datos['usuario'] =  $this->usuario_model->getPorId($_SESSION['idUsuario']);
		enmarcar2($this, 'usuario/editarPerfil', $datos);
	}
	
	public function editarPerfil2(){
		$idUsuario = $_SESSION['idUsuario'];
		$pwdAntigua = $_POST['pwdAntigua'];
		$pwdNueva = $_POST['pwdNueva'];
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$mail1 = $_POST['mail1'];
		$mail2 = $_POST['mail2'];
		$comentario_contacto = $_POST['comentario_contacto'];
		$direccion = $_POST['direccion'];
		$cp = $_POST['cp'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$pais = $_POST['pais'];
		$comentario_direccion = $_POST['comentario_direccion'];
		$this->load->model('usuario_model');
		
		$user = $this->usuario_model->getPorId($_SESSION['idUsuario']);
		$pwd = $user->pwd;
		if($_POST['pwdAntigua'] != '' && $_POST['pwdNueva'] != ''){
			$statusPwd = $this->usuario_model->cambiarPassword($_SESSION['idUsuario'], $pwdAntigua, $pwdNueva);
			$datos['banner'] = '';
			if($statusPwd){
				$pwd = password_hash($pwdNueva, PASSWORD_DEFAULT);
				$datos['banner'] = '<div class="container alert alert-success col-xs-12">Datos modificados con éxito, incluida la contraseña</div>';
			}else{
				$datos['banner'] = '<div class="container alert alert-success col-xs-6">Datos modificados con éxito.</div>
						<div class="container alert alert-danger col-xs-6">La contraseña no ha podido ser modificada</div>';
			}
		}
		else{
			$datos['banner'] = '<div class="container alert alert-success col-xs-12">Datos modificados con éxito';
		}
			
		$perfil = isset($_POST['perfil']) ? $_POST['perfil'] : $user->perfil;
		$nick = $user->nick;
		$antiguaImagen = $user->imagen;
		
		$nomImagen = !empty($_FILES['files']['name']) ? $nick.'-'.$_FILES['files']['name']:$user['imagen'];
		$tamanoImagen = !empty($_FILES['files']['size']) ? $_FILES['files']['size']: null;
		$tipoImagen = !empty($_FILES['files']['type']) ? $_FILES['files']['type']: null;
		
		$this->load->model('imagen_model');
		
		$imagenValida = true;
		//if($tamanoImagen != null && $tipoImagen != null){
		$imagenValida = $this->imagen_model->validarImagen($nomImagen, $tamanoImagen, $tipoImagen);
		//}
		
		//if($imagenValida){
		$this->usuario_model->modificar($idUsuario,$nomImagen,$nick,$pwd,$perfil,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion);
			
		if(!empty($_FILES['files']['name'])){
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/usuarios/';
			move_uploaded_file($_FILES['files']['tmp_name'],$directorio.$nomImagen);
			/*
			 * Aquí se borraría la antigua imagen.
			 */
			if($antiguaImagen != 'user.jpg'){
				$fichero = $directorio.$antiguaImagen;
				chmod($directorio, 0777);
				chmod($fichero, 0777);
				
				unlink($fichero);
			}
		}
			
		
		//}
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
			
			$usuario = $this->usuario_model->getPorId($_SESSION['idUsuario']);
			$_SESSION['imagen'] = $usuario->imagen;
			$datos['usuario'] = $usuario;
			enmarcar2($this, 'usuario/perfil', $datos);

	}
	
	public function editarPerfilAdmin(){
		$idUsuario = $_SESSION['idUsuario'];
		$pwdAntigua = $_POST['pwdAntigua'];
		$pwdNueva = $_POST['pwdNueva'];
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$telefono1 = $_POST['telefono1'];
		$telefono2 = $_POST['telefono2'];
		$mail1 = $_POST['mail1'];
		$mail2 = $_POST['mail2'];
		$comentario_contacto = $_POST['comentario_contacto'];
		$direccion = $_POST['direccion'];
		$cp = $_POST['cp'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$pais = $_POST['pais'];
		$comentario_direccion = $_POST['comentario_direccion'];
		$this->load->model('usuario_model');
	
		$user = $this->usuario_model->getPorId($_SESSION['idUsuario']);
		$pwd = $user->pwd;
		
		/*
		 * Cambio de password siempre que se haya introducido la contraseña antigua
		 * y una nueva que sea válida.
		 */
		if($_POST['pwdAntigua'] != '' && $_POST['pwdNueva'] != ''){
			$statusPwd = $this->usuario_model->cambiarPassword($_SESSION['idUsuario'], $pwdAntigua);
			$datos['banner'] = '';
			if($statusPwd){
				$pwd = password_hash($pwdNueva, PASSWORD_DEFAULT);
				$datos['banner'] = '<div class="container alert alert-success col-xs-12">Datos modificados con éxito, incluida la contraseña</div>';
			}else{
				$datos['banner'] = '<div class="container alert alert-success col-xs-6">Datos modificados con éxito.</div>
						<div class="container alert alert-danger col-xs-6">La contraseña no ha podido ser modificada</div>';
			}
		}
		else{
			$datos['banner'] = '<div class="container alert alert-success col-xs-12">Datos modificados con éxito</div>';
		}
			
		$perfil = $user->perfil;
		$nick = $user->nick;
		$antiguaImagen = $user->imagen;
	
		$nomImagen = !empty($_FILES['nueva']['name']) ? $nick.'-'.$_FILES['nueva']['name']:$user['imagen'];
		$tamanoImagen = !empty($_FILES['nueva']['size']) ? $_FILES['nueva']['size']: null;
		$tipoImagen = !empty($_FILES['nueva']['type']) ? $_FILES['nueva']['type']: null;
	
		$this->usuario_model->modificar($idUsuario,$nomImagen,$nick,$pwd,$perfil,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion);
			
		if(!empty($_FILES['nueva']['name'])){
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/usuarios/';
			move_uploaded_file($_FILES['nueva']['tmp_name'],$directorio.$nomImagen);
			/*
			 * Aquí se borraría la antigua imagen.
			 */
			if($antiguaImagen != 'user.jpg'){
				$fichero = $directorio.$antiguaImagen;
				chmod($directorio, 0777);
				chmod($fichero, 0777);
	
				unlink($fichero);
			}
		}

		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
			
		$usuario = $this->usuario_model->getPorId($_SESSION['idUsuario']);
		$_SESSION['imagen'] = $usuario->imagen;
		$datos['usuario'] = $usuario;
		enmarcar($this, 'admin/perfil', $datos);
	
	}
	
	public function cesta(){
		if($_SESSION['total_productos'] > 0){
			$contador = 0;
			foreach($_SESSION['productos'] as $producto){
				$datos['productosCompra'][$contador] = $producto;
				$contador++; 
			}
			enmarcar2($this,'usuario/cesta', $datos);
		}else{
			enmarcar2($this,'usuario/cesta');
		}
	}
	
	public function pago(){
		
		if(isset($_SESSION['idUsuario'])){
			$this->load->model('usuario_model');
			$usuario = $this->usuario_model->getPorId($_SESSION['idUsuario']);
			$datos['usuario'] = $usuario;
			enmarcar2($this,'usuario/pago', $datos);
		}else{
			enmarcar2($this,'usuario/pago');
		}
		
	}
	
	
	public function misPedidos(){
		enmarcar2($this,'usuario/misPedidos');
	}
	
	public function misProductos($modal = FALSE){
		$mensaje = '';
		if($modal){
			$mensaje .= '<span class="alert-success">Enviado a cesta correctamente</span><br/>';
		}
		$datos ['body']['modal'] = $modal;
		$datos ['body']['mensajeModal'] = $mensaje;
		
		$this->load->model('producto_model');
		$datos['body']['productos'] = $this->producto_model->getPorUsuario($_SESSION['idUsuario']);
		
		enmarcar2($this,'usuario/misProductos',$datos);
	}
	
	public function borrarProducto(){
		$id_producto = $_POST['id_producto'];	
		$this->load->model('producto_model');
		
		$this->producto_model->borrar($id_producto,$_SESSION['perfil']);
		
		$this->misProductos();
	}
	
	public function crearDiseno(){
		$this->load->model('articulo_model');
		$datos['articulos'] = $this->articulo_model->listar();
		$this->load->model('talla_model');
		$datos['tallas'] = $this->talla_model->listar();
		$this->load->model('color_model');
		$datos['colores'] = $this->color_model->listar();
		enmarcar2($this, 'usuario/crearDiseno', $datos);
	}
	
	public function anadirCarrito(){
		$this->load->model('producto_model');
		$produc = $this->producto_model->getPorId($_POST['id_producto']);
		
		$this->load->model('articulo_model');
		$articulo = $this->articulo_model->getArticuloById($_POST['id_articulo']);
		$this->load->model('talla_model');
		$talla = $this->talla_model->getTallaById($_POST['id_talla']);
		$this->load->model('color_model');
		$color = $this->color_model->getColorById($_POST['id_color']);
		
		$producto = 'producto-'.$_SESSION['num_producto'];
		$_SESSION['productos'][$producto]['articulo']['id'] = $articulo->id;
		$_SESSION['productos'][$producto]['articulo']['nombre'] = $articulo->nombre;
		$_SESSION['productos'][$producto]['articulo']['precio'] = $produc->precio;
		$_SESSION['productos'][$producto]['talla'] = $talla->nombre;
		$_SESSION['productos'][$producto]['color'] = $color->nombre;
		$_SESSION['productos'][$producto]['cantidad'] = $_POST['cantidad'];
		$_SESSION['productos'][$producto]['precio'] = ($produc->precio *$_POST['cantidad']);
		$_SESSION['productos'][$producto]['id'] = $_SESSION['num_producto'];
		$_SESSION['productos'][$producto]['id_produc'] = $produc->id;
		$_SESSION['productos'][$producto]['imagen_produc'] = $produc->imagen_producto;
		
		$_SESSION['num_producto']++;
		$_SESSION['total_productos']++;
		$_SESSION['carrito']++;
		$_SESSION['precioTotalPedido'] += ($produc->precio *$_POST['cantidad']);
		
		$datos['carrito'] = $_SESSION['carrito'];
		//$this->load->view('usuario/XactualizaCarrito', $datos);	
		$modal = TRUE;
		$this->misProductos($modal);
	}
	
	public function quitarCarrito(){
		$_SESSION['precioTotalPedido'] -= $_SESSION['productos']['producto-'.$_POST['num_producto']]['precio'];
		unset($_SESSION['productos']['producto-'.$_POST['num_producto']]);
		$_SESSION['total_productos']--;
		$_SESSION['carrito']--;
		
		$this->cesta();
	}
	
	public function confirmacionPago(){
		$datos['comprador']['tarjeta'] = '************'.substr($_POST['tarjeta'], 12,4);
		$datos['comprador']['titular'] = $_POST['nombre'].' '.$_POST['apellidos'];
		$datos['comprador']['fechaExp'] = $_POST['mes'].'/'.$_POST['anio'];
		$datos['comprador']['direccion'] = $_POST['direccion'];
		$datos['comprador']['cp'] = $_POST['cp'];
		$datos['comprador']['localidad'] = $_POST['localidad'];
		$datos['comprador']['provincia'] = $_POST['provincia'];
		$datos['comprador']['pais'] = $_POST['pais'];
		$datos['comprador']['mail'] = $_POST['mail'];
		
			$contador = 0;
			foreach($_SESSION['productos'] as $producto){
				$datos['productosCompra'][$contador] = $producto;
				$contador++;
			}
		
		enmarcar2($this,'usuario/confirmacionPago', $datos);
	}
	
	public function pagoRealizado(){
		
		unset($_SESSION['productos']);
		
		$_SESSION['num_producto'] = 0;
		$_SESSION['total_productos'] = 0;
		$_SESSION['carrito'] = 0;
		$_SESSION['precioTotalPedido'] = 0;
		
		enmarcar2($this,'usuario/confirmacionPagoPost');
	}
	
	
}
?>