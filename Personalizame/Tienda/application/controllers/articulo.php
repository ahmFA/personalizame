<?php

class Articulo extends CI_Controller{
	
	public function verCrear(){
		enmarcar($this, 'articulo/crear');
	}
	
	public function crearPost(){
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$nomImagen = $_FILES['imagen']['name'];
		$tamanoImagen = $_FILES['imagen']['size'];
		$tipoImagen = $_FILES['imagen']['type'];
		$disponible = $_POST['disponible'];
		$this->load_model('articulo_model');
		$imagenAceptada = $this->articulo_model->validarImagen($nomImagen, $tamanoImagen,$tipoImagen);
		if($imagenAceptada){
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/articulos/';
			move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombreImagen);
			$status = $this->articulo_model->crearArticulo($nombre, $precio,$nomImagen, $disponible);
			$datos['valido'] = 'si';
			enmarcar($this,'articulo/crear', $datos);
		}
	}
}

?>