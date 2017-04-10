<?php

class Color extends CI_Controller{

	public function crear(){
		$datos['ruta'] = $_SERVER['DOCUMENT_ROOT'];
		enmarcar($this, 'color/crear', $datos);
	}

	public function crearPost(){
		$nombre = $_POST['nombre'];
		$valor = $_POST['valor'];
		$disponible = $_POST['disponible'];
		
		$this->load->model('color_model');
		$status = null;
		$status = $this->color_model->crearColor($nombre, $valor, $disponible);
		/*
		 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena)
		 * se informa del error al administrador.
		 */
		if($status){
			enmarcar($this,'color/crear');
		}else{
			enmarcar($this,'color/crearERROR');
		}
			
		//}
	}

	public function listar(){
		$this->load->model('color_model');
		$datos['colores'] = $this->color_model->listar();
		enmarcar($this, 'color/listar', $datos);
	}

	public function borrar(){
		$this->load->model('color_model');
		$datos['colores'] = $this->color_model->listar();
		enmarcar($this, 'color/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('color_model');
		$idColores = $_POST['idColores'];
		foreach ($idColores as $idColor){
			$this->color_model->borrar($idColor);
			$color = $this->color_model->getColorById($idColor);				
		}
		
		$datos['colores'] = $this->color_model->listar();
		enmarcar($this, 'color/borrar', $datos);
	}

	public function editar(){
		$idColor = $_GET['idColor'];
		$this->load->model('color_model');
		$datos['color'] = $this->color_model->getColorById($idColor);
		enmarcar($this, 'color/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$valor = $_POST['valor'];
		$disponible = $_POST['disponible'];
		$this->load->model('color_model');
		$this->color_model->editar($id, $nombre, $valor, $disponible);
			
		$datos['colores'] = $this->color_model->listar();
		enmarcar($this, 'color/listar', $datos);
	}
}

?>