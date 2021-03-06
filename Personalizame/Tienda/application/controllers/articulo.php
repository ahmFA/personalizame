<?php

class Articulo extends CI_Controller{
	
	public function crear(){
		$this->load->model('color_model');
		$this->load->model('talla_model');
		$datos['colores'] = $this->color_model->listar();
		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'articulo/crear', $datos);
	}

	public function crearPost(){
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$coste = $_POST['coste'];
		$descuento = $_POST['descuento'];
		$disponible = $_POST['disponible'];
		$fecha_alta = strftime("%Y/%m/%d");
		$nomImagen = 'art_'.$_FILES['imagen']['name'];
		$tamanoImagen = $_FILES['imagen']['size'];
		$tipoImagen = $_FILES['imagen']['type'];
		
		$id_colores = isset($_POST['idColores']) ? explode(',',$_POST['idColores']) : '';
		$id_tallas = isset($_POST['idTallas']) ? explode(',',$_POST['idTallas']) : '';
		$this->load->model('articulo_model');
		/*
		 * Se comprueba que la imagen tenga el tama�o adecuado.
		 * En ese caso, se guarda en la carpeta alojada en nuestro servidor.
		 */
		$datos['body']['status'] = false;
		
			
			// Si no existe la carpeta de art�culos, se crea.
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/articulos/')){
			mkdir($_SERVER['DOCUMENT_ROOT'].'/img/articulos/'); // DOCUMENT_ROOT = c:/XAMPP/HTDOCS en mi caso.
		}
			
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/';
		move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nomImagen);
		$datos['body']['status'] = $this->articulo_model->crearArticulo($nombre, $nomImagen,$precio, $coste, $descuento, $disponible,$fecha_alta, $id_colores, $id_tallas);
			/*
			 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena) 
			 * se informa del error al administrador.
			 */
		
		$datos['body']['nombre'] = $nombre;
		//$this->load->model('color_model');
		//$this->load->model('talla_model');
		//$datos['colores'] = $this->color_model->listar();
		//$datos['tallas'] = $this->talla_model->listar();
		$this->load->view('articulo/XcrearPost', $datos);
	}
	
	public function listar(){
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$filtroImagen = isset($_REQUEST['filtroImagen']) ? $_REQUEST['filtroImagen'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('articulo_model');
		$articulos = $this->articulo_model->getFiltrados($filtroNombre, $filtroImagen);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['filtroImagen'] = $filtroImagen;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_articulos = count($articulos);
		$total_paginas = ceil($num_articulos/$tamanio_pagina);
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
		$datos['next'] = ($pagina == $total_paginas) || ($num_articulos == 0)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['articulos'] = $this->articulo_model->getFiltradosConLimite($filtroNombre, $filtroImagen,$inicio);
		enmarcar($this, 'articulo/listar', $datos);
	}
	
	public function borrar(){
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$filtroImagen = isset($_REQUEST['filtroImagen']) ? $_REQUEST['filtroImagen'] : '';
		
		$this->load->model('articulo_model');
		$articulos = $this->articulo_model->getFiltrados($filtroNombre, $filtroImagen);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['filtroImagen'] = $filtroImagen;
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_articulos = count($articulos);
		$total_paginas = ceil($num_articulos/$tamanio_pagina);
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
		$datos['next'] = ($pagina == $total_paginas) || ($num_articulos == 0)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['articulos'] = $this->articulo_model->getFiltradosConLimite($filtroNombre, $filtroImagen,$inicio);
		enmarcar($this, 'articulo/borrar', $datos);
	}
	
	public function borrarPost(){
		$this->load->model('articulo_model');
		$idArticulos = $_POST['idArticulos'];
		foreach ($idArticulos as $idArt){
			$articulo = $this->articulo_model->getArticuloById($idArt);
			$fichero = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/'.$articulo['nombre_imagen'];
			/*
			 * No me da permisos para borrar la carpeta.
			 * Lo he intentado de diversas formas pero no nada.
			 * Tengo que preguntar a Alberto.
			 */
			if(file_exists($fichero)){
				chmod($_SERVER['DOCUMENT_ROOT'].'/img/articulos/', 0777);
				chmod($fichero, 0777);
				unlink($fichero);
			}
			$this->articulo_model->borrar($idArt);
		}
		if(isset($_POST['vuelveBorrar'])){
			$datos['vuelveBorrar'] = 'borrar';
			enmarcar($this, 'articulo/borrarPost', $datos);
		}else{
			enmarcar($this, 'articulo/borrarPost');
		}
	}
	
	public function editar(){
		$datos['body']['filtroNombre'] = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$datos['body']['filtroImagen'] = isset($_POST['filtroImagen']) ? $_POST['filtroImagen'] : '';
		$datos['body']['mensajeBanner'] = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		$idArticulo = $_REQUEST['idArticulo'];
		$this->load->model('articulo_model');
		$this->load->model('color_model');
		$this->load->model('talla_model');
		$datos['articulo'] = $this->articulo_model->getArticuloById($idArticulo);
		$datos['colores'] = $this->color_model->listar();
		$datos['tallas'] = $this->talla_model->listar();
		enmarcar($this, 'articulo/editar', $datos);
	}
	
	public function editarPost(){
		$id= $_POST['id'];
		$this->load->model('articulo_model');
		$art = $this->articulo_model->getArticuloById($id);
		$antiguaImagen = $art->nombre_imagen;
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$coste = $_POST['coste'];
		$descuento = $_POST['descuento'];
		$nomImagen = !empty($_FILES['nueva']['name']) ? 'art_'.$_FILES['nueva']['name']:$art['nombre_imagen'];
		$tamanoImagen = !empty($_FILES['nueva']['size']) ? $_FILES['nueva']['size']: null;
		$tipoImagen = !empty($_FILES['nueva']['type']) ? $_FILES['nueva']['type']: null;
		$disponible = $_POST['disponible'];
		$ids_colores = isset($_POST['idColores']) ? explode(',',$_POST['idColores']) : '';
		$ids_tallas = isset($_POST['idTallas']) ? explode(',',$_POST['idTallas']) : '';
		
		$datos['body']['status'] = $this->articulo_model->editar($id, $nombre, $nomImagen, $precio, $coste, $descuento,  $disponible, $ids_colores, $ids_tallas);
			
			if(!empty($_FILES['nueva']['name'])){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/';
				move_uploaded_file($_FILES['nueva']['tmp_name'],$directorio.$nomImagen);
				/*
				 * Aquí se borraría la antigua imagen.
				 */
				$fichero = $directorio.$antiguaImagen;
				chmod($directorio, 0777);
				chmod($fichero, 0777);
				
				unlink($fichero);
			}
		$articulo = $this->articulo_model->getArticuloById($id);
		$datos['body']['nombre'] = $articulo->nombre;
		
		$this->load->view('articulo/XmodificarPost', $datos);
	}
}

?>