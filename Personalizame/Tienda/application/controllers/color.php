<?php

class Color extends CI_Controller{

	public function crear(){
		$datos['ruta'] = $_SERVER['DOCUMENT_ROOT'];
		enmarcar($this, 'color/crear', $datos);
	}

	public function crearPost(){
		$datos['body']['nombre'] = $_POST['nombre'];
		$valor = $_POST['valor'];
		
		$this->load->model('color_model');
		$datos['body']['status'] = $this->color_model->crearColor($_POST['nombre'], $valor);
		/*
		 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena)
		 * se informa del error al administrador.
		 */
		$this->load->view('color/XcrearPost',$datos);
	}

	public function listar(){
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('color_model');
		$colores = $this->color_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_colores = count($colores);
		$total_paginas = ceil($num_colores/$tamanio_pagina);
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
		$datos['next'] = ($pagina == $total_paginas) || ($num_colores == 0)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['colores'] = $this->color_model->getfiltradosConLimite($filtroNombre,$inicio);
		enmarcar($this, 'color/listar', $datos);
	}

	public function borrar(){
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('color_model');
		$colores = $this->color_model->getFiltrados($filtroNombre);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;

		$num_colores = count($colores);
		$total_paginas = ceil($num_colores/$tamanio_pagina);
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
		$datos['next'] = ($pagina == $total_paginas) || ($num_colores == 0)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['colores'] = $this->color_model->getfiltradosConLimite($filtroNombre,$inicio);
		enmarcar($this, 'color/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('color_model');
		$idColores = $_POST['idColores'];
		foreach ($idColores as $idColor){
			$this->color_model->borrar($idColor);				
		}
		
		if(isset($_POST['vuelveBorrar'])){
			$datos['vuelveBorrar'] = 'borrar';
			enmarcar($this, 'color/borrarPost', $datos);
		}else{
			enmarcar($this, 'color/borrarPost');
		}
	}

	public function editar(){
		$datos['body']['filtroNombre'] = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$datos['body']['mensajeBanner'] = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		$idColor = $_REQUEST['idColor'];
		$this->load->model('color_model');
		$datos['color'] = $this->color_model->getColorById($idColor);
		enmarcar($this, 'color/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$datos['body']['nombre'] = $_POST['nombre'];
		$valor = $_POST['valor'];
		$this->load->model('color_model');
		$datos['body']['status'] = $this->color_model->editar($id,$_POST['nombre'], $valor);
			
		$this->load->view('color/XmodificarPost',$datos);
	}
}

?>