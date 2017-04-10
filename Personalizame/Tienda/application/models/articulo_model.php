<?php

class Articulo_model extends CI_Model{
	
	public function validarImagen($nombreImagen, $tamanoImagen, $tipoImagen){
		if($nombreImagen != null && $tamanoImagen <= 200000){
			
			if (($tipoImagen == "image/gif")
					|| ($tipoImagen == "image/jpeg")
					|| ($tipoImagen == "image/jpg")
					|| ($tipoImagen == "image/png")){
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
		if(!$this->existeArticulo($nombre)){
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
		R::close();	
	}
	
	public function getArticuloById($id){
		return R::load('articulo', $id);
	}
	
	public function editar($id, $nom, $precio, $nomImagen, $disponible){
		$a = R::load('articulo', $id);
		$a->nombre = $nom;
		$a->precio = $precio;
		$a->imagen = $nomImagen;
		$a->disponible = $disponible;
		
		R::store($a);
		R::close();
	}
}

?>