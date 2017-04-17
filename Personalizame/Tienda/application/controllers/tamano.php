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
	 * muestra la vista de creado OK
	 */
	public function crearOK(){
		enmarcar($this,'tamano/crearOK');
	}
	
	/*
	 * muestra la vista de Error al crear
	 */
	public function crearERROR(){
		enmarcar($this,'tamano/crearERROR');
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() {
		$nombre = $_POST['nombre']; //nombre del tamaño
	
		$this->load->model('tamano_model');
		$status = $this->tamano_model->crear($nombre);
	
		if ($status>=0) {
			header('Location:'.base_url().'tamano/crearOK');
		}
		else {
			header('Location:'.base_url().'tamano/crearERROR');
		}
	}
	
	
	public function listar() {
		enmarcar($this, 'tamano/filtrar');
	}
	
	public function listarPost() {
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
	
		$this->load->model('tamano_model');
		$datos['body']['tamanos'] = $this->tamano_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
	
		enmarcar($this, 'tamano/listar', $datos);
	}
	
	public function modificar() {
		enmarcar($this, 'tamano/filtrar');
	}
	
	public function modificarPost() {
		$idTamano = $_POST['idTamano'];
		$filtroNombre = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
	
		$this->load->model('tamano_model');
		$datos['body']['tamano'] = $this->tamano_model->getPorId($idTamano);
	
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNombre'] = $filtroNombre;

		enmarcar($this, 'tamano/modificar', $datos);
	}
	
	public function modificarPost2() {
		$idTamano = $_POST['idTamano'];
		$nombre = $_POST['nombre'];
	
		$this->load->model('tamano_model');
		$this->tamano_model->modificar($idTamano,$nombre);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado 
		$this->listarPost();
	}
	
	public function borrar() {
		enmarcar($this, 'tamano/filtrar');
	}
	
	public function borrarPost() {
		$idTamano = $_POST['idTamano'];
	
		$this->load->model('tamano_model');
		$this->tamano_model->borrar($idTamano);
		//llamo a listarPost para que mantenga el mismo filtro y se vea el borrado
		$this->listarPost();
	}
}
?>