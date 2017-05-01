<?php

class Imagen_model extends CI_Model{

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

	public function existeImagen($nombre){
		return R::findOne('imagen', 'where nombre_imagen = ?', [$nombre]) ? true : false;
	}

	public function crearImagen($id_user,$nombre, $nomImagen, $comentario, $descuento, $precio, $coste, $fecha_alta, $fecha_baja, $motivo_baja, $disponible, $id_categorias){
		if(!$this->existeImagen($nomImagen)){
			$i = R::dispense('imagen');
			$usuario = R::load('usuario', $id_user);
			$usuario->ownImagenList[] = $i;
			$i->nombre = $nombre;
			$i->nombre_imagen = $nomImagen;
			$i->comentario = $comentario;
			$i->descuento = $descuento;
			$i->precio = $precio;
			$i->coste = $coste;
			$i->fecha_alta = $fecha_alta;
			$i->fecha_baja = $fecha_baja;
			$i->motivo_baja = $motivo_baja;
			$i->disponible = $disponible;
			foreach ($id_categorias as $idcat){
					
				$i-> sharedCategoriaList[] = R::load('categoria', $idcat);
			}
			
			R::store($usuario);
			R::store($i);
			R::close();
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		return R::findAll('imagen');
	}
	
	public function listarConLimite($inicio, $cuantos){
		return R::findAll('imagen', 'LIMIT ?,5',[$inicio]);
	}

	public function borrar($idImagen){
		$i = R::load('imagen', $idImagen);
		R::trash($i);
		R::close();
	}

	public function getImagenById($id){
		return R::load('imagen', $id);
	}

	public function editar($id,$nombre, $nomImagen, $comentario, $descuento,$precio,$coste, $disponible, $ids_categorias){
		$i = R::load('imagen', $id);
		$i->nombre = $nombre;
		$i->nombre_imagen = $nomImagen;
		$i->comentario = $comentario;
		$i->descuento = $descuento;
		$i->precio = $precio;
		$i->coste = $coste;
		$i->disponible = $disponible;
		$i->sharedCategoriaList = [];
		
		$i->sharedCategoriaList = [];
		foreach ($ids_categorias as $idcat){
			$i->sharedCategoriaList[] = R::load('categoria', $idcat);
		}

		R::store($i);
		R::close();
	}
}

?>