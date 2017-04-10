<?php

class Articulo extends CI_Controller{
	
	public function verCrear(){
		$datos['ruta'] = $_SERVER['DOCUMENT_ROOT'];
		enmarcar($this, 'articulo/crear', $datos);
	}

	public function crearPost(){
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$nomImagen = $_FILES['imagen']['name'];
		$tamanoImagen = $_FILES['imagen']['size'];
		$tipoImagen = $_FILES['imagen']['type'];
		$disponible = $_POST['disponible'];
		$this->load->model('articulo_model');
		/*
		 * Se comprueba que la imagen tenga el tama�o adecuado.
		 * En ese caso, se guarda en la carpeta alojada en nuestro servidor.
		 */
		$imagenAceptada = $this->articulo_model->validarImagen($nomImagen, $tamanoImagen,$tipoImagen);
		//if($imagenAceptada){
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
		$status = $this->articulo_model->crearArticulo($nombre, $precio,$nomImagen, $disponible);
			/*
			 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena) 
			 * se informa del error al administrador.
			 */
			if($status){
				enmarcar($this,'articulo/crear');
			}else{
				enmarcar($this,'articulo/crearERROR');
			}
			
		//}
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
			$this->articulo_model->borrar($idArt);
			$articulo = $this->articulo_model->getArticuloById($idArt);
			$fichero = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/'.$articulo['imagen'];
			/*
			 * No me da permisos para borrar la carpeta.
			 * Lo he intentado de diversas formas pero no nada.
			 * Tengo que preguntar a Alberto.
			 */
			if(file_exists($fichero)){
				chmod($fichero, 666);
				unlink($fichero);
			}else{
				enmarcar($this, 'articulo/crear');
			}
			
		}
		$datos['articulos'] = $this->articulo_model->listar();
		enmarcar($this, 'articulo/borrar', $datos);
	}
	
	public function editar(){
		$idArticulo = $_GET['idArticulo'];
		$this->load->model('articulo_model');
		$datos['articulo'] = $this->articulo_model->getArticuloById($idArticulo);
		enmarcar($this, 'articulo/editar', $datos);
	}
	
	public function editarPost(){
		$id= $_POST['id'];
		$this->load->model('articulo_model');
		$art = $this->articulo_model->getArticuloById($id);
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$nomImagen = isset($_FILES['nueva'])? $_FILES['nueva']['name']:$art['imagen'];
		$tamanoImagen = isset($_FILES['nueva'])? $_FILES['nueva']['size']: '';
		$tipoImagen = isset($_FILES['nueva'])? $_FILES['nueva']['type']: '';
		$disponible = $_POST['disponible'];
		$imagenValida = true;
		if($tamanoImagen != '' && $tipoImagen != ''){
			$imagenValida = $this->articulo_model->validarImagen($nomImagen, $tamanoImagen, $tipoImagen);
		}
		
		if($imagenValida){
			$this->articulo_model->editar($id, $nombre, $precio, $nomImagen, $disponible);
			if(isset($_FILES['nueva'])){
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