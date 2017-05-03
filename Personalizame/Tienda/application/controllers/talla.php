<?php

class Talla extends CI_Controller{

	public function crear(){
		enmarcar($this, 'talla/crear');
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
			$this->listar();
		}else{
			$datos['onload']['alert'] = 'mostrarAlert()';
			enmarcar($this,'talla/crear', $datos);
		}
			
		//}
	}

	public function listar(){
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$this->load->model('talla_model');
		$tallas = $this->talla_model->listar();
		$num_tallas = count($tallas);
		$total_paginas = ceil($num_tallas/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'">'.$i.'</a></li>';
			}
			
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['tallas'] = $this->talla_model->listarConLimite($inicio, $tamanio_pagina);
		enmarcar($this, 'talla/listar', $datos);
		
		
		/*$this->load->model('talla_model');
		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'talla/listar', $datos);*/
	}

	public function borrar(){
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$this->load->model('talla_model');
		$tallas = $this->talla_model->listar();
		$num_tallas = count($tallas);
		$total_paginas = ceil($num_tallas/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'">'.$i.'</a></li>';
			}
				
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['tallas'] = $this->talla_model->listarConLimite($inicio, $tamanio_pagina);
		enmarcar($this, 'talla/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('talla_model');
		$idTallas = $_POST['idTallas'];
		foreach ($idTallas as $idTalla){
			$this->talla_model->borrar($idTalla);
		}

		$this->listar();
	}

	public function editar(){
		$idTalla = $_REQUEST['idTalla'];
		$this->load->model('talla_model');
		$datos['talla'] = $this->talla_model->getTallaById($idTalla);
		enmarcar($this, 'talla/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$this->load->model('talla_model');
		$this->talla_model->editar($id, $nombre);
			
		$this->listar();
	}
}

?>