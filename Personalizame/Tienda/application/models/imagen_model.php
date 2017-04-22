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
		return R::findOne('imagen', 'where nombre = ?', [$nombre]) ? true : false;
	}

	public function crearImagen($id_user, $id_cat, $nomImagen, $comentario, $descuento, $precio, $coste, $fecha_alta, $fecha_baja, $motivo_baja, $disponible){
		if(!$this->existeImagen($nombre)){
			$i = R::dispense('imagen');
			$usuario = R::load('usuario', $id_user);
			$usuario->ownImagenList[] = $i;
			$categoria = R::load('categoria', $id_cat);
			$categoria->ownImagenList[] = $i;
			$i->nombre = $nomImagen;
			$i->comentario = $comentario;
			$i->descuento = $descuento;
			$i->precio = $precio;
			$i->coste = $coste;
			$i->fecha_alta = $fecha_alta;
			$i->fecha_baja = $fecha_baja;
			$i->motivo_baja = $motivo_baja;
			$i->disponible = $disponible;
			
			R::store($categoria);
			R::store($usuario);
			R::close();
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		return R::findAll('imagen');
	}

	public function borrar($idImagen){
		$i = R::load('imagen', $idImagen);
		R::trash($i);
		R::close();
	}

	public function getImagenById($id){
		return R::load('imagen', $id);
	}

	public function editar($id, $id_cat, $nomImagen, $comentario, $descuento,$precio, $disponible){
		$i = R::load('imagen', $id);
		$i->nombre = $nomImagen;
		$i->comentario = $comentario;
		$i->descuento = $descuento;
		$i->precio = $precio;
		$i->disponible = $disponible;
		$i->sharedColorList = [];
		
		$categoriaAnterior = R::load('categoria', $i->categoria_id);
		unset($categoriaAnterior->ownImagenList[$i->id]);
		
		$categoria = R::load('categoria', $id_cat);
		
		$categoria -> ownImagenList[] = $i;

		R::store($categoria);
		R::close();
	}
}

?>