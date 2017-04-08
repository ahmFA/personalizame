<?php

class Articulo_model extends CI_Model{
	
	public function validarImagen($nombreImagen, $tamanoImagen, $tipoImagen){
		if($nombreImagen != null && $tamanoImagen <= 200000){
			
			if (($tamanoImagen == "image/gif")
					|| ($tamanoImagen == "image/jpeg")
					|| ($tamanoImagen == "image/jpg")
					|| ($tamanoImagen == "image/png")){
				return true;
			}else{
				return false;
			}
		}
	}
	
	public function existeArticulo($nombre){
		return R::findOne('articulo', 'where nombre = ?', [$nombre]) ? true : false;
	}
	
	public function crearArticulo($nombre, $precio, $imagen, $disponible){
		if(!existeArticulo($nombre)){
			$a = R::dispense('articulo');
			$a->nombre = $nombre;
			$a->precio = $precio;
			$a->imagen = $imagen;
			$a->disponible = $disponible;
			R::store($a);
			R::close();
			return true;
		}else{
			return false;
		}
	}
	
	public function listar(){
		return R::findAll('articulo');
	}
	
	public function borrar($idArticulo){
		$a = R::load('articulo', $idArticulo);
		R::trash($a);
		R::close();	}
}

?>