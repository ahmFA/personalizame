<?php
session_start();
/* class Texto
 * @author Luis
 * @packcage application\controllers
 */
class Texto extends CI_Controller{
	/*
	 * muestra el formulario de crear texto
	 */
	public function crear(){
		$this->load->model('fuente_model');
		$this->load->model('tamano_model');
		$this->load->model('color_model');
		$datos ['body'] ['colores'] = $this->color_model->getTodos();
		$datos ['body'] ['fuentes'] = $this->fuente_model->getTodos();
		$datos ['body'] ['tamanos'] = $this->tamano_model->getTodos();
		enmarcar($this,'texto/crear',$datos);
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() { //AJAX
		$idUsuario = $_POST['idUsuario'];
		$datosTexto = $_POST['datosTexto'];
		$idTamano = $_POST['idTamano'];
		$idFuente = $_POST['idFuente'];
		$rotacion = $_POST['rotacion'];
		$idColor = $_POST['idColor'];
		$coordenadaX = $_POST['coordenadaX'];
		$coordenadaY = $_POST['coordenadaY'];
		$precio = 1; //importe que se cobra por incluir un texto al estampado
		$coste = 0.50; //coste en el negocio por poner estampado un texto
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alta
		$disponible = "Si"; // los textos al crearse estarán disponibles, pasa a NO al darlos de baja
		$idSesion = $_POST['idSesion']; // para tener un id único en caso de que el usuario no se loguee y sea Invitado
		
		$this->load->model('texto_model');
		$this->texto_model->crear($idUsuario,$datosTexto,$idTamano,$idFuente,$rotacion,$idColor,$coordenadaX,$coordenadaY,$precio,$coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$idSesion);
		$datos['body']['datosTexto'] = $datosTexto;
		$this->load->view('texto/XcrearPost',$datos);

	}
		
	public function listar() {
		enmarcar($this, 'texto/filtrar');
	}
	
	public function listarPost() {
		$filtroDatosTexto = isset($_POST['filtroDatosTexto']) ? $_POST['filtroDatosTexto'] : '';
		$filtroUsuario = isset($_POST['filtroUsuario']) ? $_POST['filtroUsuario'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('texto_model');
		$datos['body']['textos'] = $this->texto_model->getFiltrados($filtroUsuario,$filtroDatosTexto);
		$datos['body']['filtroDatosTexto'] = $filtroDatosTexto;
		$datos['body']['filtroUsuario'] = $filtroUsuario;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
	
		enmarcar($this, 'texto/listar', $datos);
	}
	
	public function borrar() {
		enmarcar($this, 'texto/filtrar');
	}
	
	public function borrarPost() {
		$idTexto = $_POST['idTexto'];
	
		$this->load->model('texto_model');
		$this->texto_model->borrar($idTexto);
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		$this->listarPost();
	}
	
	public function modificar() {
		enmarcar($this, 'texto/filtrar');
	}
	
	public function modificarPost() {
		$idTexto = $_POST['idTexto'];
		$filtroDatosTexto = isset($_POST['filtroDatosTexto']) ? $_POST['filtroDatosTexto'] : '';
		$filtroUsuario = isset($_POST['filtroUsuario']) ? $_POST['filtroUsuario'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('texto_model');
		$datos['body']['texto'] = $this->texto_model->getPorId($idTexto);
	
		$this->load->model('fuente_model');
		$this->load->model('tamano_model');
		$this->load->model('color_model');
		$datos ['body'] ['colores'] = $this->color_model->getTodos();
		$datos ['body'] ['fuentes'] = $this->fuente_model->getTodos();
		$datos ['body'] ['tamanos'] = $this->tamano_model->getTodos();
		
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroDatosTexto'] = $filtroDatosTexto;
		$datos['body']['filtroUsuario'] = $filtroUsuario;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		enmarcar($this, 'texto/modificar', $datos);
	}
	
	public function modificarPost2() {
		$idTexto = $_POST['idTexto'];
		$datosTexto = $_POST['datosTexto'];
		$idTamano = $_POST['idTamano'];
		$idFuente = $_POST['idFuente'];
		$rotacion = $_POST['rotacion'];
		$idColor = $_POST['idColor'];
		$coordenadaX = $_POST['coordenadaX'];
		$coordenadaY = $_POST['coordenadaY'];
		$disponible = $_POST['disponible'];
	
		$this->load->model('texto_model');
		$this->texto_model->modificar($idTexto,$datosTexto,$idTamano,$idFuente,$rotacion,$idColor,$coordenadaX,$coordenadaY,$disponible);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
		$this->listarPost();
	}
}
?>