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
		$datos_texto = $_POST['datos_texto'];
		$tamano_fuente = $_POST['tamano_fuente'];
		$id_fuente = $_POST['id_fuente'];
		$rotacion = $_POST['rotacion'];
		$id_color = $_POST['id_color'];
		$coordenada_x = $_POST['coordenada_x'];
		$coordenada_y = $_POST['coordenada_y'];
		$texto_alto = $_POST['texto_alto'];
		$texto_ancho = $_POST['texto_ancho'];
		$precio = 1; //importe que se cobra por incluir un texto al estampado
		$coste = 0.50; //coste en el negocio por poner estampado un texto
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alta
		$disponible = "Si"; // los textos al crearse estarán disponibles, pasa a NO al darlos de baja
		$idSesion = $_POST['idSesion']; // para tener un id único en caso de que el usuario no se loguee y sea Invitado
		
		$this->load->model('texto_model');
		$this->texto_model->crear($idUsuario,$datos_texto,$tamano_fuente,$id_fuente,$rotacion,$texto_alto,$texto_ancho,$id_color,$coordenada_x,$coordenada_y,$precio,$coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$idSesion);
		$datos['body']['datosTexto'] = $datos_texto;
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
		
		foreach ($idTextos as $id_texto){
			$this->texto_model->borrar($id_texto);
		}
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		enmarcar($this, 'texto/borrarPost');
	}
	
	public function modificar() {
		$this->listarPost();
	}
	
	public function modificarPost() {
		$id_texto = $_POST['id_texto'];
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
		$id_texto = $_POST['id_texto'];
		$datos_texto = $_POST['datos_texto'];
		$tamano_fuente = $_POST['tamano_fuente'];
		$id_fuente = $_POST['id_fuente'];
		$rotacion = $_POST['rotacion'];
		$id_color = $_POST['id_color'];
		$texto_alto = $_POST['texto_alto'];
		$texto_ancho = $_POST['texto_ancho'];
		$coordenada_x = $_POST['coordenada_x'];
		$coordenada_y = $_POST['coordenada_y'];
		$disponible = $_POST['disponible'];
	
		$this->load->model('texto_model');
		$this->texto_model->modificar($id_texto,$datos_texto,$tamano_fuente,$id_fuente,$rotacion,$texto_alto,$texto_ancho,$id_color,$coordenada_x,$coordenada_y,$disponible);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
		enmarcar($this, 'texto/borrarPost');
	}
}
?>