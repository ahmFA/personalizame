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
	public function crearPost() {
		$nick = $_POST['nick'];
		$pwd = $_POST['pwd'];
		$perfil = $_POST['perfil'];
		$estado = "Alta"; //se cambiará a Baja cuando se quiera eliminar el usuario
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
		enmarcar($this, 'usuario/filtrar');
	}
	
	public function listarPost() {
		$filtroNick = isset($_POST['filtroNick']) ? $_POST['filtroNick'] : '';
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$filtroMail = isset($_POST['filtroMail']) ? $_POST['filtroMail'] : '';
		$filtroEstado = isset($_POST['filtroEstado']) ? $_POST['filtroEstado'] : '';
		
		$this->load->model('usuario_model');
		$datos['body']['usuarios'] = $this->usuario_model->getFiltrados($filtroNick,$filtroNombre,$filtroMail,$filtroEstado);
		$datos['body']['filtroNick'] = $filtroNick;
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['filtroMail'] = $filtroMail;
		$datos['body']['filtroEstado'] = $filtroEstado;
	
		enmarcar($this, 'usuario/listar', $datos);
	}
	
	public function baja() {
		enmarcar($this, 'usuario/filtrar');
	}
	
	public function bajaPost() {
		$idUsuario = $_POST['idUsuario'];
	
		$this->load->model('usuario_model');
		$this->usuario_model->estadoBaja($idUsuario);
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		$this->listarPost();
	}
	
	public function alta() {
		enmarcar($this, 'usuario/filtrar');
	}
	
	public function altaPost() {
		$idUsuario = $_POST['idUsuario'];
	
		$this->load->model('usuario_model');
		$this->usuario_model->estadoAlta($idUsuario);
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		$this->listarPost();
	}
	
	public function modificar() {
		enmarcar($this, 'usuario/filtrar');
	}
	
	public function modificarPost() {
		$idUsuario = $_POST['idUsuario'];
		$filtroNick = isset($_POST['filtroNick']) ? $_POST['filtroNick'] : '';
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$filtroMail = isset($_POST['filtroMail']) ? $_POST['filtroMail'] : '';
		$filtroEstado = isset($_POST['filtroEstado']) ? $_POST['filtroEstado'] : '';
		
		$this->load->model('usuario_model');
		$datos['body']['usuario'] = $this->usuario_model->getPorId($idUsuario);
	
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNick'] = $filtroNick;
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['filtroMail'] = $filtroMail;
		$datos['body']['filtroEstado'] = $filtroEstado;
		
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
		$this->listarPost();
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