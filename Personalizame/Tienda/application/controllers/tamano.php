<?php
session_start();
/* class Tamano
 * @author Luis
 * @packcage application\controllers
 */
class Tamano extends CI_Controller{
	/*
	 * muestra el formulario de crear tamaño
	 */
	public function crear(){
		enmarcar($this,'tamano/crear');
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() { //AJAX
		$nombre = $_POST['nombre']; //nombre del tamaño
	
		$this->load->model('tamano_model');
		$datos['body']['status'] = $this->tamano_model->crear($nombre);
		$datos['body']['nombre'] = $nombre;
		$this->load->view('tamano/XcrearPost',$datos);
	}
	
	
	public function listar() {
		$this->listarPost();
	}
	
	public function listarPost() {
		
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('tamano_model');
		$datos['body']['tamanos'] = $this->tamano_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		// PAGINACIÓN
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_tamanos = count($datos['body']['tamanos']);
		$total_paginas = ceil($num_tamanos/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'&filtroNombre='.$filtroNombre.'">'.$i.'</a></li>';
			}
		
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['tamanos'] = $this->tamano_model->getFiltradosConLimite($filtroNombre, $inicio);
		
		enmarcar($this, 'tamano/listar', $datos);
	}
	
	public function modificar() {
		enmarcar($this, 'tamano/borrarPost');
	}
	
	public function modificarPost() {
		$idTamano = $_POST['idTamano'];
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('tamano_model');
		$datos['body']['tamano'] = $this->tamano_model->getPorId($idTamano);
	
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		enmarcar($this, 'tamano/modificar', $datos);
	}
	
	public function modificarPost2() {
		$idTamano = $_POST['idTamano'];
		$nombre = $_POST['nombre'];
	
		$this->load->model('tamano_model');
		$this->tamano_model->modificar($idTamano,$nombre);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado 
		enmarcar($this, 'tamano/borrarPost');
	}
	
	public function borrar() {
		$this->listarPost();
	}
	
	public function borrarPost() {
		$idTamanos = $_POST['idTamanos'];
		$this->load->model('tamano_model');
		
		foreach ($idTamanos as $idTamano){
			$this->tamano_model->borrar($idTamano);
		}
	
		//llamo a listarPost para que mantenga el mismo filtro y se vea el borrado
		enmarcar($this, 'tamano/borrarPost');
	}
}
?>