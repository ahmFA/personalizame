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
	
	public function crearArticulo($nombre, $precio, $imagen, $disponible, $id_colores, $id_tallas){
		if(!$this->existeArticulo($nombre)){
			$a = R::dispense('articulo');
			$a->nombre = $nombre;
			$a->precio = $precio;
			$a->imagen = $imagen;
			$a->disponible = $disponible;
			foreach ($id_colores as $idcolor){
			
				$a-> sharedColorList[] = R::load('color', $idcolor);
			}
			foreach ($id_tallas as $idtalla){
			
				$a-> sharedTallaList[] = R::load('talla', $idtalla);
			}
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
	
	public function editar($id, $nom, $precio, $nomImagen, $disponible, $ids_colores, $ids_tallas){
		$a = R::load('articulo', $id);
		$a->nombre = $nom;
		$a->precio = $precio;
		$a->imagen = $nomImagen;
		$a->disponible = $disponible;
		$a->sharedColorList = [];
		foreach ($ids_colores as $idColor){
			$a->sharedColorList[] = R::load('color', $idColor);
		}
		$a->sharedTallaList = [];
		foreach ($ids_tallas as $idTalla){
			$a->sharedTallaList[] = R::load('talla', $idTalla);
		}
		
		R::store($a);
		R::close();
	}
}

?>