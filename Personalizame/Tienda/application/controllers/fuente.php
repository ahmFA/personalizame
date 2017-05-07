<?php
session_start();
/* class Fuente
 * @author Luis
 * @packcage application\controllers
 */
class Fuente extends CI_Controller{
	/*
	 * muestra el formulario de crear tipo de fuente
	 */
	public function crear(){
		enmarcar($this,'fuente/crear');
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() { //AJAX
		$nombre = $_POST['nombre']; //nombre de la fuente
	
		$this->load->model('fuente_model');
		$datos['body']['status'] = $this->fuente_model->crear($nombre);
		$datos['body']['nombre'] = $nombre;
		$this->load->view('fuente/XcrearPost',$datos);
	}
	
	
	public function listar() {
		$this->listarPost();
	}
	
	public function listarPost() {
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('fuente_model');
		$datos['body']['fuentes'] = $this->fuente_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		// PAGINACIÓN
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_fuentes = count($datos['body']['fuentes']);
		$total_paginas = ceil($num_fuentes/$tamanio_pagina);
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
		
		$datos['fuentes'] = $this->fuente_model->getFiltradosConLimite($filtroNombre, $inicio);
		
		enmarcar($this, 'fuente/listar', $datos);
	}
	
	public function modificar() {
		$this->listarPost();
	}
	
	public function modificarPost() {
		$idFuente = $_POST['idFuente'];
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('fuente_model');
		$datos['body']['fuente'] = $this->fuente_model->getPorId($idFuente);
	
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		enmarcar($this, 'fuente/modificar', $datos);
	}
	
	public function modificarPost2() {
		$idFuente = $_POST['idFuente'];
		$nombre = $_POST['nombre'];
	
		$this->load->model('fuente_model');
		$this->fuente_model->modificar($idFuente,$nombre);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado 
		enmarcar($this, 'fuente/borrarPost');
	}
	
	public function borrar() {
		$this->listarPost();
	}
	
	public function borrarPost() {
		$idFuentes = $_POST['idFuentes'];
	
		$this->load->model('fuente_model');
		foreach ($idFuentes as $idFuente){
			$this->fuente_model->borrar($idFuente);
		}
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea el borrado
		enmarcar($this, 'fuente/borrarPost');
	}
}
?>