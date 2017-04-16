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
	 * muestra la vista de creado OK
	 */
	public function crearOK(){
		enmarcar($this,'fuente/crearOK');
	}
	
	/*
	 * muestra la vista de Error al crear
	 */
	public function crearERROR(){
		enmarcar($this,'fuente/crearERROR');
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() {
		$nombre = $_POST['nombre']; //nombre de la fuente
	
		$this->load->model('fuente_model');
		$status = $this->fuente_model->crear($nombre);
	
		if ($status>=0) {
			header('Location:'.base_url().'fuente/crearOK');
		}
		else {
			header('Location:'.base_url().'fuente/crearERROR');
		}
	}
	
	
	public function listar() {
		enmarcar($this, 'fuente/filtrar');
	}
	
	public function listarPost() {
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
	
		$this->load->model('fuente_model');
		$datos['body']['fuentes'] = $this->fuente_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
	
		enmarcar($this, 'fuente/listar', $datos);
	}
	
	public function modificar() {
		enmarcar($this, 'fuente/filtrar');
	}
	
	public function modificarPost() {
		$idFuente = $_POST['idFuente'];
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
	
		$this->load->model('fuente_model');
		$datos['body']['fuente'] = $this->fuente_model->getPorId($idFuente);
	
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNombre'] = $filtroNombre;

		enmarcar($this, 'fuente/modificar', $datos);
	}
	
	public function modificarPost2() {
		$idFuente = $_POST['idFuente'];
		$nombre = $_POST['nombre'];
	
		$this->load->model('fuente_model');
		$this->fuente_model->modificar($idFuente,$nombre);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado 
		$this->listarPost();
	}
	
	public function borrar() {
		enmarcar($this, 'usuario/filtrar');
	}
	
	public function borrarPost() {
		$idFuente = $_POST['idFuente'];
	
		$this->load->model('fuente_model');
		$this->fuente_model->borrar($idFuente);
		//llamo a listarPost para que mantenga el mismo filtro y se vea el borrado
		$this->listarPost();
	}
}
?>