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
		$this->listarPost();
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
		
		// PAGINACIÓN
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_textos = count($datos['body']['textos']);
		$total_paginas = ceil($num_textos/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'&filtroDatosTexto='.$filtroDatosTexto.'&filtroUsuario='.$filtroUsuario.'">'.$i.'</a></li>';
			}
		
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['textos'] = $this->texto_model->getFiltradosConLimite($filtroUsuario,$filtroDatosTexto, $inicio);
	
		enmarcar($this, 'texto/listar', $datos);
	}
	
	public function borrar() {
		$this->listarPost();
	}
	
	public function borrarPost() {
		$idTextos = $_POST['idTextos'];
	
		$this->load->model('texto_model');
		
		foreach ($idTextos as $idTexto){
			$this->texto_model->borrar($idTexto);
		}
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		enmarcar($this, 'texto/borrarPost');
	}
	
	public function modificar() {
		$this->listarPost();
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
		enmarcar($this, 'texto/borrarPost');
	}
}
?>