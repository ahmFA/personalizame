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
			$this->listar();
		}else{
			enmarcar($this,'categoria/crearERROR');
		}
			
		//}
	}

	public function listar(){
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('categoria_model');
		$categorias = $this->categoria_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_categorias = count($categorias);
		$total_paginas = ceil($num_categorias/$tamanio_pagina);
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
		
		$datos['categorias'] = $this->categoria_model->getFiltradosConLimite($filtroNombre, $inicio);
		enmarcar($this, 'categoria/listar', $datos);
	}

	public function borrar(){
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$this->load->model('categoria_model');
		$categorias = $this->categoria_model->listar();
		$num_categorias = count($categorias);
		$total_paginas = ceil($num_categorias/$tamanio_pagina);
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
		
		$datos['categorias'] = $this->categoria_model->listarConLimite($inicio, $tamanio_pagina);
		enmarcar($this, 'categoria/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('categoria_model');
		$idCategorias = $_POST['idCategorias'];
		foreach ($idCategorias as $idCategoria){
			$this->categoria_model->borrar($idCategoria);
		}

		enmarcar($this, 'categoria/borrarPost');
	}

	public function editar(){
		$datos['body']['filtroNombre'] = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$datos['body']['mensajeBanner'] = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		$idCategoria = $_REQUEST['idCategoria'];
		$this->load->model('categoria_model');
		$datos['categoria'] = $this->categoria_model->getCategoriaById($idCategoria);
		enmarcar($this, 'categoria/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$this->load->model('categoria_model');
		$this->categoria_model->editar($id, $nombre);
			
		enmarcar($this, 'categoria/borrarPost');
	}
}

?>