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
		$nick = $_POST['nick'];
		$pwd = $_POST['pwd'];
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
		
		$this->load->model('usuario_model');
		$datos['body']['status'] = $this->usuario_model->crear($nick,$pwd,$perfil,$estado,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion,$descuento,$fecha_alta,$fecha_baja,$motivo_baja);
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
		$datos['body']['usuarios'] = $this->usuario_model->getFiltrados($filtroNick,$filtroMail,$filtroEstado);
		$datos['body']['filtroNick'] = $filtroNick;
		$datos['body']['filtroMail'] = $filtroMail;
		$datos['body']['filtroEstado'] = $filtroEstado;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		// PAGINACIÓN
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_usuarios = count($datos['body']['usuarios']);
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
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['usuarios'] = $this->usuario_model->getFiltradosConLimite($filtroNick,$filtroMail,$filtroEstado, $inicio);
	
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
		$pwd = $_POST['pwd'];
		$perfil = $_POST['perfil'];
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
		$this->usuario_model->modificar($idUsuario,$nick,$pwd,$perfil,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
		enmarcar($this, 'usuario/borrarPost');
	}
	
	public function login() {
		enmarcar($this, 'usuario/login');
	}
	
	public function loginPost() {
		$pwd = $_POST['pwd'];
		$mail = $_POST['mail'];
		
		$this->load->model('usuario_model');
		$usuarioValido = $this->usuario_model->comprobarCredenciales($mail,$pwd);

		if ($usuarioValido) {
			$_SESSION['idUsuario'] = $usuarioValido->id;
			$_SESSION['nick'] = $usuarioValido->nick;
			$_SESSION['perfil'] = $usuarioValido->perfil;
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
}
?>