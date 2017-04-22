<?php

class Imagen extends CI_Controller{

	public function crear(){
		$this->load->model('categoria_model');
		$datos['categorias'] = $this->categoria_model->listar();
		enmarcar($this, 'imagen/crear', $datos);
	}

	public function crearPost(){
		$id_user = $_POST['id_usuario'];
		$id_cat = $_POST['id_categoria'];
		$nomImagen = $_FILES['imagen']['name'];
		$tamanoImagen = $_FILES['imagen']['size'];
		$tipoImagen = $_FILES['imagen']['type'];
		$comentario = $_POST['comentario'];
		$descuento = $_POST['descuento'];
		$precio = 5;
		$coste = 2;
		$fecha_alta = strftime("%Y/%m/%d");
		$fecha_baja = "";
		$motivo_baja = "";
		$disponible = $_POST['disponible'];
		
		$this->load->model('imagen_model');
		$imagenAceptada = $this->imagen_model->validarImagen($nomImagen, $tamanoImagen,$tipoImagen);
		if($imagenAceptada){
		
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/')){
				mkdir($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/');
			}
			
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
			move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nomImagen);
	
			$this->load->model('imagen_model');
			$status = null;
			$status = $this->imagen_model->crearImagen($id_user, $id_cat, $nomImagen, $comentario, $descuento, $precio, $coste, $fecha_alta, $fecha_baja, $motivo_baja, $disponible);
			/*
			 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena)
			 * se informa del error al administrador.
			 */
			if($status){
				$this->listar();
			}else{
				enmarcar($this,'imagen/crearERROR');
			}
			
		}
	}

	public function listar(){
		$this->load->model('imagen_model');
		$datos['imagenes'] = $this->imagen_model->listar();
		enmarcar($this, 'imagen/listar', $datos);
	}

	public function borrar(){
		$this->load->model('imagen_model');
		$datos['imagenes'] = $this->imagen_model->listar();
		enmarcar($this, 'imagen/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('imagen_model');
		$idImagenes = $_POST['idImagenes'];
		foreach ($idImagenes as $idimagen){
			$imagen = $this->imagen_model->getImagenById($idImagen);
			$fichero = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/'.$imagen['nombre'];
			/*
			 * No me da permisos para borrar la carpeta.
			 * Lo he intentado de diversas formas pero no nada.
			 * Tengo que preguntar a Alberto.
			 */
			if(file_exists($fichero)){
				chmod($fichero, 777);
				unlink($fichero);
			}
			$this->imagen_model->borrar($idimagen);
		}
		/*
		 * Aquí se borraría la antigua imagen.
		 */
		//$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
		//chmod($directorio.$nomImagen, 666);
		//unlink($fichero);

		$datos['imagenes'] = $this->imagen_model->listar();
		enmarcar($this, 'imagen/borrar', $datos);
	}

	public function editar(){
		$idimagen = $_GET['idImagen'];
		$this->load->model('imagen_model');
		$this->load->model('categoria_model');
		$datos['categorias'] = $this->categoria_model->listar();
		$datos['imagen'] = $this->imagen_model->getimagenById($idimagen);
		enmarcar($this, 'imagen/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id'];
		$id_cat = $_POST['id_categoria'];
		$this->load->model('imagen_model');
		$img = $this->imagen_model->getImagenById($id);
		$nomImagen = !empty($_FILES['nueva']['name']) ? $_FILES['nueva']['name']:$img['nombre'];
		$tamanoImagen = !empty($_FILES['nueva']['size']) ? $_FILES['nueva']['size']: null;
		$tipoImagen = !empty($_FILES['nueva']['type']) ? $_FILES['nueva']['type']: null;
		$comentario = $_POST['comentario'];
		$descuento = $_POST['descuento'];
		$precio = $_POST['precio'];
		$disponible = $_POST['disponible'];
		
		$imagenValida = true;
		if($tamanoImagen != null && $tipoImagen != null){
			$imagenValida = $this->imagen_model->validarImagen($nomImagen, $tamanoImagen, $tipoImagen);
		}
		
		//if($imagenValida){
			$this->imagen_model->editar($id, $id_cat, $nomImagen, $comentario, $descuento,$precio, $disponible);
			
			if(!empty($_FILES['nueva']['name'])){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
				move_uploaded_file($_FILES['nueva']['tmp_name'],$directorio.$nomImagen);
				/*
				 * Aquí se borraría la antigua imagen.
				 */
				//chmod($directorio.$nomImagen, 666);
				//unlink($fichero);
			}
			
				
		//}
		
		$datos['imagenes'] = $this->imagen_model->listar();
		enmarcar($this, 'imagen/listar', $datos);
	}
}

?>