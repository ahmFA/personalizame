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
		$nomImagen = $_FILES['imagen']['name'];
		$tamanoImagen = $_FILES['imagen']['size'];
		$tipoImagen = $_FILES['imagen']['type'];
		$disponible = $_POST['disponible'];
		$id_colores = isset($_POST['idColores']) ? $_POST['idColores'] : '';
		$id_tallas = isset($_POST['idTallas']) ? $_POST['idTallas'] : '';
		$this->load->model('articulo_model');
		/*
		 * Se comprueba que la imagen tenga el tama�o adecuado.
		 * En ese caso, se guarda en la carpeta alojada en nuestro servidor.
		 */
		$imagenAceptada = $this->articulo_model->validarImagen($nomImagen, $tamanoImagen,$tipoImagen);
		if($imagenAceptada){
			/*
			 * DOCUMENT_ROOT = c:/XAMPP/HTDOCS en mi caso.
			 */
			$status = null;
			/*
			 * Si no existe la carpeta de art�culos, se crea.
			 */
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/articulos/')){
				mkdir($_SERVER['DOCUMENT_ROOT'].'/img/articulos/');
			}
			
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/';
			move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nomImagen);
			$status = $this->articulo_model->crearArticulo($nombre, $precio,$nomImagen, $disponible, $id_colores, $id_tallas);
			/*
			 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena) 
			 * se informa del error al administrador.
			 */
			if($status){
				$this->crear();
			}else{
				enmarcar($this,'articulo/crearERROR');
			}
			
		}
	}
	
	public function listar(){
		$this->load->model('articulo_model');
		$datos['articulos'] = $this->articulo_model->listar();
		enmarcar($this, 'articulo/listar', $datos);
	}
	
	public function borrar(){
		$this->load->model('articulo_model');
		$datos['articulos'] = $this->articulo_model->listar();
		enmarcar($this, 'articulo/borrar', $datos);
	}
	
	public function borrarPost(){
		$this->load->model('articulo_model');
		$idArticulos = $_POST['idArticulos'];
		foreach ($idArticulos as $idArt){
			$articulo = $this->articulo_model->getArticuloById($idArt);
			$fichero = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/'.$articulo['imagen'];
			/*
			 * No me da permisos para borrar la carpeta.
			 * Lo he intentado de diversas formas pero no nada.
			 * Tengo que preguntar a Alberto.
			 */
			if(file_exists($fichero)){
				chmod($fichero, 777);
				unlink($fichero);
				$this->articulo_model->borrar($idArt);
			}
		}
		$datos['articulos'] = $this->articulo_model->listar();
		enmarcar($this, 'articulo/borrar', $datos);
	}
	
	public function editar(){
		$idArticulo = $_GET['idArticulo'];
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
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$nomImagen = !empty($_FILES['nueva']['name']) ? $_FILES['nueva']['name']:$art['imagen'];
		$tamanoImagen = !empty($_FILES['nueva']['size']) ? $_FILES['nueva']['size']: null;
		$tipoImagen = !empty($_FILES['nueva']['type']) ? $_FILES['nueva']['type']: null;
		$disponible = $_POST['disponible'];
		$ids_colores = $_POST['idColores'];
		$ids_tallas = $_POST['idTallas'];
		
		$imagenValida = true;
		if($tamanoImagen != null && $tipoImagen != null){
			$imagenValida = $this->articulo_model->validarImagen($nomImagen, $tamanoImagen, $tipoImagen);
		}
		
		if($imagenValida){
			$this->articulo_model->editar($id, $nombre, $precio, $nomImagen, $disponible, $ids_colores, $ids_tallas);
			if(!empty($_FILES['nueva']['name'])){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/';
				move_uploaded_file($_FILES['nueva']['tmp_name'],$directorio.$nomImagen);
				/*
				 * Aquí se borraría la antigua imagen.
				 */
				//chmod($directorio.$nomImagen, 666);
				//unlink($fichero);
			}
			
		}
		$datos['articulos'] = $this->articulo_model->listar();
		enmarcar($this, 'articulo/listar', $datos);
	}
}

?>