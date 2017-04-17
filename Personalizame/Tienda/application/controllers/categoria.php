<?php

class Categoria extends CI_Controller{

	public function crear(){
		enmarcar($this, 'categoria/crear');
	}

	public function crearPost(){
		$nombre = $_POST['nombre'];

		$this->load->model('categoria_model');
		$status = null;
		$status = $this->categoria_model->crearCategoria($nombre);
		/*
		 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena)
		 * se informa del error al administrador.
		 */
		if($status){
			enmarcar($this,'categoria/crear');
		}else{
			enmarcar($this,'categoria/crearERROR');
		}
			
		//}
	}

	public function listar(){
		$this->load->model('categoria_model');
		$datos['categorias'] = $this->categoria_model->listar();
		enmarcar($this, 'categoria/listar', $datos);
	}

	public function borrar(){
		$this->load->model('categoria_model');
		$datos['categorias'] = $this->categoria_model->listar();
		enmarcar($this, 'categoria/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('categoria_model');
		$idCategorias = $_POST['idCategorias'];
		foreach ($idCategorias as $idCategoria){
			$this->categoria_model->borrar($idCategoria);
		}

		$datos['categorias'] = $this->categoria_model->listar();
		enmarcar($this, 'categoria/borrar', $datos);
	}

	public function editar(){
		$idCategoria = $_GET['idCategoria'];
		$this->load->model('categoria_model');
		$datos['categoria'] = $this->categoria_model->getCategoriaById($idCategoria);
		enmarcar($this, 'categoria/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$this->load->model('categoria_model');
		$this->categoria_model->editar($id, $nombre);
			
		$datos['categorias'] = $this->categoria_model->listar();
		enmarcar($this, 'categoria/listar', $datos);
	}
}

?>