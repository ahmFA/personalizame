<?php

class Talla extends CI_Controller{

	public function crear(){
		$datos['ruta'] = $_SERVER['DOCUMENT_ROOT'];
		enmarcar($this, 'talla/crear', $datos);
	}

	public function crearPost(){
		$nombre = $_POST['nombre'];

		$this->load->model('talla_model');
		$status = null;
		$status = $this->talla_model->crearTalla($nombre);
		/*
		 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena)
		 * se informa del error al administrador.
		 */
		if($status){
			enmarcar($this,'talla/crear');
		}else{
			enmarcar($this,'talla/crearERROR');
		}
			
		//}
	}

	public function listar(){
		$this->load->model('talla_model');
		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'talla/listar', $datos);
	}

	public function borrar(){
		$this->load->model('talla_model');
		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'talla/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('talla_model');
		$idTallas = $_POST['idTallas'];
		foreach ($idTallas as $idTalla){
			$this->talla_model->borrar($idTalla);
		}

		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'talla/borrar', $datos);
	}

	public function editar(){
		$idTalla = $_GET['idTalla'];
		$this->load->model('talla_model');
		$datos['talla'] = $this->talla_model->getTallaById($idTalla);
		enmarcar($this, 'talla/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$this->load->model('talla_model');
		$this->talla_model->editar($id, $nombre);
			
		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'talla/listar', $datos);
	}
}

?>