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
		 * Se comprueba que la imagen tenga el tamaño adecuado.
		 * En ese caso, se guarda en la carpeta alojada en nuestro servidor.
		 */
		$imagenAceptada = $this->articulo_model->validarImagen($nomImagen, $tamanoImagen,$tipoImagen);
		//if($imagenAceptada){
			/*
			 * DOCUMENT_ROOT = c:/XAMPP/HTDOCS en mi caso.
			 */
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
}

?>